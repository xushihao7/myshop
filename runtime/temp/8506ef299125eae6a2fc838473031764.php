<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:85:"/data/wwwroot/default/myshop/public/../application/index/view/order/ordersuccess.html";i:1545204409;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1545204128;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/head.html";i:1545204411;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1545204412;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/foot.html";i:1545204411;}*/ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <script src="__STATIC__/layui/layui.js"></script>
 <link type="text/css" rel="stylesheet" href="__STATIC__/index/css/style.css" />
 
    <!--[if IE 6]>
    <script src="__STATIC__/index/js/iepng.js" type="text/javascript"></script>
        <script type="text/javascript">
           EvPNG.fix('div, ul, img, li, input, a'); 
        </script>
    <![endif]-->    
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.11.1.min_044d0927.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/jquery.bxslider_e88acd1b.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/jquery-1.8.2.min.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/menu.js"></script>        
	<script type="text/javascript" src="__STATIC__/index/js/select.js"></script> 
	<script type="text/javascript" src="__STATIC__/index/js/lrscroll.js"></script> 
    <script type="text/javascript" src="__STATIC__/index/js/iban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/fban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/f_ban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/mban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/bban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/hban.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/tban.js"></script>
	<script type="text/javascript" src="__STATIC__/index/js/lrscroll_1.js"></script>       
	<script type="text/javascript" src="__STATIC__/index/js/lrscroll_1.js"></script>   
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/ShopShow.css" />
    <link rel="stylesheet" type="text/css" href="__STATIC__/index/css/MagicZoom.css" />
    <script type="text/javascript" src="__STATIC__/index/js/MagicZoom.js"></script>
    
    <script type="text/javascript" src="__STATIC__/index/js/num.js">
    	var jq = jQuery.noConflict();
    </script>
        
    <script type="text/javascript" src="__STATIC__/index/js/p_tab.js"></script>
    
    <script type="text/javascript" src="__STATIC__/index/js/shade.js"></script>
    <script type="text/javascript" src="__STATIC__/index/js/ShopShow.js"></script>
     



    
<title><?php echo $config['web_name']; ?></title>
</head>
<body>  
<!--Begin Header Begin-->
            <!--Begin 头部 Begin-->
<div class="soubg">
	<div class="sou">
    	<!--Begin 所在收货地区 Begin-->
    	<span class="s_city_b">
        	<span class="fl">送货至：</span>
            <span class="s_city">
            	<span>四川</span>
                <div class="s_city_bg">
                	<div class="s_city_t"></div>
                    <div class="s_city_c">
                    	<h2>请选择所在的收货地区</h2>
                        <table border="0" class="c_tab" style="width:235px; margin-top:10px;" cellspacing="0" cellpadding="0">
                          <tr>
                            <th>A</th>
                            <td class="c_h"><span>安徽</span><span>澳门</span></td>
                          </tr>
                          <tr>
                            <th>B</th>
                            <td class="c_h"><span>北京</span></td>
                          </tr>
                          <tr>
                            <th>C</th>
                            <td class="c_h"><span>重庆</span></td>
                          </tr>
                          <tr>
                            <th>F</th>
                            <td class="c_h"><span>福建</span></td>
                          </tr>
                          <tr>
                            <th>G</th>
                            <td class="c_h"><span>广东</span><span>广西</span><span>贵州</span><span>甘肃</span></td>
                          </tr>
                          <tr>
                            <th>H</th>
                            <td class="c_h"><span>河北</span><span>河南</span><span>黑龙江</span><span>海南</span><span>湖北</span><span>湖南</span></td>
                          </tr>
                          <tr>
                            <th>J</th>
                            <td class="c_h"><span>江苏</span><span>吉林</span><span>江西</span></td>
                          </tr>
                          <tr>
                            <th>L</th>
                            <td class="c_h"><span>辽宁</span></td>
                          </tr>
                          <tr>
                            <th>N</th>
                            <td class="c_h"><span>内蒙古</span><span>宁夏</span></td>
                          </tr>
                          <tr>
                            <th>Q</th>
                            <td class="c_h"><span>青海</span></td>
                          </tr>
                          <tr>
                            <th>S</th>
                            <td class="c_h"><span>上海</span><span>山东</span><span>山西</span><span class="c_check">四川</span><span>陕西</span></td>
                          </tr>
                          <tr>
                            <th>T</th>
                            <td class="c_h"><span>台湾</span><span>天津</span></td>
                          </tr>
                          <tr>
                            <th>X</th>
                            <td class="c_h"><span>西藏</span><span>香港</span><span>新疆</span></td>
                          </tr>
                          <tr>
                            <th>Y</th>
                            <td class="c_h"><span>云南</span></td>
                          </tr>
                          <tr>
                            <th>Z</th>
                            <td class="c_h"><span>浙江</span></td>
                          </tr>
                        </table>
                    </div>
                </div>
            </span>
        </span>
        <!--End 所在收货地区 End-->
        <span class="fr">
          <?php if(\think\Session::get('userInfo.account') == ''): ?>
            <span class="fl">你好，请
              <a href="<?php echo url('Login/login'); ?>">登录</a>&nbsp; 
              <a href="<?php echo url('Login/register'); ?>" style="color:#ff4e00;">免费注册</a>
              &nbsp;
            </span>
          <?php else: ?>
            <span class="fl">
              欢迎 <font color='red'><?php echo \think\Session::get('userInfo.account'); ?></font>登录
              &nbsp;|
            </span>
            <span class="ss">            
                <div class="ss_list">
                  <a href="<?php echo url('Member/member'); ?>">个人中心</a>
                    <div class="ss_list_bg">
                      <div class="s_city_t"></div>
                        <div class="ss_list_c">
                          <ul>
                              <li><a href="<?php echo url('Login/quit'); ?>">退出</a></li>
                            </ul>
                        </div>
                    </div>    
                </div>
            </span>
          <?php endif; ?>
            <span class="fl">&nbsp;关注我们：</span>
            <span class="s_sh"><a href="#" class="sh1">新浪</a><a href="#" class="sh2">微信</a></span>
            <span class="fr">|&nbsp;<a href="#">手机版&nbsp;<img src="__STATIC__/index/images/s_tel.png" align="absmiddle" /></a></span>
        </span>
    </div>
