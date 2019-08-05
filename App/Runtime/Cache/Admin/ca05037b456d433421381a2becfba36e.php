<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
	<title>欢迎页面</title>
</head>
<body>
	<h1>欢迎使用李晨军的网站后台系统</h1>
	<div class="back">
	<table class="table">
		<tr>
			
			<th>
				服务器配置
			</th>
			<th>
				参数
			</th>
			
		</tr>
		<?php if(is_array($data["sys"])): $i = 0; $__LIST__ = $data["sys"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
				
				<td>
					<?php echo ($v["0"]); ?>
				</td>
				<td>
					<?php echo ($v["1"]); ?>

				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>
	</div>
	<div class="back">
	<table class="table">
		<tr>
			
			<th>
				个人配置
			</th>
			<th>
				参数
			</th>
			
		</tr>
		<?php if(is_array($data["user"])): $i = 0; $__LIST__ = $data["user"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
				
				<td>
					<?php echo ($v["0"]); ?>
				</td>
				<td>
					<?php echo ($v["1"]); ?>

				</td>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		
	</table>
</div>
</body>
</html>