<?php
/**
	
*/
class ListAction extends Action{
	function index(){
		import('Class.Category',APP_NAME);
		import('ORG.Util.Page');

		$id = I('id',0,'intval');
		$cate = D('cate')->select();
		$cid = Category::getChildCateId($cate,$id);
		$cate_list = Category::getParentsCate($cate ,$id);
		$cid[] = $id;
		$where = array('cate_id'=>array('IN',$cid),'status'=>0);
		$count = D('content')->where($where)->count();
		$p= new Page($count,10);
		$limit = $p->firstRow.','.$p->listRows;
		$blog = D('BlogView')->getAll($where,$limit);
		$this->cate_list = $cate_list;
		$this->list = $blog;
		$this->page = $p->show();
		$this->display('list');
	}
	function search(){
		import('ORG.Util.Page');
		$keyword = I('keyword');
		$cate_list = array(0=>array('name'=>'搜索'),1=>array('name'=>$keyword));
		$where = array(
			array(
				'title'=>array('like','%'.$keyword.'%'),
				'keywords'=>array('like','%'.$keyword.'%'),
				'summary'=>array('like','%'.$keyword.'%'),
				'_logic'=>'or',
				),
			'status'=>0,
			);
		$count = D('content')->where($where)->count();
		$p= new Page($count,10);
		$limit = $p->firstRow.','.$p->listRows;
		$blog = D('BlogView')->getAll($where,$limit);
		$this->cate_list = $cate_list;		
		$this->list = $blog;
		$this->page = $p->show();
		$this->display('list');
		
	}
}


?>