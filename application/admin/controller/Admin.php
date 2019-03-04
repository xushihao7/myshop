<?php 
  namespace app\admin\controller;
  use think\Controller;
  class Admin extends Common{
      //管理员添加
      public function adminAdd(){
          if(checkRequest()){
             $data = input('post.');
             $validate=validate('Admin');
             $result=$validate->scene('add')->check($data);
             if(!$result){
               fail($validate->getError());         
             }
            $res=model('Admin')->save($data);
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
          $admin_name=input('post.admin_name');
          $admin_id=input('post.admin_id');
          //dump($admin_id);exit;
          $type=input('post.type');
          if($type==1){
            $where=[
              'admin_name'=>$admin_name,
            ];
          }else{
             $where=[
                'admin_id'=>['neq',$admin_id],
                'admin_name'=>$admin_name,
              ];
          }
         
          $arr=model('Admin')->where($where)->find();
          //echo model('admin')->getLastSql();
          if($arr){
              echo  0;
          }else{
              echo  1;
          }

      }
      //展示
      public function adminList(){
          return view();
      }
      //展示加分页
      public function adminInfo(){
          $page=input('get.page');
          $limit=input('get.limit');
          $data=model('Admin')->page($page,$limit)->select();
          $count=model('Admin')->count();
          $info=[
              'code'=>0,
              'msg'=>'',
              'count'=>$count,
              'data'=>$data,
          ];
          echo json_encode($info);

      }
      //即点即改
      public function adminFieldUpdate(){
            $value=input('post.value');
            $field=input('post.field');
            $admin_id=input('post.admin_id');
            
          
             if($field=='admin_name'){
                 $where=[
                     'admin_id'=>['neq','admin_id'],
                     'admin_name'=>$value
                 ];
               $arr=model('Admin')->where($where)->find();
               if($arr){
                  fail("账号已经存在");exit;
               }
               
            }
            $updateWhere=[
                'admin_id'=>$admin_id
            ];
            $data=[
                $field=>$value
            ];
            $res=model('Admin')->save($data,$updateWhere);
            if($res){
                successly('修改成功');
            }else{
                fail("修改失败");
            }
          
            
      }
      //删除
      public function  adminDel(){
          $admin_id=input('post.admin_id');
          $where=[
              'admin_id'=>$admin_id
          ];
          $res=model('Admin')->where($where)->delete();
          if($res){
              successly('删除成功');
          }else{
              fail('删除失败');
          }
      }
      //修改
      public function adminUpdate(){
         if(checkRequest()){
           $data=input('post.');
           $validate=validate('Admin');
           $result=$validate->scene('edit')->check($data);
           if(!$result){
             fail( $validate->getError()) ;       
           }
           $where=[
               'admin_id'=>$data['admin_id']
           ];
           $res=model('Admin')->save($data,$where);
           if($res===false){
              fail('修改失败');
           }else{
             successly('修改成功');
           }

         }else{
            $admin_id=input('get.admin_id');
            $where=[
                'admin_id'=>$admin_id
            ];
            $data= model('Admin')->where($where)->find();
            $this->assign('data',$data);
            return view();
         }



         
      }
      //修改密码
      public function updatepwd(){
         if(checkRequest()){
             $old_pwd=input('post.old_pwd');
             $new_pwd1=input('post.new_pwd1');
             $new_pwd2=input('post.new_pwd2');
             if(empty($old_pwd)){
                 fail("原密码必填");
             }else{
                 //获取用户信息
                 $admin_id=session('adminInfo.admin_id');
                 $where=[
                     'admin_id'=>$admin_id
                 ];
                 $info=model('Admin')->where($where)->find();
                 $admin_pwd=createPwd($old_pwd,$info['salt']);
                 if($admin_pwd!=$info['admin_pwd']){
                     fail( "原密码错误");
                 }
             }
             if(empty($new_pwd1)){
                fail("新密码必填");
             }else if(strlen($new_pwd1)<6 && strlen($new_pwd1)>16){
                fail("密码必须在6到16位");
             }
             if($new_pwd2!=$new_pwd1){
                  fali("确认密码必须和密码一致");
             }
             $updateinfo=[
                 'admin_pwd'=>createpwd($new_pwd1,$info['salt'])
             ];
             $res=model('Admin')->where($where)->update($updateinfo);
             if($res){
                 successly("修改成功");
             }else{
                 fail("修改失败");
             }
              

         }else{
             return view(); 
         }





         
      }





  }