<?php
namespace app\index\controller;
class Cart extends Common{
    //加入购物车
    public function cartadd(){
        $goods_id=input('post.goods_id');
        $buy_number=input('post.buy_number');
        if(empty($goods_id)){
            fail("请选择商品");exit;
        }
        if(empty($buy_number)){
            fail("请输入要购买的数量");exit;
        }
        //根据商品id查询商品信息
        $goodsWhere=[
            'goods_id'=>$goods_id
        ];
        $goods=model("Goods");
        $goodsInfo=$goods->where($goodsWhere)->find();
        if(empty($goodsInfo)){
            fail("请选择购物的商品");exit;
        }

        if($this->checkUserLogin()){
            $res=$this->addCartDb($goodsInfo,$buy_number);
        }else{
            $res=$this->addCartCookie($goodsInfo,$buy_number);
            /*  $cart=unserialize(base64_decode(cookie('cart')));
            print_r($cart);exit; */
        } 
       if($res){
          successly("加入购车成功,是否进入购物车列表");
       }else{
          fail("加入购物车失败");
       }

    }
     //购物车信息存cookie信息
     public function addCartCookie($goodsInfo,$buy_number){
        $goods_id=$goodsInfo['goods_id'];
        $now=time();
        $second=24*60*60*2;
        $cartInfo=$this->getCartCookie();

        if(!empty($cartInfo[$goods_id])){
            //数量做累加
           $cartInfo[$goods_id]['buy_number']=$cartInfo[$goods_id]['buy_number']+$buy_number;
            $cartInfo[$goods_id]['utime']=$now;
            //检测库存
            $this->checkNumber($goodsInfo,$cartInfo[$goods_id]['buy_number']);
            $cart=base64_encode(serialize($cartInfo));
            cookie('cart',$cart,$second);
            return true;
        }else{
            $cartInfo[$goods_id]=[
                'goods_id'=>$goods_id,
                'buy_number'=>$buy_number,
                'ctime'=>$now,
                'utime'=>$now
            ];
            //检测库存
            $this->checkNumber($goodsInfo,$buy_number);
            $cart=base64_encode(serialize($cartInfo));
            cookie('cart',$cart,$second);
            return true;

        }
     }
    //取出购物车的cookie信息
    public function getCartCookie(){
        $cart=cookie('cart');
        $cartInfo=[];
        if(empty($cart)){
            return $cartInfo;
        }else{
            $cartInfo=unserialize(base64_decode($cart));
            return $cartInfo;
        }
    }
    //购物车信息存数据库
    public function addCartDb($goodsInfo,$buy_number){
        $goods_id=$goodsInfo['goods_id'];
        //根据商品信息查询购物车表
        $cart=model('Cart');
        $cartWhere=[
            'goods_id'=>$goods_id,
            'user_id'=>$this->getUserId(),
        ];
        $cartInfo=$cart->where($cartWhere)->find();
        if($cartInfo){
            //累加(修改数据)
            $updateCart=[
                'buy_number'=>$cartInfo['buy_number']+$buy_number,
                'utime'=>time(),
                'status'=>1
            ];
            //检测库存
            $this->checkNumber($goodsInfo,$updateCart['buy_number']); 
            $res=$cart->where($cartWhere)->update($updateCart);
            if($res){
                return true;
            }else{
               return false;
            }

        }else{
           //添加
           $cartInfo=[
               'goods_id'=>$goods_id,
               'add_price'=>$goodsInfo['self_price'],
               'buy_number'=>$buy_number,
               'user_id'=>$this->getUserId()
           ];
           //检测库存
           $this->checkNumber($goodsInfo,$buy_number);
           $res=$cart->save($cartInfo);
           if($res){
             return true;
           }else{
             return false;
           }

        }
    }
    //购物车列表展示
    public function cartlist(){
        //获取左侧分类的数据
         $this->getIndexCateInfo();
        if($this->checkUserLogin()){
            //获取数据库购车车的信息
            $cartData =  $this->getCartInfoDb();
            $login=1;
        }else{
            $cartData= $this->getCartInfoCookie();
            $login=2;
        }
        $this->assign('login',$login);
        if(!empty($cartData)){
            $this->assign("cartData",$cartData);
        }else{
            $this->assign("cartData",$cartData);
        }
        return view();
    }
    
