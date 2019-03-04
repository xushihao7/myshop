<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:81:"/data/wwwroot/default/myshop/public/../application/admin/view/goods/goodsadd.html";i:1545204398;s:73:"/data/wwwroot/default/myshop/public/../application/admin/view/layout.html";i:1545204120;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/head.html";i:1545204401;s:78:"/data/wwwroot/default/myshop/public/../application/admin/view/public/left.html";i:1545204401;}*/ ?>
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
    <div style="padding: 15px; width:600px" >
<form class="layui-form" action="">
    <div class="layui-form-item">
      <label class="layui-form-label">商品名称</label>
      <div class="layui-input-block">
        <input type="text" name="goods_name" required  lay-verifys="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">本店价格</label>
        <div class="layui-input-block">
          <input type="text" name="self_price" required  lay-verifys="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">市场价格</label>
        <div class="layui-input-block">
          <input type="text" name="market_price" required  lay-verifys="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">是否上架</label>
        <div class="layui-input-block">
          <input type="radio" name="is_sel" value="1" title="是">
          <input type="radio" name="is_sel" value="2" title="否" checked>
        </div>
      </div>
      
   
    <div class="layui-form-item">
      <label class="layui-form-label">复选框</label>
      <div class="layui-input-block">
        <input type="checkbox" name="is_new" title="新品" value="1">
        <input type="checkbox" name="is_best" title="精品" value="1">
        <input type="checkbox" name="is_hot" title="热卖" value="1">
      </div>
    </div>
    <div class="layui-form-item">
        <label class="layui-form-label">库存</label>
        <div class="layui-input-block">
          <input type="text" name="goods_num" required  lay-verifys="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">赠送积分</label>
        <div class="layui-input-block">
          <input type="text" name="goods_score" required  lay-verifys="required" placeholder="请输入标题" autocomplete="off" class="layui-input">
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">商品图片</label>
        <div class="layui-input-block">
          <input type="hidden" name="goods_img" id="goods_img">
            <button type="button" class="layui-btn" id="img">
                <i class="layui-icon">&#xe67c;</i>上传图片
              </button>
        </div>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">轮播图</label>
        <div class="layui-input-block">
            <input type="hidden" name="goods_imgs" id="goods_imgs">
            <button type="button" class="layui-btn" id="imgs">
                <i class="layui-icon">&#xe67c;</i>上传图片
              </button>
        </div>
        <div class="layui-form-item">
            <label class="layui-form-label">商品详情</label>
            <div class="layui-input-block" style="width:500px">
                <textarea id="goods_desc" style="display: none;"></textarea>
            </div>
      </div> 
      <div class="layui-form-item">
          <label class="layui-form-label">商品分类</label>
          <div class="layui-input-block">
            <select name="cate_id" lay-verify="required">
             <?php foreach($cinfo as $v): ?>
              <option value="<?php echo $v['cate_id']; ?>"><?php echo str_repeat("&nbsp;&nbsp",$v['level']*2); ?><?php echo $v['cate_name']; ?></option>  
              <?php endforeach; ?> 
            </select>
      </div>
      <div class="layui-form-item">
        <label class="layui-form-label">商品品牌</label>
        <div class="layui-input-block">
          <select name="brand_id" lay-verify="required">
            <?php foreach($binfo as $v): ?>
            <option value="<?php echo $v['brand_id']; ?>"><?php echo $v['brand_name']; ?></option>
            <?php endforeach; ?>
          </select>
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
        layui.use(['form','layer','upload','layedit'],function(){
             var form=layui.form;
             var  layer=layui.layer;
             var upload=layui.upload;
             var layedit=layui.layedit;
            //文件上传 单文件
            var uploadInst = upload.render({
               elem: '#img' //绑定元素
              ,url: "<?php echo url('Goods/goodsupload'); ?>?type=1" //上传接口
              ,done: function(res){
              //上传完毕回调
                    layer.msg(res.font,{icon:res.code})
                    if(res.code==1){
                      $("#goods_img").val(res.src)
                    }  
              }

           })
            //轮播图 多文件
            var uploadInst = upload.render({
               elem: '#imgs' //绑定元素
              ,url: "<?php echo url('Goods/goodsupload'); ?>?type=2" //上传接口
              ,multiple: true
              ,number :3
              ,done: function(res){
              //上传完毕回调
              layer.msg(res.font,{icon:res.code})
                  if(res.code==1){
                    var _src=$("#goods_imgs").val()
                      $("#goods_imgs").val(_src+'|'+res.src)
                      //console.log(_src) 
                    }     
              }
           })
            //富文本编辑器上传图片
            layedit.set({
                uploadImage: {
                   url: "<?php echo url('Goods/goodsedit'); ?>" //接口url
                  ,type: 'post' //默认post
                }
              });
            //富文本编辑器
           var _index= layedit.build('goods_desc', {
               
            });
           //表单提交
           form.on('submit(*)', function(data){
              var goods_desc=layedit.getContent(_index)	
              var info=data.field
              info.goods_desc=goods_desc
              $.post(
                   "<?php echo url('Goods/goodsAdd'); ?>",
                   info,
                   function(result){
                        layer.msg(result.font,{icon:result.code})
                        if(result.code==1){
                         layer.open({
                            type:1,
                            content:'是否进入展示页面',
                            btn:['进入','继续添加'],
                            yes:function(index,layero){
                              location.href="<?php echo url('Goods/goodslist'); ?>";
                            },
                            btn2:function(indxe,layero){
                                 location.href="<?php echo url('Goods/goodsadd'); ?>";
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