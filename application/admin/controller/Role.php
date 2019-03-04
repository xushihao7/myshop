<?php
  namespace app\admin\controller;
  use think\Controller;
  use think\Db;
  class Role extends Controller{
      public function RoleAdd(){
          if(checkRequest()){
              $data=input('post.');
              // 启动事务
              Db::startTrans();
              $role=model('Role');
              $res1=$role->allowField(true)->save($data);
              //$res1=false;
              $role_id=$role->role_id;
              foreach($data['node_id'] as $k=>$v ){
                 $info[]=['role_id'=>$role_id,'node_id'=>$v];
              }
              $rolenode=model('RoleNode');
              $res2=$rolenode->saveAll($info);
              if($res1&&$res2){
                  // 提交事务
                 Db::commit();    
                 sussessly("提交成功");
              }else{
                   // 回滚事务
                  Db::rollback();
                  echo "回滚";
              }
          }else{
            $node=model('Node');
            $where=[
                'pid'=>0
            ];
            $nodeInfo=collection($node->where($where)->select())->toArray();
            //print_r($nodeInfo);exit;
            foreach($nodeInfo as $k=>$v){
                $info=collection($node->where(['pid'=>$v['node_id']])->select())->toArray();
                $nodeInfo[$k]['son']=$info;
            }
            $this->assign('nodeInfo',$nodeInfo);
            return view();
          }
         
      }
       
    
     
   
   


    

  }



 