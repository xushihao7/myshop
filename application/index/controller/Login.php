<?php
  namespace app\index\controller;
  use think\Controller;
  class Login extends Common{
      //登录
        public function login(){
            if(checkRequest()){
                 $account=input('post.account');
                 $user_pwd=input('post.user_pwd');
                 $remember_me=input('post.remember_me');
                 if(empty($account)){
                     fail("手机号或者邮箱不能为空") ;
                 }
                 if(empty($user_pwd)){
                     fail("密码不能为空");
                 }
                 //处理条件判断是邮箱还是手机号
                 if(substr_count($account,'@')){
                    $where=[
                        'user_email'=>$account
                    ];
                 }else{
                     $where=[
                         'user_tel'=>$account
                     ];
                 }
                 $user=model('User');
                 $info=$user->where($where)->find();
                 $time=time();
                 $last_error_time=$info['last_error_time'];
                 $error_num=$info['error_num'];
                 $where=[
                     'user_id'=>$info['user_id'],   
                 ];
                 if(!empty($info)){
                    if(md5($user_pwd)==$info['user_pwd']){
                         //大于5次在一小时之内
                         if($error_num>=5 && $time-$last_error_time<3600){
                            $second=60-ceil(($time-$last_error_time)/60);
                           fail("账号已经锁定 还有".$second."分钟登录");
                         }
                         //次数清零 最后错误时间为空
                         $updateInfo=[
                             'error_num'=>0,
                             'last_error_time'=>null
                         ];
                         $res=$user->save($updateInfo,$where);
                         //存取用户session
                         $userInfo=[
                             'user_id'=>$info['user_id'],
                             'account'=>$account,
                             'time'=>time()
                         ];
                         session('userInfo',$userInfo);
                         //判断是否10天免登录
                         if($remember_me=="true"){
                             $day=60*60*24*10;
                             cookie("account",$account,$day);
                             cookie("user_pwd",$user_pwd,$day);
                         }
                        //同步浏览记录到数据库
                        $this->asyncHistory();
                        //同步购物车到数据库
                        $this->asyncCart();
                        successly("登录成功");
                       




                    }else{
                        if($time-$last_error_time>3600){
                            $updateInfo=[
                                'error_num'=>1,
                                'last_error_time'=>time()
                            ]; 
                         $res=$user->save($updateInfo,$where);
                         if($res){
                            fail("账号或者密码错误，您还有4次输入的机会") ;
                         }
                           
                        }else{
                            if($error_num>=5){
                              $second=60-ceil(($time-$last_error_time)/60);
                              fail("账号已经锁定 还有".$second."分钟登录");
                            }else{
                                
                                $num=$error_num+1;
                                $updateInfo=[
                                    'error_num'=>$num,
                                    'last_error_time'=>time()
                                ];
                                $res=$user->save($updateInfo,$where);
                                if($num==5){
                                     fail("账号被锁定,一小时之后登录");
                                }else{
                                    fail('账号或者密码错误,您还有'.(5-$num).'次的机会') ;
                                }
                                
                            }
                        }
                       
                    }


                 }else{
                     fail("账号或者密码错误") ;
                 }


            }else{
                $this->view->engine->layout(false);
                return view();
            }
            
        }
        //注册
        public function register(){
            if(checkRequest()){
               $data=input('post.');
               $type=input('get.type'); 
               $validate=validate('User');
               if($type==1){
                  $res=$validate->scene('register_email')->check($data);
                  $account=$data['user_email'];
               }else{
                  $res=$validate->scene('register_tel')->check($data); 
                  $account=$data['user_tel'];
               }

               if($res){
                   $user=model('User');
                   $res=$user->allowField(true)->save($data);
                   if($res){
                       //存取用户信息
                     $userInfo=[
                       'user_id'=>$user->user_id,
                       'account'=>$account
                       ];
                       session('userInfo',$userInfo);
                       successly('注册成功');
                   }else{
                       fail("注册失败");
                   }
                  
               }else{
                  fail($validate->getError()) ;
               }

            }else{
               $this->view->engine->layout(false);
               return view(); 
            }
            
         }
         //发送邮件
         public function sendEmail(){
             $email=input('post.email');
             $where=[
                     'user_email'=>$email
            ];
            $res=model('User')->where($where)->find();
            if($res){
                fail("该邮箱已经存在");
            };
             //随机验证码
             $code=createCode();
             $res=sendEmail($email,$code);
            
             if($res){
                 //存取session
                    $emailInfo=[
                        'email'=>$email,
                        'code'=>$code,
                        'time'=>time()
                    ];
                   session('Info',$emailInfo);
                   successly("发送成功");
             }else{
                 fail("发送失败");
             }
         }
         //发送短信
         public function sendTel(){
            $tel=input('post.tel');
            $where=[
                'user_tel'=>$tel
            ];
            $res=model('User')->where($where)->find();
            if($res){
                fail("该手机号已经存在");
            };
            $code=createCode();
            $res=sendSms($tel,$code);
            if($res){ 
                $emailInfo=[
                    'tel'=>$tel,
                    'code'=>$code,
                    'time'=>time()
                ];
                session('Info',$emailInfo); 
                successly("发送成功");
            }else{
                 fail("发送失败");
            } 
            
        }
         
         //退出
         public function quit(){  
             session('userInfo',null);
             cookie('account',null);
             cookie('user_pwd',null);
             $this->redirect("Index/index");
         }
         
       
  }