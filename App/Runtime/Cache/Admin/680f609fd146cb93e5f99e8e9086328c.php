<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<title>角色列表</title>
</head>
<body>
	<table class="table">
		<tr><th colspan="5"><a href="<?php echo U('Admin/Rbac/addrole');?>">添加角色</a></th></tr>
		<tr>
			<td>ID</td>
			<td>角色名称</td>
			<td>角色注释</td>
			<td>状态</td>
			<td>操作</td>
		</tr>
		<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
			<td><?php echo ($v["id"]); ?></td>
			<td><?php echo ($v["name"]); ?></td>
			<td><?php echo ($v["remark"]); ?></td>
			<td>
				<?php if($v['status']): ?>启用
				<?php else: ?>
					禁用<?php endif; ?>
				</td>
			<td>
				<a href="<?php echo U('Admin/Rbac/editrole',array('id'=>$v['id']));?>">修改</a>
				<a href="<?php echo U('Admin/Rbac/delrole',array('id'=>$v['id']));?>">删除</a>
				<a href="<?php echo U('Admin/Rbac/access',array('id'=>$v['id']));?>">修改权限</a>

			</td>
		</tr><?php endforeach; endif; ?>
		<tr>
			<td colspan="5" align="right"><?php echo ($page); ?></td>
		</tr>
	</table>
</body>
</html>