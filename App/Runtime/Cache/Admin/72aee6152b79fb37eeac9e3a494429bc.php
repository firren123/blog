<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>属性添加/修改</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr>
				<th colspan="2">属性添加</th>
			</tr>
			<tr>
				<td align="right">属性名称</td>
				<td><input type="text" name="name" value="<?php echo ($attr["name"]); ?>" /></td>
			</tr>
			<tr>
				<td align="right">属性颜色</td>
				<td><input type="text" name="color" value="<?php echo ($attr["color"]); ?>" /></td>
			</tr>
			<tr>
				<input type="hidden" value="<?php echo ($attr["id"]); ?>" name="id" />
				<td align="center" colspan="2"><input type="submit" value="提交保存" class="submit" /></td>
			</tr>
		</table>
	</form>
</body>
</html>