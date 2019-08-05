<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<script type="text/javascript" src="__PUBLIC__/Js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/Js/index.js"></script>
<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<base target="iframe"/>
<head>
	<title>博客后台管理系统</title>
</head>
<body>
	<div id="top">
		<span class="logo">80年代博客管理后台</span>
		<div class="menu" id="nav">
			<a class="active" href="javascript:;" onclick="nav(0);">网站管理</a>
			<a href="javascript:;" onclick="nav(1);">会员管理</a>
			<a href="javascript:;" onclick="nav(2);">系统管理</a>
			<a href="javascript:;" onclick="nav(3);">博客管理</a>
			<a href="javascript:;" onclick="nav(4);">留言板管理</a>
			<!-- <a href="javascript:;" onclick="nav(5);">商城管理</a> -->
		</div>
		
		<div class="exit">
			<a href="<?php echo U(__ROOT__.'/');?>" target="_blank">查看首页</a>
			<a href="<?php echo U('Admin/Login/logout');?>" target="_self">退出</a>
		</div>
	</div>
	<div id="left">
		<dl>
			
			<dt>分类管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME .'/Category/index');?>">分类列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME .'/Category/addcate');?>">添加分类</a></dd>
			<dt>属性管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME .'/Attribute/index');?>">属性列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME .'/Attribute/add_attr');?>">添加属性</a></dd>
		</dl>
		<dl  style="display:none;">
			
			<dt>管理员管理</dt>
			<dd><a href="<?php echo U('Admin/Rbac/listuser');?>">管理员列表</a></dd>
			<dd><a href="<?php echo U('/Admin/Rbac/listrole');?>">角色列表</a></dd>
			<dd><a href="<?php echo U('Admin/Rbac/listnode');?>">节点列表</a></dd>
			<dt>用户管理</dt>
			<dd><a href="<?php echo U('Admin/Member/index');?>">用户列表</a></dd>
			<!-- <dd><a href="<?php echo U('/Admin/Level/index');?>">等级列表</a></dd> -->
			<dd><a href="<?php echo U('Admin/Member/add');?>">添加会员</a></dd>
			<!-- <dd><a href="<?php echo U('Admin/Level/add');?>">添加等级</a></dd> -->
		</dl>
		<dl style="display:none;">
			<dt>系统设置</dt>
			<dd><a href="<?php echo U(GROUP_NAME . '/System/verify');?>">验证码设置</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME . '/Link/index');?>">友情链接</a></dd>
			
		</dl>
		<dl style="display:none;">
			<dt>博文管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME .'/Blog/index');?>">博文列表</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME .'/Blog/add_blog');?>">添加博文</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME .'/Blog/trach');?>">回收站</a></dd>
			<dd><a href="<?php echo U(GROUP_NAME .'/Blog/clear_trach');?>">清空回收站</a></dd>
			
			
		</dl>
		
		<dl style="display:none;">
			<dt>留言板管理</dt>
			<dd><a href="<?php echo U(GROUP_NAME .'/Message/index');?>">留言列表</a></dd>
		</dl>
		<dl style="display:none;">
			<dt>商城管理</dt>
			<dd><a href="">商城</a></dd>
			
		</dl>
		
	</div>
	<div id="right">
		<iframe name="iframe" src="<?php echo U(GROUP_NAME . '/Index/welcome');?>"></iframe>
	</div>
</body>
</html>