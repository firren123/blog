<?php
return array(
	'URL_MODEL'				=>	'2',
	'DB_TYPE'				=>	'mysqli',
	'DB_HOST'				=>	'127.0.0.1',
	'DB_NAME'				=>	'blog',
	'DB_USER'				=>	'blog',
	'DB_PWD'				=>	'blog123',

//	'DB_HOST'				=>	'127.0.0.1',
//	'DB_NAME'				=>	'blog',
//	'DB_USER'				=>	'root',
//	'DB_PWD'				=>	'root',
	'DB_PORT'				=>	'3306',
	'DB_PREFIX'				=>	'blog_',

	'APP_GROUP_LIST'        => 'Home,Admin,Member,Api',      // 项目分组设定,多个组之间用逗号分隔,例如'Home,Admin'
    'DEFAULT_GROUP'			=>	'Home',

    'APP_GROUP_MODE'        =>  1,  // 分组模式 0 普通分组 1 独立分组
    'APP_GROUP_PATH'        =>  'Modules', // 分组目录 独立分组模式下面有效
    // 'SHOW_PAGE_TRACE'		=>	1,//显示调试信息
	'TMPL_CACHE_ON' => false,//禁止模板编译缓存
	'HTML_CACHE_ON' => false,//禁止静态缓存
    //加载配置文件
    'LOAD_EXT_CONFIG'		=>'verify',

    'APP_AUTOLOAD_PATH' =>'@.TagLib',
	'TAGLIB_BUILD_IN'	=>'Cx,Lj',  //cx是系统自带的标签
    //URL重写规则
    'URL_ROUTER_ON' =>true,
	'URL_ROUTE_RULES' => array( //定义路由规则
//		'c/:id'=>'Home/List/index',
		'/^c_(\d+)$/'=>'Home/List/index?id=:1',
		':id\d'=>'Home/Detail/index',
		'/^Admin\/Blog\/index\/p\/(\d+)$/'=>'Admin/Blog/index?p=:1',
        '/^Admin\/Blog\/toTrach\/id\/(\d+)\/del\/(\d+)$/'=>'Admin/Blog/toTrach?id=:1&del=:2',

///Blog/toTrach/id/118/del/1.html
		),
	// 'URL_ROUTER_ON'   => true, //开启路由
 //    'URL_ROUTE_RULES' => array( //定义路由规则
 //        'news/:year/:month/:day' => array('News/archive', 'status=1'),
 //        'news/:id'               => 'News/read',
 //        'news/read/:id'          => '/news/:1',
 //        'c/:id'=>'Home/List/index',
 //    ),

	'SESSION_OPTIONS'       => array('path'=>'/tmp'), // session 配置数组 支持type name id path expire domain 等参数

	// 邮件配置
	#		* ThinkPHP 邮件处理类
	#* 邮件处理类需要在项目配置或框架配置里增加如下配置参数:
	'SMTP_SERVER' =>'smtp.163.com',	 //邮件服务器
	'SMTP_PORT' =>25,	 //邮件服务器端口
	'SMTP_USER_EMAIL' =>'firren@163.com', //SMTP服务器的用户邮箱(一般发件人也得用这个邮箱)
	'SMTP_USER'=>'firren@163.com',	 //SMTP服务器账户名
	'SMTP_PWD'=>'firren287183610',	 //SMTP服务器账户密码
	'SMTP_MAIL_TYPE'=>'HTML',	 //发送邮件类型:HTML,TXT(注意都是大写)
	'SMTP_TIME_OUT'=>30,	 //超时时间
	'SMTP_AUTH'=>true,	 //邮箱验证(一般都要开启)
);
?>
