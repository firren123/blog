<?php
return array(
		'TMPL_PARSE_STRING'	=>array(
			'__PUBLIC__'	=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Public',
		),
		// 'APP_AUTOLOAD_PATH' =>'@.TagLib',
		// 'TAGLIB_BUILD_IN'	=>'Cx,Lj',  //cx是系统自带的标签
		//开启缓存 静态缓存
		'HTML_CACHE_ON'		=>true,
		// 'URL_HTML_SUFFIX'=>'.shtml',
		'HTML_CACHE_RULES'	=>array(
			'Detail:index'=>array('{:module}_{:action}_{id}',10)
			),		

	
	);









?>