<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>查看留言</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr>
				<th colspan="2" ><a href="<?php echo U(GROUP_NAME .'/Message/index');?>">留言列表</a></th>
			</tr>
			<tr>
				<td align="right" width="30%">用户：</td>
				<td><?php echo (getusername($message["uid"])); ?></td>
			</tr>
			<tr>
				<td align="right">留言信息：</td>
				<td><textarea  cols="70" rows="10"><?php echo ($message["content"]); ?></textarea></td>
			</tr>
			<tr>
				<td align="right">留言时间：</td>
				<td><?php echo ($message["add_time"]); ?></td>
			</tr>
			<tr>
				<td align="right">评论文章</td>
				<td><?php echo (gettitle($message["target_uid"])); ?></td>
			</tr>
			<tr>
				<td align="right">回复：</td>
				<td>
					<textarea name="content" cols="70" rows="10"><?php echo ($reply["content"]); ?></textarea>
				</td>
			</tr>
			<tr>
				<input type="hidden" name="target_id" value="<?php echo ($message["id"]); ?>" />
				<td align="center" colspan="2">
					<input type="submit" value="提交" class="submit" /></td>
			</tr>
			
		</table>
	</form>
</body>
</html>