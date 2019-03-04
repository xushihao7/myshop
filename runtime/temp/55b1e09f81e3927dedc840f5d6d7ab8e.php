<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/index/index.html";i:1545204399;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1545286899;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/head.html";i:1545286923;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545204401;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>电子商城后台</title>
  <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
  <script src="__STATIC__/layui/layui.js"></script>
  <script src="__STATIC__/jquery-3.2.1.min.js"></script>



  
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">电子商城后台</div>
    <!-- 头部区域（可配合layui已有的水平导航） -->
    <ul class="layui-nav layui-layout-right">
      <li class="layui-nav-item">
        <a href="javascript:;">
          <img src="__ROOT__/goods_img/20181121/fdca3d1a7a5f7d5bcaae2b2cf8666b08.gif" class="layui-nav-img">
          <?php echo \think\Session::get('adminInfo.admin_name'); ?>
        </a>
        <dl class="layui-nav-child">
          <dd><a href="">基本资料</a></dd>
          <dd><a href="">安全设置</a></dd>
        </dl>
      </li>
      <li class="layui-nav-item"><a href="<?php echo url('Login/quit'); ?>">退了</a></li>
    </ul>
  </div>
  <div class="layui-side layui-bg-black">
        <div class="layui-side-scroll">
          <!-- 左侧导航区域（可配合layui已有的垂直导航） -->
          <ul class="layui-nav layui-nav-tree"  lay-filter="test">
              <li class="layui-nav-item ">
                  <a class="" href="javascript:;">管理员管理</a>
                  <dl class="layui-nav-child">
                    <dd><a href="<?php echo url('Admin/adminAdd'); ?>">管理员添加</a></dd>
                    <dd><a href="<?php echo url('Admin/adminList'); ?>">管理员展示</a></dd>
                  </dl>
                </li>


            <li class="layui-nav-item ">
              <a class="" href="javascript:;">分类管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Category/cateAdd'); ?>">分类添加</a></dd>
                <dd><a href="<?php echo url('Category/cateList'); ?>">分类展示</a></dd>
              </dl>
            </li>
            
                
            
            
             
            <li class="layui-nav-item ">
              <a class="" href="javascript:;">品牌管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Brand/brandAdd'); ?>">品牌添加</a></dd>
                <dd><a href="<?php echo url('Brand/brandList'); ?>">品牌展示</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item ">
              <a class="" href="javascript:;">商品管理</a>
              <dl class="layui-nav-child">
                <dd><a href="<?php echo url('Goods/goodsAdd'); ?>">商品添加</a></dd>
                <dd><a href="<?php echo url('Goods/goodslist'); ?>">商品展示</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item ">
              <a class="" href="javascript:;">友情链接</a>
              <dl class="layui-nav-child    ">
                <dd><a href="<?php echo url('Friend/friendAdd'); ?>">友链添加</a></dd>
                <dd><a href="<?php echo url('Friend/friendlist'); ?>">友链展示</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item ">
              <a class="" href="javascript:;">系统设置</a>
              <dl class="layui-nav-child    ">
                <dd><a href="<?php echo url('System/system'); ?>">网站设置</a></dd>
                <dd><a href="<?php echo url('Admin/updatepwd'); ?>">修改密码</a></dd>
              </dl>
            </li>
            <li class="layui-nav-item ">
                <a class="" href="javascript:;">角色管理</a>
                <dl class="layui-nav-child    ">
                  <dd><a href="<?php echo url('Role/roleAdd'); ?>">角色添加</a></dd>
                  <dd><a href="<?php echo url(); ?>">角色展示</a></dd>
                </dl>
              </li>
           
           
         
          </ul>
        </div>
      </div>

  <div class="layui-body">
    <!-- 内容主体区域 -->
<div style="padding: 15px;">
        <h3 style="color:blue">现役最强5大小前锋：</h3>
        <video src="__STATIC__/admin/login/img/best5sf.MP4" controls="contrils" autoplay="" loop=""  width="500" height="300"></video>    
</div>

  </div>
</div>
<script src="__STATIC__/layui/layui.js"></script>
<script>
//JavaScript代码区域
layui.use('element', function(){
  var element = layui.element;
  
});
</script>
</body>
</html>