    //购物车修改数量
    public function cartUpdate(){
        $buy_number=input('post.buy_number',0,'intval');
        if(empty($buy_number)){
            fail("请输入购买的数量");
        }
        if($this->checkUserLogin()){
            //修改数据库 
            $cart_id=input('post.cart_id',0,'intval');
            if(empty($cart_id)){
                fail("请选择要更改数量的商品");
            }
           $res=$this->updateNumDb($cart_id,$buy_number);
           //dump($res);exit;
        }else{
           //修改cookie
           $goods_id=input("post.goods_id",0,"intval");
           if(empty($goods_id)){
              fail("请选择要更改数量的商品");
           }
           $res=$this->updateNumCookie($goods_id,$buy_number);
        }

        if($res){
            //successly("修改成功");
        }else{
            fail("修改失败");
        }

    }
    //修改数据库中的购物车的数量
    public function  updateNumDb($cart_id,$buy_number){
        $where=[
            'cart_id'=>$cart_id
        ];
        $data=[
            'buy_number'=>$buy_number
        ];
        $cart=model('Cart');
        $res=$cart->where($where)->update($data);
        return $res;
        
    }
    //修改cookie中购物车的数量
    public function updateNumCookie($goods_id,$buy_number){
        $cart_str=cookie('cart');
        if(empty($cart_str)){
            fail("购物车太空了");exit;
        }
       $cartInfo=unserialize(base64_decode($cart_str));
       $cartInfo[$goods_id]['buy_number']=$buy_number;
       $cart=base64_encode(serialize($cartInfo));
       $second=60*60*24;
       cookie("cart",$cart,$second); 
       return true;
       
    }
    //购物车删除 批量删除
    public function cartDel(){
        $type=input('post.type');
        if($this->checkUserLogin()){
            //删除数据库
           if($type==1){
                $cart_id=input('post.cart_id',0,'intval');
                if(empty($cart_id)){
                    fail("操作有误,请选择要删除的购物车数据");
                }
                $where=[
                    'cart_id'=>$cart_id
                ];
                $data=[
                    'status'=>2,
                    'buy_number'=>0
                ];
                $res=model('Cart')->where($where)->update($data);
           }else{
               //批量删除
              $cart_id=input("post.cart_id");
              if(empty($cart_id)){
                  fail('请选择您要删除的宝贝');
              }
              $where=[
                  'cart_id'=>["in",$cart_id]
              ];
              $data=[
                  'status'=>2,
                  'buy_number'=>0
              ];
              $res=model('Cart')->where($where)->update($data);
           }
           
           if($res){
               successly("删除成功");
           }else{
               fail("删除失败");
           }
        }else{
          //删除cookie
            if($type==1){
                $goods_id=input('post.goods_id',0,'intval');
                if(empty($goods_id)){
                    fail("操作有误,请选择要删除的购物车数据");
                }
                $cart_str=cookie("cart");
                if(empty($cart_str)){
                    fail("购物车太空了");
                }
                $cartInfo=unserialize(base64_decode($cart_str));
                unset($cartInfo[$goods_id]);
                $cart=base64_encode(serialize($cartInfo)); 
                cookie('cart',$cart);
                successly("删除成功");
          }else{
              //批量删除
              $goods_id=input("post.goods_id");
              if(empty($goods_id)){
                fail("操作有误,请选择要删除的购物车数据");
              }
              $goods_id=explode(",",$goods_id);
              $cart_str=cookie("cart");
              if(empty($cart_str)){
                fail("购物车太空了");
              }
              $cartInfo=unserialize(base64_decode($cart_str));
              foreach($goods_id as $k=>$v){
                  unset($cartInfo[$v]);
              }
              $cart=base64_encode(serialize($cartInfo)); 
              cookie('cart',$cart);
              successly("删除成功");              
          }
          
        }
    }
    //加入收藏 
    public function addCollection(){
        if(!checkRequest()){
            fail("请按正确流程加入收藏");
        }
        $type=input('post.type',0,'intval');
        $goods_id=input('post.goods_id');
        $user_id=$this->getUserId();
        if(empty($goods_id)){
            fail("请选择要加入收藏的商品");
        }
        $model=model("UserGoods");
        if($type==1){
            $data=[
                'user_id'=>$user_id,
                'goods_id'=>$goods_id
            ];
           $count= $model->where($data)->count();
           if($count>0){
               fail("该商品已经被收藏");
           }else{
              $res=$model->insert($data);
           }
          if($res){
              successly("收藏成功");
          }else{
              fail("收藏失败");
          }

        }else{
            //批量收藏
           $goods_id= explode(",",$goods_id);
           $num=0;
            foreach($goods_id as $k=>$v){
               $data=['user_id'=>$user_id,'goods_id'=>$v];
               $count=$model->where($data)->count();
               if($count==0){
                  $res=$model->insert($data);
               }else{
                  $num+=1;
               }
            }
           if(!empty($res)){
              if($num>0){
                  successly("您有".$num."件商品已经被收藏");
              }
               successly("收藏成功");
           }else{
               fail("所有商品已经被收藏");
           }





        }




    }
    //清空购物车
    public function emptyCart(){
        $cart_id=input('post.cart_id');
        if(empty($cart_id)){
           fail("购物车空空如也,请去选购吧");
        }
        $where=[
            'cart_id'=>['in',$cart_id]
        ];
        $update=[
            'status'=>2,
            'buy_number'=>0
        ];
        $cart=model("Cart");
        $res=$cart->where($where)->update($update);
        //dump($res);exit;
        if($res){
            successly("清空成功");
        }else{
            fail("清空失败");
        }
    }
   
    
    
}
