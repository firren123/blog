<?php if (!defined('THINK_PATH')) exit();?><div class='main-left-evaluate'>
	<div class='location'>
		<a href="__GROUP__/">评论信息</a>
	</div>
	<?php if(is_array($evaluate)): foreach($evaluate as $key=>$list): ?><div class="title">
		<span class="evaluate_index"><?php echo ($key+1); ?>楼</span>
		<p ><img class="evaluate-top-pic" src="<?php echo ((getpic($list["uid"]))?(getpic($list["uid"])):'__ROOT__/Public/Images/001.gif'); ?>" alt=""></p>
		<div>
			<span class='evaluate-name'>用户名：<?php echo (getusername($list["uid"])); ?></span>
			<span class='evaluate-message'><?php echo ($list["content"]); ?></span>
			<span class="evaluate-time">回复时间:<?php echo ($list["add_time"]); ?></span>
			<span class="support">
				<b class="bSub" id="support<?php echo ($list["id"]); ?>">支持(<?php echo ($list["support"]); ?>)</b>
				<b>反对(<?php echo ($list["against"]); ?>)</b>
				<b>回复(<?php echo ($list["reply"]); ?>)</b></span>
		</div>
	</div><?php endforeach; endif; ?>
</div>
<div class='main-left-message'>
	<div class='location'>
		<a href="__GROUP__/">评论</a>
	</div>
	<div class="title">
		<textarea name="message" id="evaluate-message"></textarea>
		<input type="hidden" name='uid' id="uid" value="<?php echo ($_SESSION['uid']); ?>">
		<input type="submit" class="submit" value="提交" onclick='subMsg()'>
	</div>
</div>