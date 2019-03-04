<?php
namespace app\index\controller;
use think\Controller;
class Common extends Controller
{
    public function __construct(){
      parent::__construct();
    
      //获取网站配置信息
      $this->getWebConfig();
      //dump($data);exit;
      //获取购物车的数据
      $this->getTopcartData();
      
    }
    //检测是否登录
    public function checkUserLogin(){
        if(session('?userInfo')){
          $userInfo=session('userInfo');
          return $userInfo;
        }else{
          return false;
        }
    }
    //获取网站配置信息  
    public function getWebConfig(){
      if(session("?configInfo")){
        $configInfo_str=session("configInfo");
        $configInfo=unserialize($configInfo_str);
        //dump( $configInfo);die;
      }else{
          $config=model("Config");
            $data=$config->select();
          foreach($data as $k=>$v){
              $configInfo[$v['name']]=$v['value'];
          }
          $str=serialize($configInfo);
          //dump($str);
          session("configInfo",$str);
        }
        $this->assign("config", $configInfo);
    }
    //获取首页分类的数据
    public function getIndexCateInfo(){
       //获取分类的数据
       $model=model('Category');
       $where=[
           'is_show'=>1
       ];
       $navwhere=[
         'is_navshow'=>1
       ];
       $data=$model->where($where)->select();
       $arr=$model->where($navwhere)->select();
       $cateInfo=getIndexCateInfo($data);
       $catenav=getIndexCateInfo($arr);
       $this->assign('cateInfo',$cateInfo);
       $this->assign('catenav',$catenav);
    }
    //获取登录session用户id
    public  function getUserId(){
      return session("userInfo.user_id");
    }
    //同步浏览记录
    public function asyncHistory(){
        $history=cookie('history');
        if(!empty($history)){
          $arr= unserialize(base64_decode($history));
          $user_id=$this->getUserId();
          $model=model("History");
          foreach($arr as $k=>$v){
          $v['user_id']=$user_id;
          $model->insert($v);
          }
          cookie('history',null);
        }
        
      
    }
    //检测库存
    public function checkNumber($goodsInfo,$buy_number){
      $goods_num=$goodsInfo['goods_num'];
      if($buy_number>$goods_num){
        fail("此商品库存".$goods_num."件,您所选则已经超过库存，最大库存为".$goods_num."");
      }
    }
    //同步购物车信息
    public function asyncCart(){
        $cart=cookie('cart');
        $cartInfo=unserialize(base64_decode($cart));
        //print_r($cartInfo);exit;
        if(!empty($cartInfo)){
            //循环查询是否存在于购物车
            $user_id=$this->getUserId();
            $model=model('Cart');
            $goods=model('Goods');
            foreach ($cartInfo as $k=>$v){
              $goodsInfo=$goods->where(['goods_id'=>$v['goods_id']])->find();
              if(empty($goodsInfo)){
                  fail("请重新选择您要购买的商品");
              }
              if($goodsInfo['is_sel']==2){
                  fail("您所购买的商品已经下架");
              }
              $where=[
                'goods_id'=>$v['goods_id'],
                'user_id'=>$user_id
              ];
              $cartData=$model->where($where)->find();
              if(!empty($cartData)){
                  
                  $update=[
                      'buy_number'=>$cartData['buy_number']+$v['buy_number'],
                      'utime'=>time(),
                      'status'=>1
                  ];
                  //print_r($update);exit;
                  $this->checkNumber($goodsInfo,$update['buy_number']);
                  $res=$model->where($where)->update($update);
                  //dump($res);exit;
                  
              }else{
                  $v['add_price']=$goodsInfo['self_price'];
                  $v['user_id']=$user_id;
                  $this->checkNumber($goodsInfo,$v['buy_number']);
                  $res=$model->insert($v);
                  
              }
              cookie('cart',null);
            }
        }
      
        
    } 
    //获取面包屑导航数据
    public function getCrumbs($cate_id){
        $cate=model('Category');
        $where=[
          'is_show'=>1
        ];
        $arr=$cate->where($where)->select();
        $name=getCateName($arr,$cate_id);
        $new_name=array_reverse($name);
        $str="";
        foreach($new_name as $k=>$v){
            $str.="<a href='".url('Product/productlist')."?cate_id=".$v['cate_id']."'>".$v['cate_name']."</a>".'>';
        }
        //print_r($new_name);exit;
        $cate_str=rtrim($str,">");
        return $cate_str;

    }
     //数据库中存在的购物车信息
     public function getCartInfoDb(){
        $user_id=$this->getUserId();
        $where=[
            'user_id'=>$user_id,
            'is_sel'=>1,
            'status'=>1
        ];
        $cart=model('Cart');
        $cartData=$cart
                 ->field("cart_id,add_price,buy_number,goods_name,self_price,goods_img,goods_score,goods_num,goods_score,c.goods_id")
                 ->alias('c')
                 ->join("shop_goods g","c.goods_id=g.goods_id")
                 ->where($where)
                 ->select();
        if(!empty($cartData)){ 
            return $cartData; 
        }else{
            return []; 
            $this->error("购物车太空了，请去选购吧",url("index/index"));
        }
               
    }
    //cooike中存在的购物车信息
    public function getCartInfoCookie(){
        $cart_str=cookie('cart');
        $cartInfo=unserialize(base64_decode($cart_str));
        if(!empty($cartInfo)){
             $goods=model("Goods");
            foreach($cartInfo as $k=>$v){
                $where=[
                    'goods_id'=>$v['goods_id'],
                    'is_sel'=>1
                ];
                $goodsInfo=$goods->where($where)->find()->toArray();
                $cartData[]=array_merge($v,$goodsInfo);
            }
            //print_r($cartData);exit;
            if(empty($cartData)){
                $this->error("购物车太空了，请去添加吧",url('index/index'));
            }
          return $cartData;
        }else{
            return [];
        }   
    }
    //获取购物车的信息
    public function getTopcartData(){
        if($this->checkUserLogin()){
            $cartData= $this->getCartInfoDb();
        }else{
            $cartData= $this->getCartInfoCookie();
        } 
        $this->assign('cartData',$cartData);
        if(!empty($cartData)){
            $this->assign("is_cartData",1);
        }else{
            $this->assign("is_cartData",0);
        }
    }
    //获取收货地址省市区
    public function getAddressInfo($where,$address_id=''){
        //print_r($where);exit;
        $address_model=model("Address");
        $area_model=model("Area");
       if(empty($address_id)){
         $addressInfo=collection($address_model->where($where)->select())->toArray();
         if(!empty($addressInfo)){
            foreach($addressInfo as $k=>$v){
                $id[]=$v['province'];
                $id[]=$v['city'];
                $id[]=$v['district'];
             }
             array_unique($id);
             $areaWhere=[
                 'id'=>['in',$id]
             ];
             $areaInfo=collection($area_model->where($areaWhere)->select())->toArray();
             $address_name=[];
             foreach($areaInfo as $k=>$v){
                 $address_name[$v['id']]=$v['name'];
             }
             foreach($addressInfo as $k=>$v){
                 $addressInfo[$k]['province_name']=$address_name[$v['province']];
                 $addressInfo[$k]['city_name']=$address_name[$v['city']];
                 $addressInfo[$k]['district_name']=$address_name[$v['district']];
             }
             return $addressInfo;
         }else{
             return [];
         }
        
         
       }else{
           $where['id']=$address_id;
           $addressInfo=$address_model->where($where)->find()->toArray();
           if(!empty($addressInfo)){
            $id[]=$addressInfo['province'];
            $id[]=$addressInfo['city'];
            $id[]=$addressInfo['district'];
            $areaWhere=[
                'id'=>['in',$id]
            ];
            $areaInfo=$area_model->where($areaWhere)->select();
            $address_name=[];
            foreach ($areaInfo as $k => $v){
                $address_name[$v['id']]=$v['name'];
            }
            $addressInfo['province_name']=$address_name[$addressInfo['province']];
            $addressInfo['city_name']=$address_name[$addressInfo['city']];
            $addressInfo['district_name']=$address_name[$addressInfo['district']];
            return $addressInfo;
           }else{
               return [];
           }
          
          
       }
       
    }
    //获取订单信息
    public function getorderInfo($orderWhere){
        $order_model=model("Order");
        $orderInfo=$order_model->where($orderWhere)->find();
        return $orderInfo;
    }
    
   
   





}