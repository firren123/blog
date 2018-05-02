<?php
	return array(
		'TMPL_PARSE_STRING'	=>array(
			'__PUBLIC__'	=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Public',
			'__ROOTPUBLIC__'=>__ROOT__.'/'.APP_NAME.'/Public',
		),
		// 'SHOW_PAGE_TRACE'		=>	1,//显示调试信息
        'TMPL_CACHE_ON'=>false,  //禁止模板编译缓存
        'HTML_CACHE_ON'=>false,  //(禁止静态缓存 )
		
	);

?>