<?php
namespace app\admin\controller;
use think\Controller;
 //header('content-type:text/html;charset=utf-8');
class Category extends Common
{
     //添加
    public function  cateAdd(){   
        if(checkRequest()){
            $data=input('post.');
            $validate=validate('Category');
            $result=$validate->check($data);
            if(!$result){
              fail($validate->getError());                         
            }
            $res=model('Category')->save($data); 
            //dump($res);
           if($res){
                successly('添加成功');
            }else{
                fail("添加失败");
            } 
        }else{
             $info=$this->getCateInfo();  
             $this->assign('info',$info);
             return view();
        }
        
       
    }
    //验证唯一性
    public function checkName(){
        $cate_name=input('post.cate_name');
        $cate_id=input('post.cate_id');
        $type=input('post.type');
        if($type==1){
            $where=[
                'cate_name'=>$cate_name
            ];
        }else{
            $where=[
                'cate_id'=>['neq',$cate_id],
                'cate_name'=>$cate_name
            ];

        }
        $res=model('Category')->where($where)->find();
        if($res){
            echo 0;
        }else{
            echo 1;
        }

    }
    //展示
    public function cateList(){
        $info=$this->getCateInfo();  
        $this->assign('info',$info);
        return view();
    }
    //获取分类数据
    public function getCateInfo(){
        $data=model('Category')->select();
        $info=getCateInfo($data);
        return $info;
    }
    //即点即改
    public function cateUpdateField(){
        $value=input('post.value');
        $field=input('post.field');
        $cate_id=input('post.cate_id');
        //判断唯一性
        if($field=="cate_name"){
            $where=[
                'cate_id'=>['neq',$cate_id],
                'cate_name'=>$value
            ];
            $arr=model('Category')->where($where)->find();
            if($arr){
                  fail("该分类名称已经存在");
            }
        }
        $where=[
            'cate_id'=>$cate_id
        ];
        $data=[
            $field=>$value
        ];
        $res=model('category')->save($data,$where);
        if($res===false){
            fail("修改失败");
        }else{
            successly("修改成功");
        }
    }
    //删除
    public function cateDel(){
        $cate_id=input('post.cate_id');
        //此分类下是否是有子类
        $cateWhere=[
            'pid'=>$cate_id
        ];
        $cate=model('Category')->where($cateWhere)->count();
        if($cate>0){
            fail("此分类下有子类或商品不能删除");
        }
        //此分类下是否有商品
        $where=[
            'cate_id'=>$cate_id
        ];
        $goods=model('Goods')->where($where)->count();
        if($goods>0){
            fail("此分类下有子类或商品不能删除") ;
        }
        $res=model('Category')->where($where)->delete();
        if($res){
            successly('删除成功');
        }else{
            fail("删除失败");
        }
    }
    //修改
    public function cateUpdate(){
        if(checkRequest()){
            $data=input('post.');
            $validate=validate('Category');
            $result=$validate->check($data);
            if(!$result){
              fail($validate->getError());                         
            }
            $where=[
                'cate_id'=>$data['cate_id']
            ];
            $res=model('Category')->save($data,$where);
            if($res===false){
                fail("修改失败");
            }else{
                successly('修改成功');
            }

        }else{
             $cate_id=input('get.cate_id');
             $where=[
                 'cate_id'=>$cate_id
             ];
             $arr=model('Category')->where($where)->find();
             $info=$this->getCateInfo();  
             $this->assign('info',$info);
             $this->assign('arr',$arr);
             return view();

        }
       
                
    }
    


}