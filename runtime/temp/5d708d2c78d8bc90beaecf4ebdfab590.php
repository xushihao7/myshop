<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:82:"/data/wwwroot/default/myshop/public/../application/admin/view/admin/adminlist.html";i:1545204393;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1545204120;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/head.html";i:1545204401;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545204401;}*/ ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>layout 后台大布局 - Layui</title>
  <link rel="stylesheet" href="__STATIC__/layui/css/layui.css">
  <script src="__STATIC__/layui/layui.js"></script>
  <script src="__STATIC__/jquery-3.2.1.min.js"></script>



  
</head>
<body class="layui-layout-body">
<div class="layui-layout layui-layout-admin">
  <div class="layui-header">
    <div class="layui-logo">layui 后台布局</div>
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
    <div style="padding: 15px; width:810px">
    <table class="layui-hide" id="demo" lay-filter="table_edit"></table>
<script type="text/html" id='barDemo'>
   <a class="layui-btn layui-btn-xs" lay-event="edit">编辑</a>
   <a class="layui-btn layui-btn-danger layui-btn-xs" lay-event="del">删除</a>
</script>
</div>


<script>
    $(function(){
        //展示加分页
        layui.use(['table','layer'],function(){
            var table=layui.table;
            table.render({
            elem: '#demo'
            ,url: "<?php echo url('Admin/adminInfo'); ?>" //数据接口
            ,page: true //开启分页
            ,limit: 3
            ,limits:[1,3,5,7] 
            ,cols: [[ //表头
             {field: 'admin_id', title: 'ID', width:80, sort: true, fixed: 'left'}
            ,{field: 'admin_name', title: '账号', width:100,edit:'text'}
            ,{field: 'admin_email', title: '邮箱', width:150, sort: true,edit:'text'}
            ,{field: 'admin_tel', title: '手机', width:150,edit:'text'} 
            ,{field: 'create_time', title: '添加时间', width:200}
            ,{fixed: 'right',title:'操作',toolbar:'#barDemo',width:130}
            ]]
        });
        //即点即改   监听单元格编辑
        table.on('edit(table_edit)',function(obj){
             var value=obj.value//得到修改后的值
             var admin_id=obj.data.admin_id  //得到所在行的所有键值
             var field=obj.field //得到字段
             /* console.log(admin_id)
             console.log(value)
             console.log(field) */
             $.post(
                 "<?php echo url('Admin/adminFieldUpdate'); ?>",
                 {value:value,field:field,admin_id:admin_id},
                 function(msg){
                     layer.msg(msg.font,{icon:msg.code})
                 },
                 'json'
             )
        })
        //删除 监听行的工具条
        table.on('tool(table_edit)',function(obj){
            var data=obj.data
            var admin_id=obj.data.admin_id
            if(obj.event=='del'){
                //是否确认删除
                layer.confirm("是否确认删除？",{icon:3},function(index){
                    $.post(
                        "<?php echo url('Admin/adminDel'); ?>",
                        {admin_id:admin_id},
                        function(msg){
                            layer.msg(msg.font,{icon:msg.code})
                            if(msg.code==1){
                                table.reload('demo')
                            }
                        },
                        'json'
                    )
                })
            }else if(obj.event=="edit"){
                  location.href="<?php echo url('Admin/adminUpdate'); ?>?admin_id="+admin_id
            }
        })
      


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