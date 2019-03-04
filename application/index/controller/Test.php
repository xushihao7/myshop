<?php
   namespace app\index\controller;
   use think\Controller;
   class Test extends Controller{
       //发送邮箱验证码
        public  function test(){
           /* $res=sendEmail('18237243730@163.com','51805180');
           dump($res); */
           $res=sendSms('18252180309','54181452');
           echo $res->Code;
        }
  
   }