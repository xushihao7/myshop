<?php
   namespace app\admin\model;
   use think\Model;
   class Brand extends Model{
       protected $table='shop_brand';
       protected $updateTime = false;
       public function getInfo($page,$limit){
          $data=$this->page($page,$limit)->select();
          foreach($data as $k=>$v){
            $data[$k]['brand_show']=$v['brand_show']==1?'√':'×';
         }
         return $data;
       }
   }