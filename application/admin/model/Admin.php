<?php
   namespace app\admin\model;
   use think\Model;
  
   class Admin extends Model{ 
       protected $updateTime = false;
       protected $insert=['salt'];//数据完成
       protected $salt;
      //修改器处理密码
      public function setAdminPwdAttr($value){
          //生成盐值
          $this->salt=$salt = createSalt();
          return createPwd($value,$salt);
        
      }
      public function setSaltAttr(){
             return $this->salt;
      }
   }