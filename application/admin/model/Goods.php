<?php
   namespace app\admin\model;
   use think\Model;
   class Goods extends Model{
       protected $table='shop_goods';
      //protected $createTime = 'goods_time';
      protected $updateTime = false;

      public function getGoodsInfo($page,$limit,$where){
          //三表联查
         $data=$this->field("g.*,cate_name,brand_name")->alias('g')->join('shop_category c','g.cate_id=c.cate_id')->join('shop_brand b',"g.brand_id=b.brand_id")->where($where)->page($page,$limit)->select();
         
         //展示√ ×
        foreach($data as $k=>$v){
            $data[$k]['is_sel']=$v['is_sel']==1?'√':'×';
            $data[$k]['is_new']= $v['is_new']==1?'√':'×';
            $data[$k]['is_best']= $v['is_best']==1?'√':'×';
            $data[$k]['is_hot']= $v['is_hot']==1?'√':'×';
        }  
        return $data;
      }
      public function countInfo($where){
        $count=$this->field("g.*,cate_name,brand_name")->alias('g')->join('shop_category c','g.cate_id=c.cate_id')->join('shop_brand b',"g.brand_id=b.brand_id")->where($where)->count();
        return $count;
      }
   }