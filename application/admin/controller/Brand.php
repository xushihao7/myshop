<?php 
   namespace app\admin\controller;
   use think\Controller;
   class  Brand extends Controller{
       //添加
       public function brandAdd(){
           if(checkrequest()){
                  //验证器验证
              $data=input('post.');
              $validate=validate('Brand');
              $result=$validate->scene('add')->check($data);
              if(!$result){
                fail($validate->getError());                         
              }
              $res=model('Brand')->allowField(true)->save($data); 
              //dump($res);
             if($res){
                  successly('添加成功');
              }else{
                  fail("添加失败");
              } 


           }else{
                 return view();
           }
       }
       //验证唯一性
      public function checkName(){
        $brand_name=input('post.brand_name');
        $brand_id=input('post.brand_id');
        //dump($brand_name);exit;
        $type=input('post.type');
         if($type==1){
          $where=[
            'brand_name'=>$brand_name,
          ];
        }else{
           $where=[
              'brand_id'=>['neq',$brand_id],
              'brand_name'=>$brand_name,
            ];
        } 
        $arr=model('Brand')->where($where)->find();
        //echo model('brand')->getLastSql();
        if($arr){
            echo  0;
        }else{
            echo  1;
        }

      }
       //文件上传
       public function brandLogo(){
          // 获取表单上传文件 例如上传了001.jpg
            $file = request()->file('file');
            //dump($file);exit;
            // 移动到框架应用根目录/public/uploads/ 目录下
            $info = $file->move(ROOT_PATH . 'public' . DS . 'brandlogo');
            if($info){
              
                $arr=[
                    'code'=>1,
                    'font'=>'上传成功',
                    'src'=>$info->getSaveName()
                ];
                echo json_encode($arr);
            }else{
            // 上传失败获取错误信息
                echo $file->getError();
            }

       }
     //展示
     public function brandList(){
        return view();
     }
    //展示加分页
    public function brandInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $model=model('Brand');
        $data=$model->getInfo($page,$limit);
        $count=$model->count();
        $info=[
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data,
        ];
        echo json_encode($info);

    }
     //即点即改
     public function brandFieldUpdate(){
        $value=input('post.value');
        $field=input('post.field');
        $brand_id=input('post.brand_id');
      
         if($field=='brand_name'){
             $where=[
                 'brand_id'=>['neq','brand_id'],
                 'brand_name'=>$value
             ];
           $arr=model('Brand')->where($where)->find();
           if($arr){
              fail("品牌名称已经存在");exit;
           }
           
        }
        $updateWhere=[
            'brand_id'=>$brand_id
        ];
        $data=[
            $field=>$value
        ];
        $res=model('Brand')->save($data,$updateWhere);
        if($res){
            successly('修改成功');
        }else{
            fail("修改失败");
        }
      
        
  }
     //删除
     public function  brandDel(){
        $brand_id=input('post.brand_id');
        //判断此品牌下有商品
        $bwhere=[
            'brand_id'=>$brand_id
        ];
        $brand=model('Goods')->where($bwhere)->count();
        if($brand>0){
            fail("此品牌下有商品不能删除");
        }
        $where=[
            'brand_id'=>$brand_id
        ];
        $res=model('Brand')->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail('删除失败');
        } 
        
        
    }
     //修改
     public function brandUpdate(){
        if(checkRequest()){
          $data=input('post.');
          $validate=validate('Brand');
          $result=$validate->scene('edit')->check($data);
          if(!$result){
            fail( $validate->getError()) ;
                      
          }
          $where=[
              'brand_id'=>$data['brand_id']
          ];
          $res=model('Brand')->allowField(true)->save($data,$where);
          if($res===false){
             fail('修改失败');
          }else{
            successly('修改成功');
          }

        }else{
           $brand_id=input('get.brand_id');
           $where=[
               'brand_id'=>$brand_id
           ];
           $data= model('Brand')->where($where)->find();
           $this->assign('data',$data);
           return view();
        }



        
     }
   }