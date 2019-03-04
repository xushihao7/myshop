<?php 
  namespace app\index\controller;
  class MemberOrder extends Common{
      //订单展示
      public function orderList(){
          if(!$this->checkUserLogin()){
              $this->error("请先登录",url('Login/login'));
          }
          $orderWhere=[
              'user_id'=>$this->getUserId()
          ];
          $order_model=model('Order');
          $orderInfo=$order_model->where($orderWhere)->select();
          $this->assign('orderInfo',$orderInfo);
          return view();
      }
      public function orderDetail(){
            $order_number=input('get.order_number');
            $data=$this->test($order_number);
            $this->assign('data',$data);
            return view();
     }
     //追踪物流
      public function test($order_number){
        $showapi_appid = '83147';  //替换此值,在官网的"我的应用"中找到相关值
        $showapi_secret = '28ebc754d56a49bb9726816e1a94a65b';  //替换此值,在官网的"我的应用"中找到相关值
        $paramArr = array(
        'showapi_appid'=> $showapi_appid,
            'com'=> "yuantong",
            'nu'=> "802854077925498422"
        //添加其他参数
        );
        //创建参数(包括签名的处理)
        function createParam ($paramArr,$showapi_secret) {
        $paraStr = "";
        $signStr = "";
        ksort($paramArr);
        foreach ($paramArr as $key => $val) {
        if ($key != '' && $val != '') {
        $signStr .= $key.$val;
        $paraStr .= $key.'='.urlencode($val).'&';
        }
        }
        $signStr .= $showapi_secret;//排好序的参数加上secret,进行md5
        $sign = strtolower(md5($signStr));
        $paraStr .= 'showapi_sign='.$sign;//将md5后的值作为参数,便于服务器的效验
        return $paraStr;
        }
        $param = createParam($paramArr,$showapi_secret);
        $url = 'http://route.showapi.com/64-19?'.$param;
        $result = file_get_contents($url);
        $result = json_decode($result); 
        $data=$result->showapi_res_body->data; 
        return $data;
     }
  }