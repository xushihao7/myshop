<?php
  namespace app\admin\controller;
  class Goods extends Common{ 
      //商品添加
      public function goodsAdd(){
          if(checkRequest()){
             $data=input('post.');
             //验证
             $validate=validate('Goods');
             $result=$validate->scene('add')->check($data);
             if(!$result){
                fail($validate->getError());         
             }
            $res=model('Goods')->allowField(true)->save($data);
            if($res){
               successly('添加成功');
            }else{
                fail("添加失败");
            }
             
          }else{
              //查询分类
             $cinfo=$this->getCateInfo();
             $this->assign('cinfo',$cinfo);
             //查询品牌
             $where=[
                 'brand_show'=>1
             ];
             $binfo=model('Brand')->where($where)->select();
             $this->assign('binfo',$binfo);
             return view();
          }
      }
      //获取分类数据
     public function getCateInfo(){
        $data=model('Category')->select();
        $info=getCateInfo($data);
        return $info;
     }
     //文件上传 
     public function goodsupload(){
         $type=input('get.type');
         $dir=$type==1?"goods_img":"goods_imgs";
         //echo $dir;exit;
         $info=$this->upload($dir);
         
     }
     public function upload($dir){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        //dump($file);exit;
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . $dir);
        if($info){
           
            $arr=[
                'code'=>1,
                'font'=>'上传成功',
                'src'=>$info->getSaveName()
            ];
            echo json_encode($arr);
        }else{
        // 上传失败获取错误信息
            fail($file->getError()) ;
        }
        
        
     }
     //展示的静态页面
     public function goodslist(){
         //查询分类
         $cinfo=$this->getCateInfo();
         $this->assign('cinfo',$cinfo);
         //查询品牌
         $where=[
             'brand_show'=>1
         ];
         $binfo=model('Brand')->where($where)->select();
         $this->assign('binfo',$binfo);
         return view();
     }
     //展示数据接口
     public function goodsInfo(){
          $page=input('get.page');
          $limit=input('get.limit');  
          $goods_name=input('get.goods_name');  
          $cate_name=input('get.cate_name');
          $brand_name=input('get.brand_name');
          $where=[];
          if(!empty($goods_name)){
              $where['goods_name']=['like',"%$goods_name%"];
          }
          if(!empty($cate_name)){
              $where['cate_name']=$cate_name;
          }
          if(!empty($brand_name)){
            $where['brand_name']=$brand_name;
         }
          $model=model('Goods');
          $data=$model->getGoodsInfo($page,$limit,$where);
          $count=$model->countInfo($where);
          $info=[
              'code'=>0,
              'msg'=>'',
              'count'=>$count,
              'data'=>$data,
          ];
          echo json_encode($info);
          

     }
     //即点即改
     public function goodsFieldUpdate(){
         $value=input('post.value');
         $field=input('post.field');
         $goods_id=input('post.goods_id');
            $where=[
             'goods_id'=>$goods_id
            ];
           $data=[
              $field=>$value
            ];
          $res=model('Goods')->save($data,$where);
          if($res===false){
             fail('修改成功');
          }else{
             successly('修改成功');
          }
        
        
     }
     //富文本编辑器的文件上传
     public function goodsedit(){
         // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('file');
        //dump($file);exit;
        // 移动到框架应用根目录/public/uploads/ 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . "goodseditimgs");
        if($info){
           
            $arr=[
                'code'=>0,
                'font'=>'上传成功',
                'data'=>[
                    'src'=>"http://188.131.171.12/goodseditimgs/".$info->getSaveName(),
                    'title'=>'picture'

                ]
                
            ];
            echo json_encode($arr);
        }else{
        // 上传失败获取错误信息
            fail($file->getError()) ;
        }
     }
     //删除
     public function goodsDel(){
         $goods_id=input('post.goods_id');
         $where=[
             'goods_id'=>$goods_id
         ];
         $res=model('Goods')->where($where)->delete();
         if($res){
             successly('删除成功');
         }else{
             fail("删除失败");
         }
     }
     //修改
     public function goodsUpdate(){
         if(checkRequest()){
            $data=input('post.');
            if(empty($data['is_new'])){
                $data['is_new']=2;
            }
            if(empty($data['is_best'])){
                $data['is_best']=2;
            }
            if(empty($data['is_hot'])){
                $data['is_hot']=2;
            }
            //验证
            $validate=validate('Goods');
            $result=$validate->scene('edit')->check($data);
            if(!$result){
              fail( $validate->getError()) ;           
            }
            $where=[
                'goods_id'=>$data['goods_id']
            ];
            $res=model('Goods')->save($data,$where);
            if($res===false){
               fail('修改失败');
            }else{
              successly('修改成功');
            }
         }else{
             $goods_id=input('get.goods_id');
             $where=[
                 'goods_id'=>$goods_id
             ];
             $arr=model('Goods')->where($where)->find();
             //echo model('goods')->getLastSql();
             $this->assign('arr',$arr);
             $this->goodsAdd();
             return view();
         }
     }



  }