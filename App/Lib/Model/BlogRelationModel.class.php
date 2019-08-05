<?php
/**
* 博客信息读取
*/
class BlogRelationModel extends RelationModel
{
	protected $tableName = 'content';
	protected $_link = array(
		'attr' => array(
				'mapping_type' =>MANY_TO_MANY,
				'mapping_name' =>'attr',
				'foreign_key'  =>'cid',
				'relation_foreign_key' =>'attr_id',
				'relation_table' =>'blog_attr_content'
			),
		'cate' => array(
				'mapping_type' =>BELONGS_TO, //HAS_ONE,HAS_MANY,BELONGS_TO
				'foreign_key'  =>'cate_id',
				'mapping_fields' =>'name',
				'as_fields'	=>'name:cate'
			)
	);

	function getBlog($status = 0,$limit = 0){
		
		
		$field = array('status');
		$where = array('status'=>$status);
		if ($limit) {
			return $content = D('BlogRelation')->field($field,true)->where($where)->relation(true)->limit($limit)->order('add_time desc')->select();
		}else{
			return $content = D('BlogRelation')->field($field,true)->where($where)->relation(true)->order('add_time desc')->select();
		}
		
	}
	
}

?>