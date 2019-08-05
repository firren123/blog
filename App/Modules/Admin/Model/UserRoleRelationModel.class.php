<?php
/**
* USER,ROLE,ROLE_USER三表查询
* time:2013-10-22
* 
*/
class UserRoleRelationModel extends RelationModel
{
	
	protected $tableName = 'user';
	protected $_link = array(
		'role' =>array(
				'mapping_type'	=>MANY_TO_MANY,
				'foreign_key'	=>'user_id',
				'relation_key'	=>'role_id',
				'relation_table'=>'blog_role_user'
			),
	);
}