<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>分类列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME .'/Category/cate_sort');?>" method="post">
		<table class="table" width="95%">
			<tr>
				<th colspan="5">分类列表</th>
			</tr>
			<tr>
				<th>ID</th>
				<th>分类名称</th>
				<th>分类级别</th>
				<th>分类排序</th>
				<th>是否显示在导航</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><?php echo ($v["html"]); echo ($v["name"]); ?></td>
				<td><?php echo ($v["level"]); ?></td>
				<td><input type="text" name="<?php echo ($v["id"]); ?>" value="<?php echo ($v["sort"]); ?>" height="26px" size="4" /></td>
				<td><?php echo (is_show($v["is_show"])); ?></td>
				<td>
					[<a href="<?php echo U(GROUP_NAME .'/Category/cate_edit',array('id'=>$v['id'],'pid'=>$v['pid']));?>">修改</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Category/cate_del',array('id'=>$v['id']));?>">删除</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Category/addcate',array('pid'=>$v['id']));?>">添加子分类</a>]
				</td>
			</tr><?php endforeach; endif; ?>
			<tr>
				<td colspan="5" align="center"><input class="submit" type="submit" value="排序"/></td>
			</tr>
		</table>

	</form>
</body>
</html>