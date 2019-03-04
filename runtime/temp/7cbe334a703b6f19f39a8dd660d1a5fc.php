<?php if (!defined('THINK_PATH')) exit(); /*a:5:{s:80:"/data/wwwroot/default/myshop/public/../application/index/view/cart/cartlist.html";i:1545204403;s:73:"/data/wwwroot/default/myshop/public/../application/index/view/layout.html";i:1545204128;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/head.html";i:1545204411;s:77:"/data/wwwroot/default/myshop/public/../application/index/view/public/top.html";i:1545204412;s:78:"/data/wwwroot/default/myshop/public/../application/index/view/public/foot.html";i:1545204411;}*/ ?>
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
            <!--Begin Header Begin-->
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
    	<img src="__STATIC__/index/images/img1.jpg" />        
    </div>
    
    <!--Begin 第一步：查看购物车 Begin -->
    <div class="content mar_20">
    	<table  border="0" class="car_tab" style="width:1200px; margin-bottom:50px;" cellspacing="0" cellpadding="0">
          <tr>
            <td class="car_th" width="50"></td>
            <td class="car_th" width="490">商品名称</td>
            <td class="car_th" width="140">单价</td>
            <td class="car_th" width="150">购买数量</td>
            <td class="car_th" width="130">小计</td>
            <td class="car_th" width="150">操作</td>
          </tr>
          <?php foreach($cartData as $k=>$v): ?>
          <tr class="tr_test" goods_id="<?php echo $v['goods_id']; ?>">
            <?php if($login == 1): ?>
            <td><input type="checkbox" class="check" value="<?php echo $v['cart_id']; ?>"  ></td>
            <?php else: ?>
            <td><input type="checkbox" class="check"  ></td>
            <?php endif; ?>
            <td >
            	<div class="c_s_img"><img src="__ROOT__/goods_img/<?php echo $v['goods_img']; ?>" width="73" height="73" /></div>
                <?php echo $v['goods_name']; ?>
            </td>
            <td align="center" >
                ￥<span><?php echo $v['self_price']; ?></span>
            </td>
            <td align="center" class='tdd'>
            	<div class="c_num" >
                    <input type="button" value="" class="car_btn_1  reduce" />
                    <input type="text" value="<?php echo $v['buy_number']; ?>"  class="car_ipt buy_number" />  
                    <input type="button" value=""  class="car_btn_2 add " />
                    <input type="hidden" value="<?php echo $v['goods_num']; ?>" class="goods_num"> 
                </div>
            </td>
            <td align="center" style="color:#ff4e00;" class="Subtotal">
                    ￥<span class='price'><?php echo $v['self_price']*$v['buy_number']; ?></span>
            </td>
            <td align="center">
             <a href="javascript:;" class="del">删除</a>&nbsp; &nbsp;
             <a href="javascript:;" class='collection'>加入收藏</a>
            </td>
          </tr>
          <?php endforeach; ?> 
          <tr height="70">
          	<td colspan="6" style="font-family:'Microsoft YaHei'; border-bottom:0;">
                <label class="r_rad">
                <input type="checkbox" name="clear" id='all' />
                </label><label class="r_txt">全选</label>
                <input type="button" value="批量收藏" id="manycollection">
                <input type="button" value="删除选中的商品" id="manydel">
                <input type="button" value="清空购物车" id="alldel">
                <span class="fr">
                    已选 <b style="font-size:10px; color:#ff4e00;" id="num">0</b>件商品
                    商品总价：<b style="font-size:22px; color:#ff4e00;" id="total">￥0</b>
                </span>
            </td>
          </tr>
          <tr valign="top" height="150">
          	<td colspan="6" align="right">
                <a href="#"><img src="__STATIC__/index/images/buy1.gif" /></a>&nbsp; &nbsp; 
                <a href="javascript:;" id="settlement"><img src="__STATIC__/index/images/buy2.gif" /></a>
            </td>
          </tr>
        </table>
        
    </div>
	<!--End 第一步：查看购物车 End--> 
    
    
    <!--Begin 弹出层-删除商品 Begin-->
    <div id="fade" class="black_overlay"></div>
    <div id="MyDiv" class="white_content">             
        <div class="white_d">
            <div class="notice_t">
                <span class="fr" style="margin-top:10px; cursor:pointer;" onclick="CloseDiv('MyDiv','fade')"><img src="__STATIC__/index/images/close.gif" /></span>
            </div>
            <div class="notice_c">
           		
                <table border="0" align="center" style="font-size:16px;" cellspacing="0" cellpadding="0">
                  <tr valign="top">
                    <td>您确定要把该商品移除购物车吗？</td>
                  </tr>
                  <tr height="50" valign="bottom">
                    <td><a href="#" class="b_sure">确定</a><a href="#" class="b_buy">取消</a></td>
                  </tr>
                </table>
                    
            </div>
        </div>
    </div>  
   



    <script>
     $(function(){
         layui.use(['layer'],function(){
       //加法
        $(document).on("click",".add",function(){
        var _this=$(this);
        var goods_num=_this.next().val()
        var buy_number=parseInt(_this.prev().val());
        _this.prevAll(".reduce").prop("disabled",false)
        if(buy_number>=goods_num){
            _this.prev().val(buy_number)
            _this.prop("disabled",false)
        }else{
            buy_number+=1
            _this.prev().val(buy_number)
            //计算价格
            price(_this,buy_number)
            //计算总价
            total(_this)
            //改变数量
            changNum(_this,buy_number);  
        }
        })
        //减法
        $(document).on("click",".reduce",function(){
            var _this=$(this);
            var buy_number=parseInt(_this.next().val())
            _this.nextAll(".add").prop("disabled",false)
            if(buy_number<=1){
                _this.next().val(1)
                _this.prop("disabled",true)
            }else{
                buy_number-=1
                _this.next().val(buy_number);
                //计算价格
                price(_this,buy_number)
                //计算总价
                total(_this)
                //改变数量
                changNum(_this,buy_number)
            } 
         })
        //失去焦点
        $(document).on("blur",".buy_number",function(){
                var _this=$(this)
                var buy_number=_this.val();
                var goods_num=parseInt(_this.nextAll(".goods_num").val()) 
                var preg=/^[1-9]\d{0,}$/
                if(!preg.test(buy_number)){
                     _this.val(1)
                     //计算小计
                     price(_this,1)
                     //修改数量
                     changNum(_this,1)
                    
                }else{
                    if(parseInt(buy_number)>=goods_num){
                         _this.val(goods_num)
                         //计算小计
                         price(_this,goods_num)
                         //修改数量
                         changNum(_this,goods_num)
                       
                    }else{
                        //计算小计
                        price(_this,buy_number)
                        //修改数量
                        changNum(_this,buy_number)
                      
                    }
                }
                //计算总价
                total(_this)
                
              
                       
        })
        
        //全选
        $(document).on("click","#all",function(){
            var _this=$(this)
            var checked=_this.prop("checked")
            var check=$(".tr_test").find("input[class='check']")
            if(checked==true){
                check.prop("checked",true)
                total(_this);
            }else{
                check.prop("checked",false)
                total(_this);
            }
            
        })
        //单选
        $(document).on("click",".check",function(){
            var _this=$(this)
            total(_this);
        })
        //计算小计
        function  price(input,buy_number){
          input.parents("tr[class='tr_test']").find("td").find("input[class='check']").prop("checked",true);
            var price=input.parents(".tdd").prev("td").find("span").text();
            var price=parseInt(price);
            var momeny=price*buy_number
            input.parents(".tdd").next().children(".price").text(momeny)
        }
        //计算总价 
        function total(){
            var total=0
            var num=0
            $(".check").each(function(index){
                if($(this).prop("checked")==true){
                   var subtotal=$(this).parents(".tr_test").find("td[class='Subtotal']").find("span").text()
                   var subtotal=parseInt(subtotal)
                   total+=subtotal
                   var buy_number=$(this).parents(".tr_test").find("input[class='car_ipt buy_number']").val()
                   var buy_number=parseInt(buy_number)
                   num+=buy_number
                }
            })
            $("#total").text("￥"+total);
            $("#num").text(num);
            
        }
        //修改数量
        function changNum(input,buy_number){
            var cart_id=input.parents(".tr_test").find(".check").val()
            var goods_id=input.parents(".tr_test").attr("goods_id");
            //console.log(goods_id)
            var buy_number=buy_number
            $.post(
                "<?php echo url('Cart/cartUpdate'); ?>",
                {cart_id:cart_id,buy_number:buy_number,goods_id},
                function(result){
                    if(result.code==2){
                        layer.msg(result.font,{icon:result.code})
                    }
                }
                ,'json'
            )
        }
        //加入收藏
        $(".collection").click(function(){
             //检测是否登录
             var  login="<?php echo $login; ?>"
            if(login==2){
                layer.msg("加入收藏前请先登录",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>"
                })
                return false;
            }
            var _this=$(this)
            var goods_id=_this.parents(".tr_test").attr("goods_id")
            $.post(
               "<?php echo url('Cart/addCollection'); ?>",
               {goods_id:goods_id,type:1},
               function(result){
                 layer.msg(result.font,{icon:result.code})
               }
               ,'json'

            )
        })
          //删除
        $(".del").click(function(){
            var _this=$(this);
            var cart_id=_this.parents(".tr_test").find(".check").val()
            var goods_id=_this.parents(".tr_test").attr("goods_id");
            $.post(
                "<?php echo url('Cart/cartDel'); ?>",
                {cart_id:cart_id,goods_id:goods_id,type:1},
                function(result){
                    layer.msg(result.font,{icon:result.code})
                    if(result.code==1){
                        _this.parents(".tr_test").remove()
                    }
                }
                ,'json'
            )
        })
        //批量收藏
        $("#manycollection").click(function(){
            //检测是否登录
            var  login="<?php echo $login; ?>"
            if(login==2){
                layer.msg("加入收藏前请前登录",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>"
                })
                return false;
            }

            var goods_id=""
            $(".check").each(function(index){
               if($(this).prop("checked")==true){
                    var gid=parseInt($(this).parents(".tr_test").attr("goods_id"));
                    goods_id+=","+gid
               }
            })
            goods_id=goods_id.substr(1)
            $.post(
               "<?php echo url('Cart/addCollection'); ?>",
               {goods_id:goods_id,type:2},
               function(result){
                  layer.msg(result.font,{icon:result.code})
               }
               ,'json'
            )
        })
         //批量删除
        $("#manydel").click(function(){
            var _this=$(this)
            var id=""
            var goods_id=""
            $(".check").each(function(index){
                if($(this).prop("checked")==true){
                    $(this).parents(".tr_test").remove();
                    total()
                    var cart_id=parseInt($(this).val());
                    var gid=parseInt($(this).parents(".tr_test").attr("goods_id"))
                    id+=","+cart_id
                    goods_id+=","+gid 
                }
            })
            cart_id=id.substr(1)
            goods_id=goods_id.substr(1)
           $.post(
               "<?php echo url('Cart/cartDel'); ?>",
               {cart_id:cart_id,goods_id:goods_id,type:2},
               function(result){
                 layer.msg(result.font,{icon:result.code,time:1000})
               }
               ,'json'
           ) 
        })
        //清空购物车
        $("#alldel").click(function(){
            //检测是否登录
            var  login="<?php echo $login; ?>"
            if(login==2){
                layer.msg("请您先登录再清空购物车",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>"
                })
                return false;
            }
                var _this=$(this)
                _this.parent("td").find("#all").prop("checked",true)
                var cart_id=""
                $(".check").each(function(index){
                    $(this).prop("checked",true)
                    var c_id=parseInt($(this).val());
                    cart_id+=","+c_id
                    $(this).parents(".tr_test").remove()
                    total()
                })
                
                _this.parents("td").find("#all").prop("checked",false)
                cart_id=cart_id.substr(1) 
                $.post(
                    "<?php echo url('Cart/emptyCart'); ?>",
                    {cart_id:cart_id},
                    function(result){
                        layer.msg(result.font,{icon:result.code})
                        
                    }
                    ,'json'
                )
            
            
        })
        //确认结算
        $("#settlement").click(function(){
            //获取选中的购物车的 id
            var cart_id=""
            $(".check").each(function(){
                if($(this).prop("checked")==true){
                   cart_id+=","+$(this).val()
                    
                } 
            })
            var cart_id=cart_id.substr(1)
            if(cart_id==""){
                layer.msg("请选择要结算的商品",{icon:2})
                return false;
            }
            //检测登录
            var login="<?php echo $login; ?>"
            //console.log(login)
            if(login==2){
                layer.msg("请您先登录再结算",{icon:2,time:2000},function(){
                    location.href="<?php echo url('Login/login'); ?>"
                })
                return false;
            }
            location.href="<?php echo url('Order/confirmSettlement'); ?>?cart_id="+cart_id
            
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