<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>添加博文</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
	<script type="text/javascript">
		window.UEDITOR_HOME_URL = "__ROOT__/Data/ueditor/";

		window.onload = function(){
			window.UEDITOR_CONFIG.initialFrameHeight=400;
			window.UEDITOR_CONFIG.initialFrameWidth=1100;
			UE.getEditor('content');
		}
			
	</script>
	<script type="text/javascript" src="__ROOT__/Data/ueditor/ueditor.config.js"></script>
	<script type="text/javascript" src="__ROOT__/Data/ueditor/ueditor.all.js"></script>
</head>
<body>
	<form action="" method="post" >
		<table class="table">
			<tr>
				<th colspan="2">添加博文</th>
			</tr>
			<tr>
				<td align="right">分类：</td>
				<td>
					<select name="cate_id">
						<option value="0">======请选择分类======</option>
						<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>" <?php if($v[select]): ?>selected="selected"<?php endif; ?>>&nbsp;<?php echo ($v["html"]); echo ($v["name"]); ?></option><?php endforeach; endif; ?>
					</select>
				</td>
			</tr>
			<tr>
				<td align="right">属性</td>
				<td>
					<?php if(is_array($attr)): foreach($attr as $key=>$v): ?><label style="margin-right:10px;">
						<input type="checkbox" value="<?php echo ($v["id"]); ?>" <?php if($v['select']): ?>checked<?php endif; ?> name="attr_id[]" />
						<?php echo ($v["name"]); ?>
						</label><?php endforeach; endif; ?>
				</td>
			</tr>
			<tr>
				<td align="right">点击次数</td>
				<td><input type="text" name="click" 
					<?php if($blog['click']): ?>value="<?php echo ($blog["click"]); ?>" <?php else: ?> value="100"<?php endif; ?> ></td>
			</tr>
			<tr>
				<td align="right">标题：</td>
				<td><input type="text" name="title" value="<?php echo ($blog["title"]); ?>" /></td>
			</tr>
			<tr>
				<td align="right">摘要：</td>
				<td><input type="text" name="summary" value="<?php echo ($blog["summary"]); ?>" /></td>
			</tr>
			<tr>
				<td colspan="2">
					<textarea name="content" id="content"><?php echo ($blog["content"]); ?></textarea>
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="id" value="<?php echo ($blog["id"]); ?>" />
					<input type="submit" value="保存添加" class="submit" />
				</td>
			</tr>
		</table>
	</form>
</body>
</html>