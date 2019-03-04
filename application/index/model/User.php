<?php 
  namespace app\index\model;
  use think\Model;
  class User extends Model{
   
     protected $createTime = 'user_time';
     protected $updateTime = false;
     //密码修改器
     public function setUserPwdAttr($value){
         return md5($value);
     }

  }