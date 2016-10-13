<?php
	return array(
		'TMPL_PARSE_STRING'	=>array(
			'__PUBLIC__'	=>__ROOT__.'/'.APP_NAME.'/Modules/'.GROUP_NAME.'/Public',
		),
		'RBAC_SUPERADMIN'	=> 'admin',
		'ADMIN_AUTH_KEY'	=>'superadmin',
		'USER_AUTH_ON'		=>true,
		'USER_AUTH_KEY'		=>'uid',
		'USER_AUTH_TYPE'	=>1,
		'NOT_AUTH_MODULE'	=>'Login',
		'NOT_AUTH_ACTION'	=>'index',
		'RBAC_ROLE_TABLE'	=>'blog_role',
		'RBAC_USER_TABLE'	=>'blog_role_user',
		'RBAC_ACCESS_TABLE'	=>'blog_access',
		'RBAC_NODE_TABLE'	=>'blog_node'

		// 配置文件增加设置
	// USER_AUTH_ON 是否需要认证
	// USER_AUTH_TYPE 认证类型 1.登陆验证 2.时时验证
	// USER_AUTH_KEY 认证识别号
	// REQUIRE_AUTH_MODULE  需要认证模块
	// NOT_AUTH_MODULE 无需认证模块
	// USER_AUTH_GATEWAY 认证网关
	// RBAC_DB_DSN  数据库连接DSN
	// RBAC_ROLE_TABLE 角色表名称
	// RBAC_USER_TABLE 用户表名称
	// RBAC_ACCESS_TABLE 权限表名称
	// RBAC_NODE_TABLE 节点表名称
	);

?>