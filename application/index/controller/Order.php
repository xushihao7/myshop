<?php
namespace app\index\controller;
class Order extends Common{
    //确认订单信息
    public function confirmSettlement(){
        //获取左侧分类的数据
        $this->getIndexCateInfo();
        //检测是否登录
        if(!$this->checkUserLogin()){
            $this->error("亲，请先登录",url("Login/login"));
        }
        //接收购物车id
        $cart_id=input('get.cart_id');
        if(empty($cart_id)){
            $this->error("请选择要结算的商品",url("Cart/cartlist"));
        }
        //查询购物车的id 是否是当前用户登录
        $user_id=$this->getUserId();
        $cartWhere=[
            'user_id'=>$user_id,
            'cart_id'=>['in',$cart_id],
            'status'=>1
        ];
        $cart_model=model("Cart");
        $cartInfo=collection($cart_model
                  ->alias("c")
                  ->join("shop_goods g","g.goods_id=c.goods_id")
                  ->where($cartWhere)
                  ->select())->toArray();
        if(empty($cartInfo)){
            $this->error("订单信息为空不能结算",url("Index/index"));
        }
        //查询当前用户的收货地址
        $addressWhere=[
            'user_id'=>$user_id,
        ];
        $addressInfo=$this->getAddressInfo($addressWhere);
        $this->assign('addressInfo',$addressInfo);
        $this->assign('cartInfo',$cartInfo);
        return view();
    }
    //提交订单信息
    public function confirmOrder(){
       if(!$this->checkUserLogin()){
           $this->error("请先登录",url("Login/login"));
       }
       $cart_id=input("post.cart_id");
       $type=input('post.type');
       $orderMessage=input('post.orderMessage');
       $user_id=$this->getUserId();
       if(empty($cart_id)){
           fail("请选择要结算的商品");
       }
       //查询购物车的id 是否是当前用户登录
       $cartWhere=[
           'user_id'=>$user_id,
           'cart_id'=>['in',$cart_id],
           'status'=>1
       ];
       $cart_model=model("Cart");
       $cartInfo=collection($cart_model
                 ->alias("c")
                 ->join("shop_goods g","g.goods_id=c.goods_id")
                 ->where($cartWhere)
                 ->select())->toArray();
       if(empty($cartInfo)){
           $this->error("订单信息为空不能结算",url("Index/index"));
       }
       //循环检测商品的库存
       foreach($cartInfo as $k=>$v){
        if($v['buy_number']>$v['goods_num']){
            unset($cartInfo[$k]);
        }
      }
       $order_model=model("Order");
       // 启动事务
       $order_model->startTrans();
       try{
            //订单表数据写入
              $order=[];
              //获取订单号
              $order_number=$this->getOrderNumber($user_id);
              $order['order_number']=$order_number;
              $order['user_id']=$user_id;
              $order_amount=0;
              $order_score=0;
              foreach($cartInfo as $k=>$v){
                  $order_amount+=$v['self_price']*$v['buy_number'];
                  $order_score+=$v['buy_number']*$v['goods_score'];
              }
              $order['order_amount']=$order_amount;
              $order['order_score']=$order_score;
              $order['order_messager']=$orderMessage;
              $order['pay_type']=$type; 
              if($type==2){
                  $order['order_status']=4;
              }
            $res=$order_model->save($order);
            $order_id=$order_model->order_id;
            //dump($res);exit;
            if(empty($res)){
                //回滚
                $order_model->rollback();
                throw new \Exception("下单失败");
            }
            //订单详情表数据写人
            $order_detail=[];
            foreach($cartInfo as $k=>$v){
                $order_detail[]=[
                    'user_id'=>$user_id,
                    'order_id'=>$order_id,
                    'goods_id'=>$v['goods_id'],
                    'goods_name'=>$v['goods_name'],
                    'self_price'=>$v['self_price'],
                    'goods_img'=>$v['goods_img'],
                    'buy_number'=>$v['buy_number']
                ];
            }
            $order_detail_model=model("OrderDetail");
            $res2=$order_detail_model->saveAll($order_detail);
            if(empty($res2)){
                //回滚
                $order_model->rollback();
                throw new \Exception("下单失败");
            }
            //订单收货地址表写入
            $id=input('post.id');
            $order_address=[];
            $order_address_where=[
                'user_id'=>$user_id
            ];
            $addressInfo=$this->getAddressInfo($order_address_where,$id);
            $order_address['user_id']=$user_id;
            $order_address['order_id']=$order_id;
            $order_address['province']=$addressInfo['province_name'];
            $order_address['city']=$addressInfo['city_name'];
            $order_address['district']=$addressInfo['district_name'];
            $order_address['address_man']=$addressInfo['address_man'];
            $order_address['address_tel']=$addressInfo['address_tel'];
            $order_address['detailed_address']=$addressInfo['detailed_address'];
            $order_address_model=model("OrderAddress");
            $res3=$order_address_model->save($order_address);
            if(empty($res3)){
                //回滚
                $order_model->rollback();
                throw new \Exception("下单失败");
            }
            //购物车数据清空
            $cart_model=model("Cart");
            $cart_where=[
                'user_id'=>$user_id,
                'cart_id'=>['in',$cart_id]
            ];
            $cart_update=[
                'status'=>2,
                'buy_number'=>0
            ];
            $res4=$cart_model->where($cart_where)->update($cart_update);
            if(empty($res4)){
                //回滚
                $order_model->rollback();
                throw new \Exception("下单失败");
            }
            //商品表商品数量修改
            $goods_model=model('Goods');
            foreach($cartInfo as $k=>$v){
                $goods_where=[
                    'goods_id'=>$v['goods_id'],
                    
                ];
                $goods_update=[
                    'goods_num'=>$v['goods_num']-$v['buy_number']
                ];
               $res5=$goods_model->where($goods_where)->update($goods_update);
              
            }

            if(empty($res5)){
                //回滚
                $order_model->rollback();
                throw new \Exception("下单失败");
            }
            $order_model->commit();
            echo json_encode(['font'=>'下单成功','code'=>1,'order_id'=>$order_id]); 
       }catch(\Exception $e){
            fail($e->getMessage());
       }
       


    }
    //获取订单号
    public function getOrderNumber($user_id){
          //标志年月日用户id随机数组
          $date=date("ymd");
          $user_id=str_repeat("0",4-strlen($user_id)).$user_id;
          $order_number="1".$date.$user_id.rand(1000,9999);
          return $order_number;
    }
    //订单成功
    public function orderSuccess(){
        //获取左侧分类的数据
        $this->getIndexCateInfo();
        //获取订单的id
        $order_id=input('get.order_id',0,'intval');
        try{
            if(empty($order_id)){
              throw  new \Exception("订单操作失误");
            }

           $order_model=model("Order");
           $orderWhere=[
               'order_id'=>$order_id
           ];
           $orderInfo=$order_model->where($orderWhere)->find();
           if(empty($orderInfo)){
               throw new \Exception("没有此订单的信息");
           }
           $this->assign("orderInfo",$orderInfo);
        }catch(\Exception $e){
           fail($e->getMessage());
        }
        return view();
    }
    //支付宝支付
    public function alipay(){
        //获取订单号
        $order_number=input('get.order_number');
        //获取订单信息
        $orderWhere=[
            'order_number'=>$order_number
        ];
        $orderInfo=$this->getorderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error("该订单有误",url("Index/index"));
        }
        //支付宝支付
        $config=config("alipay_config");
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        require_once EXTEND_PATH.'alipay/pagepay/buildermodel/AlipayTradePagePayContentBuilder.php';

