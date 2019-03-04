<?php 
   namespace app\admin\validate;
   use think\Validate;
   class Brand extends Validate{
    protected $rule =   [
        'brand_name'  => 'require|checkName',
        'brand_url'=>'require|url',
        'brand_logo'=>'require',
        'brand_describe'=>'require'
        
         
     ];
     protected $message  =   [
        'brand_name.require'=>'品牌不能为空',
        'brand_url.require'=>'网址不能为空',
        'brand_url.url'=>"请输入正确的网址", 
        'brand_logo'=>'logo不能为空',
        'brand_describe'=>'描述不能为空'  
     ];
     protected $scene = [
        'edit'  =>  ['brand_name','brand_url','brand_describe'],
        'add'=>['brand_name','brand_url','brand_logo','brand_describe'],
     ];
     //验证品牌的唯一性
     public function checkName($value,$rule,$data){
                if(empty($data['brand_id'])){
                    $where=[
                        'brand_name'=>$value
                    ];
                }else{
                    $where=[
                        'brand_id'=>['neq',$data['brand_id']],
                        'brand_name'=>$value
                    ];
                }
                $arr=model('brand')->where($where)->find();
                if(!empty($arr)){
                    fail('品牌名称已存在');
                }else{
                    return true;
                }
     }



   }