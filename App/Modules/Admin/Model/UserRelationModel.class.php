<?php

/**
* 用户关联模型
*/
class UserRelationModel extends RelationModel
{
	protected $tableName = 'user';
	
	protected $_link = array(
			'role' => array(
				'mapping_type' => MANY_TO_MANY,
				'foreign_key' => 'user_id',
				'relation_key' =>'role_id',
				'mapping_fields' =>'id,name,remark',
				'relation_table' =>'blog_role_user'
				)
		);
}