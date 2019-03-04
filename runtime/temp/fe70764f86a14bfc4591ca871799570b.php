<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:82:"D:\phpstudy\WWW\demo4\myshop\public/../application/index\view\product\product.html";i:1544056391;}*/ ?>

<div class="list_c" >
    <input type="hidden"  class="count" value="<?php echo $count; ?>">
    <ul class="cate_list">
        <?php foreach($goodsInfo as $k=>$v): ?>
        <li>
            <div class="img"><a href="<?php echo url('Product/detail'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><img src="__ROOT__/goods_img/<?php echo $v['goods_img']; ?>" width="210" height="185" /></a></div>
            <div class="price">
                <font>￥<span><?php echo $v['self_price']; ?></span></font> &nbsp; <?php echo $v['goods_score']; ?>R
            </div>
            <div class="name"><a href="<?php echo url('Product/detail'); ?>?goods_id=<?php echo $v['goods_id']; ?>"><?php echo $v['goods_name']; ?></a></div>
            <div class="carbg">
                <a href="#" class="ss">收藏</a>
                <a href="#" class="j_car">加入购物车</a>
            </div>
        </li>
        <?php endforeach; ?>
    </ul>
    <div class="pages">
        <?php echo $page_str; ?>
    </div>

</div>