<?php
/**
* 
*/
class BlogViewModel extends ViewModel
{
	protected $viewFields = array(
		'content'=>array(
			'id','title','add_time','click','summary',
			'_type'=>'LEFT'
		),
		'cate'=>array(
			'name',
			'_on'=>'content.cate_id=cate.id'
		)
	);
	function getAll($where,$limit){
		return $this->where($where)->limit($limit)->select();
	}
}