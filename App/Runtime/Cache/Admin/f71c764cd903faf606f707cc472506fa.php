<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<title>用户列表</title>
</head>
<body>
	<table class="table">
		<tr>
			<th colspan="7"><a href="<?php echo U('Admin/Rbac/adduser');?>">用户添加</a></th>
		</tr>
		<tr>
			<td>ID</td>
			<td>用户名称</td>
			<td>邮箱</td>
			<td>最后登录IP</td>
			<td>最后登录时间</td>
			<td>所属用户组</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["username"]); ?></td>
			<td><?php echo ($v["email"]); ?></td>
			<td><?php echo ($v["last_login_ip"]); ?></td>
			<td><?php echo (date('Y-m-d H:i:s',$v["last_login_time"])); ?></td>
			<td>
				<?php if($v['username'] == C('RBAC_SUPERADMIN')): ?>超级管理员<?php endif; ?>
				<?php if(is_array($v["role"])): foreach($v["role"] as $key=>$u): echo ($u["name"]); ?>(<?php echo ($u["remark"]); ?>)<br><?php endforeach; endif; ?>
			</td>
			<td>
				<?php if($v['username'] == C('RBAC_SUPERADMIN')): ?>不可修改
					<?php else: ?>
				<a href="<?php echo U('Admin/Rbac/edituser',array('id'=>$v['id']));?>">修改</a>
				<a href="<?php echo U('Admin/Rbac/deluser',array('id'=>$v['id']));?>">删除</a><?php endif; ?>
			</td>
		</tr><?php endforeach; endif; ?>
		
	</table>
	<div class="page"><?php echo ($page); ?></div>
</body>
</html>