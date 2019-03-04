<?php 
   namespace app\index\validate;
   use think\Validate;
   class User extends Validate{
    protected $rule =   [
               'user_email'  => 'require|email|checkEmail|unique:user', 
               'user_tel'=>'require|checkTel|unique:user',
               'user_code'=>'require|checkCode',
               'user_pwd'=>'require|checkPwd',
               'user_pwd1'=>'require|confirm:user_pwd',
              
            ];
        
            protected $message  =   [
               'user_email.require'=>'邮箱不能为空',
               'user_email.email'=>'邮箱格式不正确',
               'user_email.unique'=>'邮箱已经存在',
               'user_tel.unique'=>'手机号已经存在',
               'user_code.require'=>'验证码不能为空',
               'user_pwd.require'=>'密码不能为空',
               'user_pwd1.require'=>'确认密码不能为空',
               'user_pwd1.confirm'=>'确认密码必须和密码一致',
               'user_tel.require'=>'手机号不能为空'
                 
            ];
            protected $scene = [
                'register_email'  =>  ['user_email','user_code','user_pwd','user_pwd1'],
                'register_tel'=>['user_tel','user_code','user_pwd','user_pwd1']
           ];
            
             //自定义邮箱
           public  function checkEmail($value,$rule,$data){
               $email=session('Info.email');
               if($value!=$email){
                   return "当前邮箱与已发送的邮箱不一致";
               }else{
                   return true;
               }
           }
         
           //自定义验证码
           public  function checkCode($value,$rule,$data){
               $code=session('Info.code');
               $time=session('Info.time');
               if($code!=$value){
                   return "验证码有误";
               }else if(time()-$time>300){
                   return "验证码失效,五分钟内输入有效";
               }else{
                   return true;
               }
           } 
           //自定义密码
           public function checkPwd($value,$rule,$data){
               $reg="/^.{6,16}$/";
               if(!preg_match($reg,$value)){
                   return "密码必须为6-16位";
               }else{
                   return true;
               }
           }  
           //自定义手机号
           public function checkTel($value,$rule,$data){
               $reg="/^1[3-9]\d{9}$/";
               $tel=session("Info.tel");
                //dump($tel);exit;
               if(!preg_match($reg,$value)){
                   return "请输入正确的手机号";
               }else if($value!=$tel) {
                   return "当前手机号与发送的手机号不一致";
               }else{
                   return true;
               }
           }       
            
        
        
   }