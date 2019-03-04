<?php
namespace app\index\controller;
use think\Controller;
class Index extends Common
{
  
    public function index(){
        // $data=$this->getWebConfig();
        // dump($data);exit;
       //获取首页分类的数据
       $this->getIndexCateInfo();
       //处理楼层
       $cate_id=1;
       $info=$this->getFloodInfo($cate_id);
       //print_r($info['goodsInfo']);exit;
        //查询热门商品
        $goods=model("Goods");
        $where=[
            'is_hot'=>1,
            'is_sel'=>1,
        ];
        $hotInfo=$goods->where($where)->order("create_time","desc")->select();
        $this->assign('hotInfo',$hotInfo);
        $this->assign('info',$info); 
       return view();
    }
    public function getFloodInfo($cate_id){
        //处理楼层
       //获取顶级分类
       $model=model('Category');
       $topWhere=[
           'cate_id'=>$cate_id,
           'is_show'=>1
       ];
       $info['topData']=$model->field('cate_id,cate_name')->where($topWhere)->find();
       //获取二级分类
       $secondWhere=[
           'pid'=>$cate_id,
           'is_show'=>1
       ];
       $info['cateList']=$model->where($secondWhere)->select();
       //print_r($info['cateList']);exit;
       //获取商品数据
       $cateInfo=$model->where(['is_show'=>1])->select();
       $cateID=getCateId($cateInfo,$cate_id);
       $cateID=implode(",",$cateID);
       
       $goods=model('Goods');
       $goodsWhere=[
           'is_sel'=>1,
           'cate_id'=>['in',$cateID]
       ];
       $info['goodsInfo']=collection($goods->where($goodsWhere)->select())->toarray();
       return $info;
    }
    //获取下一个楼层的数据
    public function  getMoreFloor(){
        $cate_id=input('post.cate_id');
        $floor_num=input('post.floor_num');
        $floor_num=$floor_num+1;
        //根据当前楼层id获取下一个楼层的id
        $where=[
            'cate_id'=>['>',$cate_id],
            'pid'=>0,
            'is_show'=>1
        ];
        $cate=model('Category');
        $arr=$cate->field('cate_id')->where($where)->order('cate_id','asc')->find();
        $cate_id=$arr['cate_id'];
        if(!empty($cate_id)){
             $info=$this->getFloodInfo($cate_id);
            //关闭layout
            $this->view->engine->layout(false);
            $this->assign('info',$info);
            $this->assign('floor_num',$floor_num);
            echo $this->fetch('div');
        }
        
        
    }
   
}
