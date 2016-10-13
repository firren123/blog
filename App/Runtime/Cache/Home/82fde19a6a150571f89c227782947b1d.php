<?php if (!defined('THINK_PATH')) exit();?><dl>
	<dt><?php echo ($title); ?></dt>
	<?php echo ($order); ?>
	<?php if(is_array($cate)): foreach($cate as $key=>$vo): ?><dd>
			<a href="<?php echo U('/'.$vo['id']);?>"><?php echo (mb_substr($vo["title"],0,20,'utf-8')); ?></a>
			<span>(<?php echo ($vo["click"]); ?>)</span>
		</dd><?php endforeach; endif; ?>

</dl>