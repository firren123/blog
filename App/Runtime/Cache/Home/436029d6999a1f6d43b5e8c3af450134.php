<?php if (!defined('THINK_PATH')) exit();?><dl>
	<dt>友情连接</dt>
	<?php if(is_array($link)): foreach($link as $key=>$v): ?><dd>

			<a href="<?php echo ($v['link']); ?>" target="_blank"><?php echo ($v["name"]); ?></a>
		</dd><?php endforeach; endif; ?>

	
</dl>