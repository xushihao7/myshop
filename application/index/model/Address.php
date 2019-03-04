<?php
  namespace app\index\model;
  use think\Model;
  class Address extends Model{
    protected $updateTime = false;
    protected $table="shop_address";
    //数据完成
    protected $insert = ['user_id'];    
    protected function setUserIDAttr()
    {
          return session('userInfo.user_id');
    }
    //获取所有的收货地址
    public function getAddressInfo($where){
       $addressInfo=$this->where($where)->select();
       $area=model('area');
       foreach($addressInfo as $k=>$v){
            //查询3次改值
           /* $addressInfo[$k]['province']=$area->where(['id'=>$v['province']])->value('name');
           $addressInfo[$k]['city']=$area->where(['id'=>$v['city']])->value('name');
           $addressInfo[$k]['district']=$area->where(['id'=>$v['district']])->value('name'); */
           //查询一次
           $areaWhere=[
              'id'=>['in',[$v['province'],$v['city'],$v['district']]]
           ];
           $field=$area->where($areaWhere)->column('name');
           $addressInfo[$k]['address']=implode("",$field);  
       }
       return $addressInfo;
    }
    
  }