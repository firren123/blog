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
	<link rel="stylesheet" href="__PUBLIC__/Css/show.css" />
	<link rel="stylesheet" href="__ROOT__/Data/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css">
	
	<script type="text/javascript" src="__ROOT__/Data/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>
	<script type="text/javascript">
		SyntaxHighlighter.all();
	</script>
	

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
		<div class="main-left-content">
			<div class='location'>
				<a href="__GROUP__/">首页</a>>
				<?php $count = count($topCate)-1; ?>
				<?php if(is_array($topCate)): foreach($topCate as $key=>$v): ?><a href="<?php echo U('/c_'.$v['id']);?>"><?php echo ($v["name"]); ?></a>
					<?php if($key != $count): ?>><?php endif; endforeach; endif; ?>
			</div>
			<div class="title">
				<p><?php echo ($blog["title"]); ?></p>
				<div>
					<span class='fl'>发布于：<?php echo (date('Y年m月d日',$blog["add_time"])); ?></span>
					<span class='fr'>已被阅读<script src="<?php echo U(GROUP_NAME . '/Detail/clicknum',array('id'=>$blog['id']));?>"></script>次</span>
				</div>
			</div>
			<div class='content' style="word-break:break-all">

				<?php echo ($blog["content"]); ?>
			</div>
		</div>
		<input type="hidden" name="target_uid" id='target_uid' value="<?php echo ($blog["id"]); ?>">
		<?php echo W('Evaluate');?>
	</div>

	<!--主体右侧-->
			<div class='main-right'>
			<?php echo W('Cate',array('title'=>'热门博文','order'=>'click desc','limit'=>5));?>
			<?php echo W('Cate',array('title'=>'最新发布','order'=>'add_time desc','limit'=>5));?>
			<?php echo W('Link');?>
		</div>
	
</div>
<!--底部-->
<SCRIPT TYPE="text/javascript" src="__PUBLIC__/Js/detail.js"></SCRIPT>
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