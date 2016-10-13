<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="author" content="80wow"/>
	<meta name="keywords" content="80wow,<?php echo ($keywords); ?>"/>
	<meta name="description" content="<?php echo ($description); ?>"/>
	<title>逍遥博客-<?php echo ($title); ?></title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>
</head>
	<link rel="stylesheet" href="__PUBLIC__/Css/list.css" />

<body>
<!--头部-->
	<div class='top-list-wrap'>
		<div class='top-list'>
			<ul class='l-list'>
				<?php if(empty($_SESSION['memberid'])): ?><li><a href="<?php echo U('/Member/Login/reg');?>" >免费注册</a></li>
				<li><a href="<?php echo U('/Member/Login/index');?>" >登录</a></li>
					<?php else: ?> 
					<li>欢迎<a href="<?php echo U('/Member/index');?>">[<?php echo (session('membername')); ?>]</a></li>
					<li><a href="<?php echo U('/Member/Login/logout');?>" >退出</a></li><?php endif; ?>
				<!-- <li><a href="http://www.80wow.com" target='_blank'>80wow网论坛</a></li>
				<li><a href="http://www.80wow.com" target='_blank'>80wow学习社区</a></li> -->
			</ul>
			<ul class='r-list'>
				<!-- <li><a href="http://www.80wow.com" target='_blank'>80wow框架</a></li>
				<li><a href="http://www.80wow.com" target='_blank'>免费视频教程</a></li> -->
			</ul>
		</div>
	</div>

	<div class='top-search-wrap'>
		<div class='top-search'>
			<a href="http://www.80wow.com" target='_blank' class='logo'>
				80年代博客
			</a>
			<div class='search-wrap'>
				<form action="<?php echo U(GROUP_NAME.'/List/search');?>" method='get'>
					<input type="text" name='keyword' class='search-content'/>
					<input type="submit" value='搜索'/>
				</form>
			</div>
		</div>
	</div>


	<div class='top-nav-wrap'>
		<ul class='nav-lv1'>
			<li class='nav-lv1-li'>
				<a href="__GROUP__/" class='top-cate'>博客首页</a>
			</li>
					<?php
 $cate = M('cate')->order("sort ASC")->where(array('is_show'=>1))->limit(100)->select(); import('Class.Category',APP_NAME); $cates = Category::unlimitedForLayer($cate); foreach ($cates as $v) : ?><li class='nav-lv1-li'>
				<a href="<?php echo U('/c_'.$v['id']);?>" class='top-cate'><?php echo ($v["name"]); ?></a>
				
				<ul>
					<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$vo): ?><li><a href="<?php echo U('/c_'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a></li><?php endforeach; endif; ?>
				</ul>
			</li><?php endforeach ?>
		</ul>
	</div>

<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<div class="top_cate">
				<a href="<?php echo U('/');?>">首页</a>
				<?php if(is_array($cate_list)): foreach($cate_list as $key=>$vo): ?>><a href="<?php echo U('/'.$vo['id']);?>"><?php echo ($vo["name"]); ?></a><?php endforeach; endif; ?>
			</div>
			<?php if(is_array($list)): foreach($list as $key=>$vo): ?><dl>
					<dt><?php echo ($vo["name"]); ?></dt>
					<dd class='channel'><a href="<?php echo U('/'.$vo['id']);?>"><?php echo ($vo["title"]); ?></a></dd>
					<dd class='info'>
						<span class='time'>发布于：<?php echo (date('Y年m月d日 H:i:s',$vo["add_time"])); ?></span>
						<span class='click'>点击：<?php echo ($vo["click"]); ?></span>
					</dd>
					<dd class='content'><a href="<?php echo U('/'.$vo['id']);?>"><?php echo ($vo["summary"]); ?></a></dd>
					<dd class='read'>
						<a href="<?php echo U('/'.$vo['id']);?>">阅读全文>></a>
					</dd>
				</dl><?php endforeach; endif; ?>
			<p><?php echo ($page); ?></p>
			
		</div>
	<!--主体右侧-->
		<div class='main-right'>
			<?php echo W('Cate',array('title'=>'热门博文','order'=>'click desc','limit'=>5));?>
			<?php echo W('Cate',array('title'=>'最新发布','order'=>'add_time desc','limit'=>5));?>
			<?php echo W('Link');?>
		</div>
	
</div>
<!--底部-->
	<div class='bottom'>
		<div>
			网站版权归80年代博客所有
		</div>
	</div>



<!-- 网站小人物 -->
<link rel="stylesheet" href="__PUBLIC__/spig/spigPet.css" />
<script type="text/JavaScript" src='__PUBLIC__/spig/spig.js'></script>
<div id="spig" class="spig">
    <div id="message">正在加载中……</div>
    <div id="mumu" class="mumu"></div>
</div>
<script type="text/javascript">
  var num = Math.floor(Math.random() * ( 3456 + 1));
var isindex = true;
var visitor = "亲"+num;
window._deel = {
    name: '多米斯特里',
    url: 'http://www.80wow.com',
    rss: 'http://www.80wow.com',
    maillist: '',
    maillistCode: '',
    commenton: 1,
    roll: [0,0]
}
</script>
<!-- 网站小人物结束 -->

	<!-- Piwik -->
<script type="text/javascript">
  var _paq = _paq || [];
  _paq.push(['trackPageView']);
  _paq.push(['enableLinkTracking']);
  (function() {
    var u=(("https:" == document.location.protocol) ? "https" : "http") + "://tongji.80wow.com/";
    _paq.push(['setTrackerUrl', u+'piwik.php']);
    _paq.push(['setSiteId', 1]);
    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0]; g.type='text/javascript';
    g.defer=true; g.async=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
  })();

</script>
<noscript><p><img src="http://tongji.80wow.com/piwik.php?idsite=1" style="border:0;" alt="" /></p></noscript>
<!-- End Piwik Code -->

</body>
</html>