<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>属性列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>名称</th>
			<th>颜色</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><tr>
			<td align="right"><?php echo ($v["id"]); ?></td>
			<td align="right"><?php echo ($v["name"]); ?></td>
			<td align="right">
				<div style="width:20px; height:20px; background:<?php echo ($v["color"]); ?>;"></div>
			</td>
			<td>
				[<a href="<?php echo U(GROUP_NAME .'/Attribute/edit_attr',array('id'=>$v['id']));?>">修改</a>]
				[<a href="<?php echo U(GROUP_NAME .'/Attribute/del_attr',array('id'=>$v['id']));?>">删除</a>]
			</td>
		</tr><?php endforeach; endif; ?>
	</table>
	<p class="page"><?php echo ($page); ?></p>
</body>
</html>