<?php
   namespace  app\admin\controller;
   use think\Controller;
   class Login extends Controller{
       //登录
    public function login(){
     if(checkRequest()){
        $admin_name=input('post.admin_name');
        $admin_pwd=input('post.admin_pwd');
        $mycode=input('post.mycode');
        if(empty($admin_name)||empty($admin_pwd)||empty($mycode)){
            fail("必填项不能为空");
        }
        if(!captcha_check($mycode)){
            //验证失败
            fail('验证码错误');
        };
        $where=[
            'admin_name'=>$admin_name
        ];
       $arr=model('Admin')->where($where)->find();
                    if(!empty($arr)){
                        $salt=$arr['salt'];
                        $pwd=createPwd($admin_pwd,$salt);
                        if($pwd==$arr['admin_pwd']){
                            //存取session
                        session('adminInfo',['admin_id'=>$arr['admin_id'],'admin_name'=>$arr['admin_name']]);
                        //修改用户最后一次登录的时间和ip地址
                        $updateWhere=[
                            'admin_id'=>$arr['admin_id']
                        ];
                        $updateInfo=[
                            'last_login_time'=>time(),
                            'last_login_ip'=>request()->ip()
                        ];
                        model('Admin')->save($updateInfo,$updateWhere);
                        successly('登录成功');
                        }else{
                            fail("账号或者密码错误") ;exit;
                        }
                    }else{
                            fail('账号或者密码错误');
                            }
                
      }else{
          //关闭layout
        $this->view->engine->layout(false); 
        return view();
     }
           
  }
      //退出
      public function quit(){
          //清除session
          session('adminInfo',null);
          $this->redirect('login/login');
      }
   }