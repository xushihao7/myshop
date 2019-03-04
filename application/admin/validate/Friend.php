<?php 
   namespace app\admin\validate;
   use think\Validate;
   class Friend extends Validate{
    protected $rule =   [
        'name'  => 'require|checkName',
        'url'=>'require|url'
     ];
     protected $message  =   [
        'name.require'=>'分类名称不能为空',
        'url.require'=>'网址不能为空',
        'url.url'=>'请输入正确的网址'
     ];
    //验证分类的唯一性
    public function checkName($value,$rule,$data){
        if(empty($data['id'])){
            $where=[
                'name'=>$value
            ];
        }else{
            $where=[
                'id'=>['neq',$data['id']],
                'name'=>$value
            ];
        }
        $arr=model('friend')->where($where)->find();
        if(!empty($arr)){
            fail('友情链接名称已存在');
        }else{
            return true;
        }
    }






    }