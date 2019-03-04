<?php
namespace app\index\controller;
use  \page\AjaxPage;
class Product extends Common
{
    //商品详情
    public function detail(){
        //获取左侧分类的数据
      $this->getIndexCateInfo(); 
       //商品连接查询商品
      $goods_id=input('get.goods_id',0,'intval');
     
      if(empty($goods_id)){
          $this->error("请重新选择商品",'Index/index');
      }
      $where=[
          'goods_id'=>$goods_id
      ]; 
      $goods=model("Goods");
      $goodsInfo=$goods->where($where)->find();
      $goodsInfo['goods_imgs']=ltrim($goodsInfo['goods_imgs'],"|");
      $goodsInfo['goods_imgs']=explode("|",$goodsInfo['goods_imgs']);
      if(empty($goodsInfo)){
          $this->error("没有此商品，请重新选择",'Index/index');
      }
      if($goodsInfo['is_sel']==2){
          $this->error("此商品已经下架",'Index/index');
      }
      //记录浏览历史
      if($this->checkUserLogin()){
          //存数据库
          $this->saveHistoryDb($goods_id);
      }else{
          //存cookie
          $this->saveHistoryCookie($goods_id);
      }
        //面包屑查询
        $str_name= $this->getCrumbs($goodsInfo['cate_id']);
        $this->assign('str_name',$str_name);
      //$history= unserialize(base64_decode(cookie('history')));
      //print_r($history);exit; 
      $this->assign('goodsInfo',$goodsInfo);
      return view();
    }
    //存浏览记录到数据库
    public function saveHistoryDb($goods_id){
       $history=[
           'user_id'=>$this->getUserId(),
           'goods_id'=>$goods_id,
          
       ];
       $model=model('History');
       $model->save($history);
    }

     //存浏览记录到cookie中
     public function  saveHistoryCookie($goods_id){
        $now=time(); 
         //先从cookie中取出
         $prevHistory=cookie('history'); 
         if(!empty($prevHistory)){
             //解开为数组
             $history=unserialize( base64_decode($prevHistory));
             //加入这一次浏览记录
             $history[]=['goods_id'=>$goods_id,'ctime'=>$now];
             //存取cookie 
             $str=base64_encode(serialize($history)) ;
             cookie('history',$str);
         }else{
                $arr[]=['goods_id'=>$goods_id,'ctime'=>$now];
                $str=base64_encode(serialize($arr)) ;
                cookie('history',$str);
         } 
     }
    //全部商品展示
    public function productList(){
         //获取左侧分类的数据
        $this->getIndexCateInfo();
        //查询所有品牌
        $cate_id=input('get.cate_id',0,'intval');
         //面包屑查询
         $cwhere=[
            'cate_id'=>$cate_id
         ];
         $cInfo=model('Category')->where($cwhere)->find(); 
         $this->assign('cInfo',$cInfo);
        if(empty($cate_id)){
            $where=[
                'is_sel'=>1 
            ];
            cookie('cate_id',null);
        }else{
            $cateInfo=model('Category')->where(['is_show'=>1])->select();
            //获取子类id
            $cate_id=getCateId($cateInfo,$cate_id);
            $cate_id=implode(',',$cate_id); 
            cookie("cate_id",$cate_id);
            $where=[
                'is_sel'=>1,
                'cate_id'=>['in',$cate_id]
            ];
           
        }
        $brand=model('Brand');
        //查询所有的品牌
        $brandInfo=$brand
                   ->field('distinct(g.brand_id),brand_name')
                   ->alias('b')
                   ->join('shop_goods g','b.brand_id=g.brand_id')
                   ->where($where)
                   ->select();
        //echo $brand->getLastSql();exit;
        //获取价格区间
        $goods=model('Goods');
        $max_price=$goods->where($where)->value("max(self_price)");
        $priceInfo=$this->getPriceSection($max_price);
        //获取默认商品数据
        $p=1;
        $page_num=8;
        $goodsInfo=$goods->where($where)->order('sale_num','desc')->page($p,$page_num)->select();
        //调用分页类 获取页码
        $count=$goods->where($where)->count();
        $page_str=AjaxPage::ajaxpager($p,$count,$page_num,url('Product/productsearch'),'show');
        //查询浏览历史
          if($this->checkUserLogin()){
             $historyInfo= $this->getHistoryDb();
          }else{
             $historyInfo= $this->getHistoryCookie();
          }
        $this->assign('historyInfo',$historyInfo);
        $this->assign('count',$count);
        $this->assign('brandInfo',$brandInfo);
        $this->assign('priceInfo',$priceInfo);
        $this->assign('goodsInfo',$goodsInfo);
        $this->assign('page_str',$page_str);
        return view();

    }
    //获取价格区间
    public function  getPriceSection($max_price){
        $price=[];
        for($i=0;$i<6;$i++){
            $start=($max_price/7)*$i;
            $end=($max_price/7)*($i+1)-0.01;
            $price[]=number_format($start,2,'.',',').'-'.number_format($end,2,'.',',');  
        }
        $price[]=number_format($end+0.01,2,'.',',').'以上';
        return $price;
    }

