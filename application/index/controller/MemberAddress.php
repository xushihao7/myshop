<?php
namespace app\index\controller;
use think\Controller;
class MemberAddress extends Common
{
    public function address(){
    
       //判断是否登录
       if(!$this->checkUserLogin()){
           $this->error("请先登录",url('Login/login'));exit;
       }
       //添加
       if(checkRequest()){
                $data=input('post.'); 
                $address=model('Address');
                 //验证器
                $validate=validate('Address');
                $result=$validate->check($data);
                if(!$result){
                  fail($validate->getError());         
                }
                
                //判断是否设置为默认地址
                if($data['is_default']==1){
                    $where=[
                        'user_id'=>session('userInfo.user_id')
                    ];
                    $res2=$address->where($where)->update(['is_default'=>2]);
                }
                $res=$address->save($data);
                if($res){
                    successly("添加成功");
                }else{
                    fail("添加失败");
                }
       }else{
             //查询当前用户所有的收货地址
             $address=model('address');
             $where=[
                 'user_id'=>session('userInfo.user_id')
             ];
             $addressInfo=$address->getAddressInfo($where);
            //获取所有省份
            $provinceInfo=$this->getAreaInfo(0);
            $this->assign('provinceInfo',$provinceInfo);
            $this->assign('address',$addressInfo);

            return view();
       }
    }
    //三级联动
    public function getArea(){
        $id=input('post.id');
        $info=$this->getAreaInfo($id);
        echo json_encode($info);
    }
    //获取区域信息
    public function getAreaInfo($id){
        $area=model('Area');
        $where=[
            'pid'=>$id
        ];
        $info=$area->where($where)->select();
        return $info;
    }
    //删除
    public function addressDel(){
        $address=model('Address');
        $id=input('post.id',0,'intval');
        if(empty($id)){
            fail("非法操作此页面");
        }
        $where=[
            'id'=>$id
        ];
        $res=$address->where($where)->delete();
        if($res){
            successly("删除成功");
        }else{
            fail("删除失败");
        }
        
    }
    //修改默认地址
    public function changeCheck(){
        $id=input('post.id');
        $address=model('Address');
        
        $where=[
            'user_id'=>session('userInfo.user_id')
        ];
        $res=$address->where($where)->update(['is_default'=>2]);
        $checkWhere=[
            'user_id'=>session('userInfo.user_id'),
            'id'=>$id
        ];
        $res1=$address->where($checkWhere)->update(['is_default'=>1]);
        
        if($res1){
            successly('设置成功');
        }else{
            fail("设置失败");
        } 
    }
    //修改
    public function addressupdate(){
        if(checkRequest()){
             $id=input('post.id');
             $data=input('post.');
             $address=model('Address');
             //验证器
             $validate=validate('Address');
                $result=$validate->check($data);
                if(!$result){
                  fail($validate->getError());         
                }




             //处理默认选中
             if($data['is_default']==1){
                 $where=[
                     'user_id'=>session('userInfo.user_id'),
                 ];
                 $res=$address->where($where)->update(['is_default'=>2]);
             } 
             $updateWhere=[
                 'id'=>$id
             ];
             $res2=$address->save($data,$updateWhere);
             if($res2){
                 successly("修改成功");
             }else{
                 fail("修改失败");
             }

        }else{
            $id=input('get.id',0,'intval');
            $address=model('Address');
            $where=[
                'id'=>$id
            ];
            $addressInfo=$address->where($where)->find();
            //获取所有省份
            $provinceInfo=$this->getAreaInfo(0);
            //获取所有市
            $city=$this->getAreaInfo($addressInfo['province']);
            //获取所有县/区
            $district=$this->getAreaInfo($addressInfo['city']);
            $this->assign('provinceInfo',$provinceInfo);
            $this->assign('city',$city);
            $this->assign('district',$district);
            $this->assign('addressInfo',$addressInfo);
            return view(); 
        }
        
    }
    
}