            //商户订单号，商户网站订单系统中唯一订单号，必填
            $out_trade_no = $orderInfo['order_number'];

            //订单名称，必填
            $subject = "电子商城购物网支付";

            //付款金额，必填
            $total_amount =$orderInfo['order_amount'];

            //商品描述，可空
            $body = '';
            //构造参数
            $payRequestBuilder = new \AlipayTradePagePayContentBuilder();
            $payRequestBuilder->setBody($body);
            $payRequestBuilder->setSubject($subject);
            $payRequestBuilder->setTotalAmount($total_amount);
            $payRequestBuilder->setOutTradeNo($out_trade_no);
            $aop = new \AlipayTradeService($config);
            $response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);
            //输出表单
            var_dump($response);
        

    }
    //同步通知的地址
    public function  paysuccess(){
        $param=input("get.");
        //验证订单号
        $orderWhere=[
            'order_number'=>$param['out_trade_no']
        ];
        $orderInfo=$this->getorderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error("该订单有误",url("Index/index"));
        }
        //验证订单金额
        if($orderInfo['order_amount']!=$param['total_amount']){
            $this->error("订单金额错误",url("Index/index"));
        }

       //验证签名
        $config=config("alipay_config");
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        $arr=$_GET;
        $alipaySevice = new \AlipayTradeService($config); 
        $result = $alipaySevice->check($arr);
        if($result) {//验证成功
            $this->assign("orderInfo",$orderInfo);
            //获取左侧分类的数据
            $this->getIndexCateInfo();
            return view();
        }
        else {
            //验证失败
            echo "验证失败";
        }



        

        

    }  
    //异步通知的地址
    public  function notify(){
        $param=input("post.");
        $finame='/data/wwwroot/default/myshop/notify.log';
        file_put_contents(
            $finame,
            print_r($param,true),
            FILE_APPEND
            );
        //验证订单号是否正确
        $order_number=$param['out_trade_no'];
        $orderWhere=[
            'order_number'=>$order_number
        ];
        $orderInfo=$this->getorderInfo($orderWhere);
        if(empty($orderInfo)){
           file_put_contents(
               $finame,
               'order_number no found',
               FILE_APPEND
           );
           echo 'order_number error';exit;
        }
        //验证订单金额
        if($orderInfo['order_amount']!=$param['total_amount']){
            file_put_contents(
                $finame,
                'order_amount error',
                FILE_APPEND
            );
            echo 'order_amount error';exit;
        }

        //验证签名
        $config=config("alipay_config");
        require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
        $alipaySevice = new \AlipayTradeService($config);
        $result = $alipaySevice->check($param);
        if(empty($result)) {
            file_put_contents(
                $finame,
                'sign error',
                FILE_APPEND
            );
            echo 'sign error';exit;
        }
        //验证应用id
        if($config['app_id']!=$param['app_id']){
            file_put_contents(
                $finame,
                'app_id error',
                FILE_APPEND
            );
            echo 'app_id error';exit;
        }
        //验证状态 已支付
        if($orderInfo['pay_status']==2){
            file_put_contents(
                $finame,
                'pay_status pass ',
                FILE_APPEND
            );
            echo 'success';
        }
        //改支付状态 支付时间  订单状态 修改时间
        if($orderInfo['pay_status']==1){
            $data=[
                'pay_status'=>2,
                'order_status'=>3,
                'pay_time'=>time(),
                'utime'=>time(),
             

            ];
            $where=[
                'order_number'=>$order_number
            ];
            $order_model=model('Order');
            $res=$order_model->where($where)->update($data);

            if($res){
                file_put_contents(
                    $finame,
                    'pay_status pass',
                    FILE_APPEND
                );
                echo "success";
            }else{
                file_put_contents(
                    $finame,
                    'pay_status fail',
                    FILE_APPEND
                );
                echo "fail";exit;
            }

        }


    }
    //取消订单
    public function orderCancel(){
        //接收订单号
        $order_number=input("post.order_number");
        $orderWhere=[
            'order_number'=>$order_number
        ];
        $orderInfo=$this->getorderInfo($orderWhere);
        if(empty($orderInfo)){
            $this->error("该订单有误","Index/index");
        }
        $order_model=model('Order');
        $order_model->startTrans();
        try{
            //订单表里面 订单状态变为2
            $order_data=[
                'order_status'=>2
            ];
            $res=$order_model->where($orderWhere)->update($order_data);
            if(empty($res)){
                $order_model->rollback();
                throw  new \Exception("取消订单失败");
            }
            //商品表 库存加回
            $order_id=$orderInfo->order_id;
            $order_detail=model("OrderDetail");
            $detailInfo =collection($order_detail->where(['order_id'=>$order_id])->select()) ->toArray();
            foreach ($detailInfo as $k=>$v){
                $goodsWhere=[
                    'goods_id'=>$v['goods_id']
                ];
                $goods_model=model("Goods");
                $goodsInfo=$goods_model->field('goods_id,goods_num')->where($goodsWhere)->select();
                foreach ($goodsInfo as $kk=>$vv){
                    $goodsData=[
                        'goods_num'=>$vv['goods_num']+$v['buy_number']
                    ];
                    $res2=$goods_model->where($goodsWhere)->update($goodsData);

                }
            }
            if(empty($res2)){
                $order_model->rollback();
                throw  new Exception("订单取消失败");
            }
            $order_model->commit();
            successly("取消订单成功");
        }catch (\Exception $e){
            fail($e->getMessage());
        }

    }
    //退款
    public  function refund(){
        if(checkRequest()){
            //得到订单号 付款金额  商品id 购买数量 订单id
            $order_number=input("post.order_number");
            $self_price=input("post.self_price");
            $goods_id=input("post.goods_id");
            $buy_number=input("post.buy_number");
            //验证订单信息
            $orderWhere=[
                'order_number'=>$order_number
            ];
            $orderInfo=$this->getOrderInfo($orderWhere);

            if(empty($orderInfo)){
                $this->error('当前订单有误',url('Index/index'));exit;
            }

            $config=config("alipay_config");
            require_once EXTEND_PATH.'alipay/pagepay/service/AlipayTradeService.php';
            require_once EXTEND_PATH.'alipay/pagepay/buildermodel/AlipayTradeRefundContentBuilder.php';

            //商户订单号，商户网站订单系统中唯一订单号
            $out_trade_no = $order_number;
            //支付宝交易号
            $trade_no = "";
            //请二选一设置
            //需要退款的金额，该金额不能大于订单金额，必填
            $refund_amount = $self_price;

            //退款的原因说明
            $refund_reason = "";

            //标识一次退款请求，同一笔交易多次退款需要保证唯一，如需部分退款，则此参数必传
            $out_request_no = "";

            //构造参数
            $RequestBuilder=new \AlipayTradeRefundContentBuilder();
            $RequestBuilder->setOutTradeNo($out_trade_no);
            $RequestBuilder->setTradeNo($trade_no);
            $RequestBuilder->setRefundAmount($refund_amount);
            $RequestBuilder->setOutRequestNo($out_request_no);
            $RequestBuilder->setRefundReason($refund_reason);
            $aop = new \AlipayTradeService($config);
            $response = $aop->Refund($RequestBuilder);
            if($response->msg=="Success"){
                $order_model=model("Order");
                $order_id=$orderInfo['order_id'];
                  //修改订单表里面订单状态
                  $order=$order_model->startTrans();
                  try{

                      $orderData=[
                          'order_status'=>2
                      ];
                      $res=$order_model->where($orderWhere)->update($orderData);
                      if($res===false){
                           $order_model->rollback();
                           throw  new \Exception("退款失败");
                      }
                          //修改订单详情表里面的商品状态
                          $detail_model=model("OrderDetail");
                          $detailWhere=[
                              'order_id'=>$order_id
                          ];
                          $detailData=[
                              'goods_status'=>2
                          ];
                          $res2=$detail_model->where($detailWhere)->update($detailData);
                          if($res===false){
                              $order_model->rollback();
                              throw  new \Exception("退款失败");
                          }
                      //根据商品id修改商品库存
                      $goods_model=model("Goods");
                      $goodsWhere=[
                          'goods_id'=>$goods_id
                      ];
                      $goodsInfo=$goods_model->field("goods_num")->where($goodsWhere)->select();
                      foreach ($goodsInfo as $k=>$v){
                          $goodsData=[
                              'goods_num'=>$v['goods_num']+$buy_number
                          ];
                          $res3=$goods_model->where($goodsWhere)->update($goodsData);
                          if($res3===false){
                              $order_model->rollback();
                              throw  new \Exception("退款失败");
                          }
                      }
                      $order_model->commit();
                      successly("退款成功");
                  }catch ( \Exception $e){
                      fail($e->getMessage());
                  }


            }else{
                fail("退款失败");
            }


        }else{
            //获取左侧分类的数据
            $this->getIndexCateInfo();
            $order_id=input("get.order_id");
            $order_number=input("get.order_number");
            //根据订单id查询商品信息
            $order_detail_model=model("OrderDetail");
            $where=[
                'order_id'=>$order_id,
                'goods_status'=>1
            ];
            $goodsInfo=$order_detail_model->where($where)->select();
            $this->assign('goodsInfo',$goodsInfo);
            $this->assign("order_number",$order_number);
            return view();
        }



    }
    
    
    
}