    //获取价格
    public function getPrice(){
        //品牌id
        $brand_id=input('post.brand_id',0,'intval');
        //查询此品牌下的商品
        $goods=model('Goods');
        $where=[
            'is_sel'=>1,
            'brand_id'=>$brand_id
        ];
       
       $max_price= $goods->where($where)->order('self_price','desc')->value('self_price');
       if(!empty($max_price)){
           $price=$this->getPriceSection($max_price);
           echo json_encode($price);
       }else{
           fail("此品牌下没有商品");
       }
       
      
    }
    //搜索
    public function productsearch(){
      $p=input('post.p',1,'intval');
      $brand_id=input('post.brand_id','');
      $price=input('post.price','');
      $price=str_replace(",","",$price);
      //dump($price);exit;
      $flag=input('post.flag',1,'intval');  
      $order=input('post.order','desc');
      $cate_id=cookie('cate_id');
     
      //处理筛选事件
      $where=[];
      if(!empty($cate_id)){
          $where['cate_id']=['in',$cate_id];
      }
      if(!empty($brand_id)){
          $where['brand_id']=$brand_id;
      }
      if(!empty($price)){
          if(substr_count($price,'-')>0){
              $arr=explode("-",$price);
              //print_r($arr);exit;
              $where['self_price']=['between',$arr];
          }else{
              $str=strpos($price,"以");
              $str2=substr($price,0,$str);
              $where['self_price']=['>=',$str2];
          }
      }
      
      //处理排序
      $field="sale_num";
      if($flag==2){
        $field="sale_num";
      }else if($flag==3){
          $field="self_price";
      }else if($flag==4){
          $where['is_new']=1;
      }
       //查询商品
      $goods=model('Goods');
      $page_num=8;
      $goodsInfo=$goods
                ->where($where)
                ->order($field,$order)
                ->page($p,$page_num)
                ->select();
       //echo $goods->getLastSql();die;
       //调用分页类 获取页码
       $count=$goods->where($where)->count();
       $page_str=AjaxPage::ajaxpager($p,$count,$page_num,url('Product/productsearch'),'show');
       $this->assign('goodsInfo',$goodsInfo);
       $this->assign('count',$count);
       $this->assign('page_str',$page_str); 
       $this->view->engine->layout(false); 
       echo   $this->fetch("product"); 
    
    }
    //获取浏览记录数据库
    public function getHistoryDb(){
        $where=[
            'user_id'=>$this->getUserId()
        ];
        $history=model('History');
        $goods_id=collection($history->where($where)->order('ctime desc')->column('goods_id'))->toArray();
        if(!empty($goods_id)){
            $goods_id=array_unique($goods_id);
            $goods_id=array_slice($goods_id,0,5);
            
            $goods=model('Goods');
            foreach($goods_id as $k=>$v){
                $where=[
                    'goods_id'=>$v,
                    'is_sel'=>1
                ];
            $goodsInfo[]=$goods->field('goods_name,self_price,goods_score,goods_img,goods_id')->where($where)->find();
            }
            return $goodsInfo;
        }else{
            return [];
        }
       
    }
    //获取浏览记录cookie
    public function getHistoryCookie(){
      $history=cookie('history');
      $historyInfo=unserialize(base64_decode($history));
      if(!empty($historyInfo)){
          $historyInfo=array_reverse($historyInfo);
          foreach($historyInfo as $k=>$v){
              $goods_id[]=$v['goods_id'];
          }
          $goods_id=array_unique($goods_id);
          $goods_id=array_slice($goods_id,0,5);
          $goods=model('Goods');
          foreach($goods_id as $k=>$v){
              $where=[
                  'goods_id'=>$v,
                  'is_sel'=>1
              ];
          $goodsInfo[]=$goods->field('goods_img,goods_name,self_price,goods_score,goods_id')->where($where)->find(); 
          }
          return $goodsInfo;
      }else{
        return [];
      }
    }  
   

    




}
