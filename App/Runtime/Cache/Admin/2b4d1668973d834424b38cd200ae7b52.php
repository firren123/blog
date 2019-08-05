<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加分类</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<form action="" method="post">
		<table class="table">
			<tr>
				<th colspan="2" >添加分类</th>
			</tr>
			<tr>
				<td align="right" width="40%">父级名称</td>
				<td><?php echo ($p_cate["name"]); ?></td>
			</tr>
			<tr>
				<td align="right">分类名称</td>
				<td><input type="text" name="name" value="<?php echo ($cate["name"]); ?>"/></td>
			</tr>
			<tr>
				<td align="right">排序</td>
				<td><input type="text" name="sort" value="<?php echo (($cate["sort"])?($cate["sort"]):100); ?>" /></td>
			</tr>
			<tr>
				<td align="right">首页是否显示</td>
				<td>
					<label >
					<input type="radio" name="is_show" value="1" <?php if($cate['is_show'] == 1): ?>checked<?php endif; ?> /> 显示</label>
					<label >
					<input type="radio" name="is_show" value="0" <?php if($cate['is_show'] != 1): ?>checked<?php endif; ?> /> 不显示</label>
				</td>
			</tr>
			<tr>
				<input type="hidden" name="pid" value="<?php echo ($p_cate["id"]); ?>" />
				<input type="hidden" name="id" value="<?php echo ($cate["id"]); ?>" />
				<td align="center" colspan="2"><input type="submit" value="保存提交" class="submit" /></td>
			</tr>
			
		</table>
	</form>
</body>
</html>