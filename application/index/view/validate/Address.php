<?php 
   namespace app\index\validate;
   use think\Validate;
   class Address extends Validate{
    protected $rule =   [
               'province'=>'checkProvince',
               'city'=>'checkCity',
               'district'=>'checkDistrict',
               'address_man'=>'require',
               'detailed_address'=>'require',
               'address_tel'=>'require|checkTel',
               'send_time'=>'require'
              
            ];
        
            protected $message  =   [
                
               'address_man.require'=>'收货人姓名不能为空',
               'detailed_address.require'=>'详细地址不能为空',
               'address_tel.require'=>'手机不能为空',
               'send_time.require'=>'最佳送货时间不能为空'
                 
            ];
            public function checkProvince($value,$rule,$data){
                if($value==0){
                    return "省份不能为空";
                }else{
                    return true;
                }
            
            }
            public function checkCity($value,$rule,$data){
                if($value==0){
                    return "城市不能为空";
                }else{
                    return true;
                }
            
            }
            public function checkDistrict($value,$rule,$data){
                if($value==0){
                    return "区/县不能为空";
                }else{
                    return true;
                }
            
            }
           //自定义手机
           public function checkTel($value,$rule,$data){
               $reg="/^1[3-9]\d{9}$/";
               if(!preg_match($reg,$value)){
                   return "请输入正确的手机号";
               }else{
                   return true;
               }
           }  
           
            
        
        
   }