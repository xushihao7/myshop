<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/data/wwwroot/default/myshop/public/../application/admin/view/admin/adminadd.html";i:1545204393;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1545286899;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/head.html";i:1545286923;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545204401;}*/ ?>
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
    <div style="padding: 15px; width:600px" width="600px">
    <form class="layui-form" action="">
        <div class="layui-form-item">
          <label class="layui-form-label">账号</label>
          <div class="layui-input-block">
            <input type="text" name="admin_name" required  lay-verifys="required|checkName"  autocomplete="off" class="layui-input">
          </div>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">密码</label>
            <div class="layui-input-block">
              <input type="password" name="admin_pwd" required  lay-verifys="required|checkPwd"  autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">邮箱</label>
            <div class="layui-input-block">
              <input type="text" name="admin_email" required  lay-verifys="required|email"  autocomplete="off" class="layui-input">
            </div>
          </div>
          <div class="layui-form-item">
            <label class="layui-form-label">电话</label>
            <div class="layui-input-block">
              <input type="text" name="admin_tel" required  lay-verifys="required|phone|number"  autocomplete="off" class="layui-input">
            </div>
          </div>
        <div class="layui-form-item">
          <div class="layui-input-block">
            <button class="layui-btn" lay-submit lay-filter="*">立即提交</button>
            <button type="reset" class="layui-btn layui-btn-primary">重置</button>
          </div>
        </div>
      </form> 
</div>
<script>
    $(function(){
        layui.use(['form','layer'],function(){
              var form = layui.form;
              var layer=layui.layer;
              //验证账号
              form.verify({
                checkName: function(value, item){ //value：表单的值、item：表单的DOM对象
                var reg=/^[a-z_]\w{3,11}$/i;
                var font;
                if(!reg.test(value)){
                    return "账号数字 字母 下划线组成 非数字开头 4-12位";
                }else{
                    //验证唯一性 同步
                   $.ajax({
                     url:"<?php echo url('Admin/checkName'); ?>",
                     method:'post',
                     data:{admin_name:value,type:1},
                     async:false,
                     success:function(result){
                          if(result=='0'){
                             font='账号已存在'
                          }
                     }
                   })
                   return font
                  
                }
               
             },
             checkPwd: function(value, item){ //value：表单的值、item：表单的DOM对象
                var reg=/^.{6,16}$/i;
                if(!reg.test(value)){
                    return "密码允许6-16位"
                }
             }

            }) ; 
            
            


               //提交数据
               form.on('submit(*)', function(data){
                 $.post(
                   "<?php echo url('Admin/adminAdd'); ?>",
                   data.field,
                   function(result){
                    //  console.log(result) 
                    layer.msg(result.font, {icon:result.code});
                    if(result.code==1){
                         layer.open({
                            type:1,
                            content:'是否进入展示页面',
                            btn:['进入','继续添加'],
                            yes:function(index,layero){
                              location.href="<?php echo url('admin/adminlist'); ?>";
                            },
                            btn2:function(indxe,layero){
                                 location.href="<?php echo url('admin/adminadd'); ?>";
                            },
                            concel:function(){
                              
                            }
                         })
                    } 
                     
                   },
                   'json'
                 )
                return false; //阻止表单跳转。如果需要表单跳转，去掉这段即可。
                });

        })
    })
</script>
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