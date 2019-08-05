<?php
/**
	
*/
class IndexAction extends Action{
	function index(){
		if (!$list = S('index_list')) {
			$list = D('cate')->where(array('pid'=>0))->order('sort asc')->select();
			$cate = D('cate')->select();
			foreach ($list as $k=>$v) {
				import('Class.Category',APP_NAME);
				$cid = Category::getChildCateId($cate,$v['id']);
				$cid[] = $v['id'];
				$where = array('cate_id'=>array('IN',$cid),'status'=>0);
				$order = 'add_time desc';
				$field = array('id','title','add_time');
				$list[$k]['blog'] = D('content')->where($where)->order($order)->field($field)->limit(8)->select();
			}
			S('index_list',$list,60);
		}
		
		$this->list = $list;
		$this->display('index');
	}
}


?>