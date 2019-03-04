<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:90:"/data/wwwroot/default/myshop/public/../application/index/view/order/confirmsettlement.html";i:1546354732;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1545204128;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/head.html";i:1545204411;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1545204412;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/foot.html";i:1545204411;}*/ ?>
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
    	<img src="__STATIC__/index/images/img2.jpg" />        
    </div>
    
    <!--Begin 第二步：确认订单信息 Begin -->
    <div class="content mar_20">
    	<div class="two_bg">
        	<div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>商品列表
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="550">商品名称</td>
                <td class="car_th" width="140">商品单价</td>
                <td class="car_th" width="150">购买数量</td>
                <td class="car_th" width="130">小计</td>
                <td class="car_th" width="140">返还积分</td>
              </tr>
              <?php foreach($cartInfo as $k=>$v): ?>
              <tr>
                <td>
                    <div class="c_s_img"><img src="__ROOT__/goods_img/<?php echo $v['goods_img']; ?>" width="73" height="73" /></div>
                    <?php echo $v['goods_name']; ?>
                </td>
                <td align="center"><?php echo $v['self_price']; ?></td>
                <td align="center"><?php echo $v['buy_number']; ?></td>
                <td align="center" style="color:#ff4e00;" class="subtotal">￥<?php echo $v['self_price']*$v['buy_number']; ?></td>
                <td align="center" class="score"><?php echo $v['goods_score']*$v['buy_number']; ?>R</td>
              </tr>
              <?php endforeach; ?>
              
                <!-- <td colspan="5" align="right" style="font-family:'Microsoft YaHei';"  >
                    商品总价：￥1899.00 ； 返还积分 56R  
                </td> -->
              </tr>
            </table>
            
            <div class="two_t">
            	<span class="fr"><a href="#">修改</a></span>收货人信息
            </div>
            <div style="overflow-y: auto;height: 200px" >
            <?php foreach($addressInfo as $k=>$v): ?> 
            <table border="0" class="peo_tab"  style="width:1110px; margin-top: 15px" cellspacing="0" cellpadding="0">
              <tr>
                <?php if($v['is_default'] == 1): ?>
                <td rowspan="2"><input type="radio" name="address_id" value="<?php echo $v['id']; ?>" checked></td>
                <?php else: ?>
                <td rowspan="2"><input type="radio" name="address_id" value="<?php echo $v['id']; ?>" ></td>
                <?php endif; ?>
                <td class="p_td" width="160">收货人姓名</td>
                <td width="395"><?php echo $v['address_man']; ?></td>
                <td class="p_td" width="160">收货人电话</td>
                <td width="395"><?php echo $v['address_tel']; ?></td>
              </tr>
              <tr>
                <td class="p_td">省市区</td>
                <td><?php echo $v['province_name']; ?><?php echo $v['city_name']; ?><?php echo $v['district_name']; ?></td>
                <td class="p_td">详细地址</td>
                <td><?php echo $v['detailed_address']; ?></td>
              </tr>
           
            </table>
            <?php endforeach; ?>
          </div>
         

            
            <div class="two_t">
            	配送方式
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              <tr>
                <td class="car_th" width="80"></td>
                <td class="car_th" width="200">名称</td>
                <td class="car_th" width="370">订购描述</td>
                <td class="car_th" width="150">费用</td>
                <td class="car_th" width="135">免费额度</td>
                <td class="car_th" width="175">保价费用</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" checked="checked" /></td>
                <td align="center" style="font-size:14px;"><b>申通快递</b></td>
                <td>江、浙、沪地区首重为15元/KG，其他地区18元/KG，续重均为5-6元/KG， 云南地区为8元</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>城际快递</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td align="center"><input type="checkbox" name="ch" /></td>
                <td align="center" style="font-size:14px;"><b>邮局平邮</b></td>
                <td>运费固定</td>
                <td align="center">￥15.00</td>
                <td align="center">￥0.00</td>
                <td align="center">不支持保价</td>
              </tr>
              <tr>
              	<td colspan="6">
                	<span class="fr"><label class="r_rad"><input type="checkbox" name="baojia" /></label><label class="r_txt">配送是否需要保价</label></span>
                </td>
              </tr>
            </table> 
            
            <div class="two_t">
            	支付方式
            </div>
            <ul class="pay">
                <li class="checked">支付宝<div class="ch_img"></div></li>
                <li>货到付款<div class="ch_img"></div></li>
                <li>银行卡转账<div class="ch_img"></div></li>
            </ul>  
            <div class="two_t">
            	其他信息
            </div>
            <table border="0" class="car_tab" style="width:1110px;" cellspacing="0" cellpadding="0">
              
              <tr valign="top">
                <td align="right" style="padding-right:0;"><b style="font-size:14px;">订单附言：</b></td>
                <td style="padding-left:0;"><textarea class="add_txt" style="width:860px; height:50px;" id="orderMessage"></textarea></td>
              </tr>

             
            </table>
            
    <table border="0" style="width:900px; margin-top:20px;" cellspacing="0" cellpadding="0">
      <tr height="70">
        <td align="right">
          <b style="font-size:14px;">应付款金额：<span style="font-size:22px; color:#ff4e00;" id="pay_price">￥2899</span></b>
        </td>
      </tr>
      <tr height="70">
        <td align="right"><a href="javascript:;" id="confirmorder">
          <img src="__STATIC__/index/images/btn_sure.gif" /></a></td>
      </tr>
      </table>

            
        	
        </div>
    </div>
    <script>
      $(function(){
        layui.use(['layer'],function(){
                    var total=0
                    $(".subtotal").each(function(){
                        total+=parseInt($(this).text().substr(1))
                    })

                    var score=0
                    $(".score").each(function(){
                        score+=parseInt($(this).text().substr(0,$(this).text().length-1))
                    })
                    $("#score").text(score+"R")
                    $("#pay_price").text("￥"+total)
                    $("#total").text("￥"+total);



            $(".pay").find("li").click(function(){
                var _this=$(this)
                _this.siblings().removeClass("checked")
                _this.addClass("checked")
            })

            //点击确认订单
            $("#confirmorder").click(function(){
                var cart_id="<?php echo input('get.cart_id'); ?>"
                $(":radio").each(function(){
                    if($(this).prop("checked")==true){
                       id=$(this).val()
                    }  
                })
              var type=$('.pay').find("li[class='checked']").index()+1
              var orderMessage=$("#orderMessage").val()
              var total=$("#pay_price").text().substr(1)
            $.post(
               "<?php echo url('Order/confirmOrder'); ?>",
               {cart_id:cart_id,id:id,type:type,orderMessage:orderMessage},
               function(result){
                 layer.msg(result.font,{icon:result.code})
                 if(result.code==1){
                      location.href="<?php echo url('Order/orderSuccess'); ?>?order_id="+result.order_id
                 }
               }
               ,'json'
            )
  
            })







        })
          
        
           



           
           


      })
      
      
    
    </script>
	
    
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