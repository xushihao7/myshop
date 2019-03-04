<?php
  namespace app\admin\controller;
  use think\Controller;
  class Search extends Controller{
      public function show(){  
          
          if(checkRequest()){
                $value=input('post.value');
                $where=[
                    'content'=>['like',"%$value%"]
                ];
                $arr=model('Search')->distinct(true)->field('content')->where($where)->order('id desc')->limit(10)->select();
                $info=[
                    'arr'=>$arr
                ];
                echo json_encode($info);
          }else{
                return view();
          }
        
          /* $arr=model('search')->distinct(true)->field('content')->order('id desc')->limit(10)->select();
          $this->assign('arr',$arr); */
         
      }
      public function add(){
          $data=input('post.');
          $res=model('Search')->save($data);
          if($res){
              $this->redirect("Search/show");
          }
      }
     
      
  }