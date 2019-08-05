<?php
return array(
	'URL_MODEL'				=>	'2',
	'DB_TYPE'				=>	'mysql',
	'DB_HOST'				=>	'dingqibeifen.com',
	'DB_NAME'				=>	'a1120162925',
	'DB_USER'				=>	'a1120162925',
	'DB_PWD'				=>	'49643516',
	'DB_PORT'				=>	'3306',
	'DB_PREFIX'				=>	'blog_',

	'APP_GROUP_LIST'        => 'Home,Admin,Member',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
    'DEFAULT_GROUP'			=>	'Home'  ,

    'APP_GROUP_MODE'        =>  1,  // 分组模式 0 普通分组 1 独立分组
    'APP_GROUP_PATH'        =>  'Modules', // 分组目录 独立分组模式下面有效
    'SHOW_PAGE_TRACE'		=>	1 ,//显示调试信息

    //加载配置文件
    'LOAD_EXT_CONFIG'		=>'verify',
    //URL重写规则
    'URL_ROUTER_ON' =>true,
	'URL_ROUTE_RULES' => array( //定义路由规则
		'c/:id'=>'Home/List/index',
		'/^c_(\d+)$/'=>'Home/List/index?id=:1',
		// '/^s_(\s+)$/'=>'Home/List/search?s=:1',
		':id\d'=>'Home/Detail/index',
		),
	// 'URL_ROUTER_ON'   => true, //开启路由
 //    'URL_ROUTE_RULES' => array( //定义路由规则
 //        'news/:year/:month/:day' => array('News/archive', 'status=1'),
 //        'news/:id'               => 'News/read',
 //        'news/read/:id'          => '/news/:1',
 //        'c/:id'=>'Home/List/index',
 //    ),
);
?>