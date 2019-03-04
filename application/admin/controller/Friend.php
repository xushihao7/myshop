<?php 
   namespace app\admin\controller;
   use think\Controller;
   class Friend extends Controller{
       //添加
        public function FriendAdd(){
            if(checkRequest()){
               $data=input('post.');
               $validate=validate('Friend');
               $result=$validate->scene('add')->check($data);
              if(!$result){
                fail($validate->getError());                         
              }
              $res=model('Friend')->save($data); 
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
            $name=input('post.name');
            $id=input('post.id');
            $type=input('post.type');
            if($type==1){
                $where=[
                    'name'=>$name
                ];
            }else{
                $where=[
                    'id'=>['neq',$id],
                    'name'=>$name
                ];
            }
          $arr=model('Friend')->where($where)->find();
          //echo model('friend')->getLastSql();
          if($arr){
              echo  0;
          }else{
              echo  1;
          }
        }
       //展示
        //展示
      public function friendList(){
        return view();
    }
    //展示加分页
    public function friendInfo(){
        $page=input('get.page');
        $limit=input('get.limit');
        $data=model('Friend')->page($page,$limit)->select();
        $count=model('Friend')->count();
        $info=[
            'code'=>0,
            'msg'=>'',
            'count'=>$count,
            'data'=>$data,
        ];
        echo json_encode($info);

    }
     //即点即改
     public function friendFieldUpdate(){
        $value=input('post.value');
        $field=input('post.field');
        $id=input('post.id');
      
         if($field=='name'){
             $where=[
                 'id'=>['neq','id'],
                 'name'=>$value
             ];
           $arr=model('Friend')->where($where)->find();
           if($arr){
              fail("账号已经存在");exit;
           }
           
        }
        $updateWhere=[
            'id'=>$id
        ];
        $data=[
            $field=>$value
        ];
        $res=model('Friend')->save($data,$updateWhere);
        if($res){
            successly('修改成功');
        }else{
            fail("修改失败");
        }
      
        
  }
  //删除
  public function  friendDel(){
      $id=input('post.id');
      $where=[
          'id'=>$id
      ];
      $res=model('Friend')->where($where)->delete();
      if($res){
          successly('删除成功');
      }else{
          fail('删除失败');
      }
  }
  //修改
  public function friendUpdate(){
    if(checkRequest()){
      $data=input('post.');
      $validate=validate('Friend');
      $result=$validate->check($data);
      if(!$result){
        fail( $validate->getError()) ;       
      }
      $where=[
          'id'=>$data['id']
      ];
      $res=model('Friend')->save($data,$where);
      if($res===false){
         fail('修改失败');
      }else{
        successly('修改成功');
      }

    }else{
       $id=input('get.id');
       $where=[
           'id'=>$id
       ];
       $data= model('Friend')->where($where)->find();
       $this->assign('data',$data);
       return view();
    }
}






   }