</div>
            <script type="text/javascript" src="__STATIC__/index/js/n_nav.js"></script>
    <div class="top">
        <div class="logo"><a href="<?php echo url('Index/index'); ?>"><img src="__STATIC__/index/images/logo.gif" /></a></div>
        <div class="search">
            <form>
                <input type="text" value="" class="s_ipt" />
                <input type="submit" value="搜索" class="s_btn" />
            </form>                      
            <span class="fl"><a href="#">咖啡</a><a href="#">iphone 6S</a><a href="#">新鲜美食</a><a href="#">蛋糕</a><a href="#">日用品</a><a href="#">连衣裙</a></span>
        </div>
        <div class="i_car">
            <div class="car_t"><a href="<?php echo url('Cart/cartlist'); ?>">购物车</a> [ <span id="top_num">0</span> ]</div>
            <div class="car_bg">
                   <!--Begin 购物车未登录 Begin-->
                <?php if(session('userInfo') == ''): ?>
                    <div class="un_login">还未登录！<a href="<?php echo url('Login/login'); ?>" style="color:#ff4e00;">马上登录</a> 去结算您的宝贝！</div> 
                <?php endif; ?>
                
                <!--End 购物车未登录 End-->
                <!--Begin 购物车已登录 Begin-->
                <?php if($is_cartData == 1): ?>
                <ul class="cars" style="height: 200px; overflow-y: auto">
                    <?php foreach($cartData as $k=>$v): ?>
                    <li>
                        <div class="img"><a href="#"><img src="__ROOT__/goods_img/<?php echo $v['goods_img']; ?>" width="58" height="58" /></a></div>
                        <div class="name"><a href="#"><?php echo $v['goods_name']; ?></a></div>
                        <div class="prices">
                            <font color="#ff4e00">￥<?php echo $v['self_price']; ?></font> X<?php echo $v['buy_number']; ?>
                            <input type="hidden" subtotal="<?php echo $v['buy_number']*$v['self_price']; ?>">
                        </div>
                        
                    </li>
                   <?php endforeach; ?>
                </ul>
                <?php endif; ?>
                <div class="price_sum">共计&nbsp; <font color="#ff4e00">￥</font><span id="top_total">0</span></div>
                <div class="price_a"><a href="<?php echo url('Cart/cartList'); ?>">去购物车结算</a></div>
                <!--End 购物车已登录 End-->
            </div>
        </div>
    </div>
    <!--End Header End--> 
    <!--Begin Menu Begin-->
    <div class="menu_bg">
        <div class="menu">
            <!--Begin 商品分类详情 Begin-->    
            <div class="nav">
                <?php 
                  if(request()->controller()=='Index'){
                      $flag="leftNav";
                  }else{
                    $flag="leftNav none";
                  }
                ?>
                <div class="nav_t">全部商品分类</div>
                 <div class="<?php echo $flag; ?>">
                    <ul>      
                        <?php if(is_array($cateInfo) || $cateInfo instanceof \think\Collection || $cateInfo instanceof \think\Paginator): $k = 0; $__LIST__ = $cateInfo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($k % 2 );++$k;?>
                        <li>
                            <div class="fj">
                                <span class="n_img"><span></span><img src="__STATIC__/index/images/nav1.png" /></span>
                                <span class="fl"><?php echo $v['cate_name']; ?></span>
                            </div>
                            <div class="zj" style=" top:-<?php echo ($k-1)*40 ?>px">
                                <div class="zj_l">
                                    <?php if(is_array($v['son']) || $v['son'] instanceof \think\Collection || $v['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $v['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vv): $mod = ($i % 2 );++$i;?>
                                    <div class="zj_l_c">
                                        <h2><?php echo $vv['cate_name']; ?></h2>
                                        <?php if(is_array($vv['son']) || $vv['son'] instanceof \think\Collection || $vv['son'] instanceof \think\Paginator): $i = 0; $__LIST__ = $vv['son'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vvv): $mod = ($i % 2 );++$i;?>
                                        <a href="#"><?php echo $vvv['cate_name']; ?></a>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                       
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                   
                                </div>
                                <div class="zj_r">
                                    <a href="#"><img src="__STATIC__/index/images/n_img1.jpg" width="236" height="200" /></a>
                                    <a href="#"><img src="__STATIC__/index/images/n_img2.jpg" width="236" height="200" /></a>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </ul>            
                 </div>
              
               
            </div>  
            <!--End 商品分类详情 End-->                                                     
            <ul class="menu_r">                                                                                                                                               
                <li><a href="<?php echo url('Index/index'); ?>">首页</a></li>
                <li><a href="<?php echo url('Product/productList'); ?>">全部商品</a></li>
                <?php if(is_array($catenav) || $catenav instanceof \think\Collection || $catenav instanceof \think\Paginator): $i = 0; $__LIST__ = $catenav;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?>
                <li><a href="<?php echo url('Product/productList'); ?>?cate_id=<?php echo $v['cate_id']; ?>"><?php echo $v['cate_name']; ?></a></li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
                
            </ul>
            <div class="m_ad">中秋送好礼！</div>
        </div>
    </div>
    <script>
      $(function(){
          var is_cartData="<?php echo $is_cartData; ?>";
          if(is_cartData==1){
            var allprice=0
            var num=$(".prices").length
            $(".prices").each(function(index){
                var subtotal=parseInt($(this).find("input").attr("subtotal"));
                allprice+=subtotal
            })
            
            //console.log(num)
            $("#top_total").text(allprice)
            $("#top_num").text(num)
          }
         

      })
    </script>
<!--End Menu End--> 
<div class="i_bg">  
    <div class="content mar_20">
    	<img src="__STATIC__/index/images/img3.jpg" />        
    </div>
    
    <!--Begin 第三步：提交订单 Begin -->
    <div class="content mar_20">
    	
        <!--Begin 银行卡支付 Begin -->
    	<div class="warning">        	
            <table border="0" style="width:1000px; text-align:center;" cellspacing="0" cellpadding="0">
              <tr height="35">
                <td style="font-size:18px;">
                	感谢您在本店购物！您的订单已提交成功，请记住您的订单号: <font color="#ff4e00"><?php echo $orderInfo['order_number']; ?></font>
                </td>
              </tr>
              <tr>
                <td style="font-size:14px; font-family:'宋体'; padding:10px 0 20px 0; border-bottom:1px solid #b6b6b6;">
                  您选定的配送方式为: <font color="#ff4e00">申通快递</font>； &nbsp; &nbsp;
                  <?php if($orderInfo['pay_type'] == 1): ?>
                  您选定的支付方式为: <font color="#ff4e00">支付宝</font>；
                  <?php elseif($orderInfo['pay_type'] == 2): ?>
                  您选定的支付方式为: <font color="#ff4e00">货到付款</font>；
                  <?php else: ?>
                  您选定的支付方式为: <font color="#ff4e00">银行卡转账</font>；
                  <?php endif; ?>
                  &nbsp; &nbsp;您的应付款金额为: <font color="#ff4e00">￥<?php echo $orderInfo['order_amount']; ?></font>
                </td>
              </tr>
              <tr>
                <td style="padding:20px 0 30px 0; font-family:'宋体';">
                	银行名称 收款人信息：全称 徐士浩 ；帐号或地址 622 732 1106001078186 ；开户行 中国工商银行。 <br />
                    注意事项：办理电汇时，请在电汇单“汇款用途”一栏处注明您的订单号。
                </td>
              </tr>
              <tr>
                <td>
                    <div class="btn_u" style="margin:0 auto; padding:0 20px; width:120px;"><a href="<?php echo url('Order/alipay'); ?>?order_number=<?php echo $orderInfo['order_number']; ?>">立即使用支付宝支付</a></div>
                	<a href="<?php echo url('Index/index'); ?>">首页</a> &nbsp; &nbsp; <a href="<?php echo url('Member/member'); ?>">用户中心</a>
                </td>
              </tr>
            </table>        	
        </div>
    </div>
	<!--End 第三步：提交订单 End--> 
    

            <div class="b_btm_bg b_btm_c">
        <div class="b_btm">
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="__STATIC__/index/images/b1.png" width="62" height="62" /></td>
                <td><h2>正品保障</h2>正品行货  放心购买</td>
              </tr>
            </table>
			<table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="__STATIC__/index/images/b2.png" width="62" height="62" /></td>
                <td><h2>满38包邮</h2>满38包邮 免运费</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="__STATIC__/index/images/b3.png" width="62" height="62" /></td>
                <td><h2>天天低价</h2>天天低价 畅选无忧</td>
              </tr>
            </table>
            <table border="0" style="width:210px; height:62px; float:left; margin-left:75px; margin-top:30px;" cellspacing="0" cellpadding="0">
              <tr>
                <td width="72"><img src="__STATIC__/index/images/b4.png" width="62" height="62" /></td>
                <td><h2>准时送达</h2>收货时间由你做主</td>
              </tr>
            </table>
        </div>
    </div>
    <div class="b_nav">
    	<dl>                                                                                            
        	<dt><a href="#">新手上路</a></dt>
            <dd><a href="#">售后流程</a></dd>
            <dd><a href="#">购物流程</a></dd>
            <dd><a href="#">订购方式</a></dd>
            <dd><a href="#">隐私声明</a></dd>
            <dd><a href="#">推荐分享说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">配送与支付</a></dt>
            <dd><a href="#">货到付款区域</a></dd>
            <dd><a href="#">配送支付查询</a></dd>
            <dd><a href="#">支付方式说明</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">会员中心</a></dt>
            <dd><a href="#">资金管理</a></dd>
            <dd><a href="#">我的收藏</a></dd>
            <dd><a href="#">我的订单</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">服务保证</a></dt>
            <dd><a href="#">退换货原则</a></dd>
            <dd><a href="#">售后服务保证</a></dd>
            <dd><a href="#">产品质量保证</a></dd>
        </dl>
        <dl>
        	<dt><a href="#">联系我们</a></dt>
            <dd><a href="#">网站故障报告</a></dd>
            <dd><a href="#">购物咨询</a></dd>
            <dd><a href="#">投诉与建议</a></dd>
        </dl>
        <div class="b_tel_bg">
        	<a href="#" class="b_sh1">新浪微博</a>            
        	<a href="#" class="b_sh2">腾讯微博</a>
            <p>
            服务热线：<br />
            <span>400-123-4567</span>
            </p>
        </div>
        <div class="b_er">
            <div class="b_er_c"><img src="__STATIC__/index/images/er.gif" width="118" height="118" /></div>
            <img src="__STATIC__/index/images/ss.png" />
        </div>
    </div>    
    <div class="btmbg">
		<div class="btm">
        	备案/许可证编号：<?php echo $config['web_record']; ?>-www.myshop.com   Copyright <?php echo $config['web_copyright']; ?> All Rights Reserved. 复制必究 , Technical Support: Dgg Group <br />
            <img src="__STATIC__/index/images/b_1.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_2.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_3.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_4.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_5.gif" width="98" height="33" /><img src="__STATIC__/index/images/b_6.gif" width="98" height="33" />
        </div>    	
    </div>
    <!--End Footer End -->    
</div>


<!--Begin Footer Begin -->


</body>


<!--[if IE 6]>
<script src="//letskillie6.googlecode.com/svn/trunk/2/zh_CN.js"></script>
<![endif]-->
</html>