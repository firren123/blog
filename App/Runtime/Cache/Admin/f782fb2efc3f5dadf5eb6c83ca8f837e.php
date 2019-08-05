<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>博文列表</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>所属分类</th>
			<th>属性</th>
			<th>发布时间</th>
			<th>是否隐藏</th>
			<th>操作</th>
		</tr>
		<?php if(is_array($content)): foreach($content as $key=>$v): ?><tr>
				<td><?php echo ($v["id"]); ?></td>
				<td><a href="<?php echo U('/'.$v['id']);?>" target="_block"><?php echo ($v["title"]); ?></a></td>
				<td><?php echo ($v["cate"]); ?></td>
				<td>
					<?php if(is_array($v["attr"])): foreach($v["attr"] as $key=>$a): ?>[<strong style="color:<?php echo ($a["color"]); ?>"><?php echo ($a["name"]); ?></strong>]<?php endforeach; endif; ?>
				</td>
				<td><?php echo (date('Y-m-d H:i',$v["add_time"])); ?></td>
				<td><?php echo ($v["status"]); ?></td>
				<td>
					<?php if(ACTION_NAME == 'index'): ?>[<a href="<?php echo U(GROUP_NAME .'/Blog/edit_blog',array('id'=>$v['id']));?>">修改</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Blog/toTrach',array('id'=>$v['id'],'del'=>1));?>">删除</a>]
					<?php else: ?>
					[<a href="<?php echo U(GROUP_NAME .'/Blog/toTrach',array('id'=>$v['id']));?>">还原</a>]
					[<a href="<?php echo U(GROUP_NAME .'/Blog/del_blog',array('id'=>$v['id']));?>">彻底删除</a>]<?php endif; ?>
				</td>
			</tr><?php endforeach; endif; ?>
		
			
		
	</table>
	<p  class="page"><?php echo ($page); ?></p>
</body>
</html>