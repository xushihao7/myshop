<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:84:"/data/wwwroot/default/myshop/public/../application/admin/view/category/catelist.html";i:1545204395;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1545204120;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/head.html";i:1545204401;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545204401;}*/ ?>
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
    <div style="padding: 15px; width:900px">
    <table class="layui-table">
        <thead>
          <tr>
            <th>分类ID</th>
            <th>分类名称</th>
            <th>是否展示</th>
            <th>是否在导航栏展示</th>
            <th>添加时间</th>
            <th>操作</th>
          </tr> 
        </thead>
        <tbody  >
          <?php foreach($info as $v): ?>
          <tr pid="<?php echo $v['pid']; ?>" cate_id="<?php echo $v['cate_id']; ?>">
            <td> 
              <?php echo str_repeat('&nbsp;&nbsp',$v['level']*3); ?>
              <a href="javascript:;" class="flag">+</a>
              <?php echo $v['cate_id']; ?>
            </td>
            <td>
              <?php echo str_repeat('&nbsp;&nbsp',$v['level']*3); ?>
              <span class="span_test"><?php echo $v['cate_name']; ?></span>
              <input type="text" class="inp" field="cate_name" value="<?php echo $v['cate_name']; ?>" style=" width:120px; display:none" >
            </td>
            <td class="show" status="<?php echo $v['is_show']; ?>" field="is_show" style="cursor: pointer;">
                 <?php if($v['is_show'] == 1): ?>
                 √
                 <?php else: ?>
                   ×
                 <?php endif; ?>
            </td>
            <td class="show" status="<?php echo $v['is_navshow']; ?>" field="is_navshow" style="cursor: pointer;">
                <?php if($v['is_navshow'] == 1): ?>
                 √
                 <?php else: ?>
                   ×
                 <?php endif; ?>
            </td>

            <td><?php echo $v['create_time']; ?></td>
            <td><a href="javascript:;"   class="del">删除</a> 
              <a href="<?php echo url('category/cateUpdate'); ?>?cate_id=<?php echo $v['cate_id']; ?>">修改</a>
            </td>
          </tr>
          <?php endforeach; ?>
        
        </tbody>
      </table>
</div>
<script>
    $(function(){
         layui.use(['form','layer'],function(){
            var form=layui.form
            var layer=layui.layer
            $("tbody>tr[pid!=0]").hide() //将不是顶级的隐藏
            $('.flag').click(function(){
            var _this=$(this);
            var flag=_this.text(); 
            var cate_id=_this.parents('tr').attr('cate_id');  //当前分类的id
            if(flag=="+"){
              //展示
               //当前分类的子类
               var son=$("tbody>tr[pid="+cate_id+"]")
               if(son.length>0){
                  son.show()
                  _this.text("-")
               }
              
            }else{
               trHide(cate_id)
              _this.text("+")
               
            }
            //递归
            function trHide(cate_id){
                     var _tr=$("tbody>tr[pid="+cate_id+"]")//当前分类的子类
                     _tr.find('td').find("a[class='flag']").text("+")
                     _tr.hide()
                     for(var i=0;i<_tr.length;i++){
                         var c_id=_tr.eq(i).attr('cate_id')
                         trHide(c_id)
                     }
            }
           
        })
            //即点即改
            //span标签隐藏 input显示
           $(".span_test").click(function(){
                 var _this=$(this);
                 _this.hide();
                 p= _this.next(".inp").val();
                 _this.next(".inp").show().val("").focus().val(p);
            })
            //修改文本框的值
           $(".inp").blur(function(){
                var _this=$(this) //input
                var value=_this.val() //值
                var field=_this.attr('field') //字段
                var cate_id=_this.parents('tr').attr('cate_id') //id
                $.post(
                  "<?php echo url('Category/cateUpdateField'); ?>",
                  {value:value,field:field,cate_id:cate_id},
                  function(result){
                    layer.msg(result.font,{icon:result.code})
                    if(result.code==1){
                        _this.hide()
                        _this.prev('span').html(value).show()
                    }
                  },
                  'json'

                )
            })
            //修改对错号的状态
           $(".show").click(function(){
               var _this=$(this);
               var field=_this.attr('field')//字段
               var status=_this.attr('status')//状态
               var cate_id=_this.parent().attr("cate_id")//id
               //处理状态
               if(status==1){
                 status=2
               }else{
                 status=1
               }
               $.post(
                  "<?php echo url('Category/cateUpdateField'); ?>",
                  {field:field,value:status,cate_id:cate_id},
                  function(result){
                    
                     layer.msg(result.font,{icon:result.code})
                    if(result.code==1){
                         if(status==1){
                           _this.text("√")
                           _this.attr('status',1)
                          
                         }else{
                           _this.text("×")
                           _this.attr('status',2)
                           
                         }
                    } 
                    
                  },
                  'json'
                 

                )
              
           })
           //删除
           $(".del").click(function(){
              var _this=$(this);
              var cate_id=_this.parents("tr").attr("cate_id")
              //console.log(cate_id);
              $.post(
                  "<?php echo url('Category/cateDel'); ?>",
                  {cate_id:cate_id},
                  function(result){
                        layer.msg(result.font,{icon:result.code})
                        if(result.code==1){
                           _this.parents("tr").remove()
                        }
                  },
                  'json'
                )

             })
           //修改
          
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