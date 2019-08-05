<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>留言板列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th colspan="8"><a href="">留言板列表</a></th>
		</tr>
		<tr>
			<th>ID</th>
			<th>用户ID</th>  
			<th>评论文章</th> 
			<th>评论内容</th>
			<th>时间</th>
			<th>状态</th>  
			<th>操作</th>
			
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
				<td><?php echo ($key+1); ?></td>
				<td><?php echo (getusername($v["uid"])); ?></td>
				<td><?php echo (gettitle($v["target_uid"])); ?></td>
				<td><?php echo ($v["content"]); ?></td>
				<td><?php echo ($v["add_time"]); ?></td>
				<td><?php echo (getstatus($v["status"])); ?></td>
				<td>
					[<a href="<?php echo U(GROUP_NAME .'/Message/look_msg',array('id'=>$v['id']));?>">查看</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Message/reply_msg',array('id'=>$v['id']));?>">回复</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Message/del_msg',array('id'=>$v['id'],'del'=>1));?>">删除</a>]
					
					</if>
				</td>
			</tr><?php endforeach; endif; ?>
	</table>
	<p class="page"><?php echo ($page); ?></p>
</body>
</html>