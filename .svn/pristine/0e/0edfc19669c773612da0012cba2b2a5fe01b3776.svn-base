<?php
/**
* 会员信息管理
*/
class MemberRelationModel extends RelationModel
{
	protected $tableName = 'member';
	protected $_link = array(
		'cate' => array(
				'mapping_type' =>HAS_MANY, //HAS_ONE,HAS_MANY,BELONGS_TO
				'foreign_key'  =>'level_id',
				'mapping_fields' =>'level_name'
			)
	);

	
	
}

?>