<?php

/**
* 分类控制器
+
*	2013-10-17
*/
class CategoryAction extends CommonAction
{
	//分类首页模板
	function index()
	{
		$cate = D('cate')->order('sort')->select();
		import('Class.Category',APP_NAME);
		
		//$list = Category::unlimitedForLayer($cate );
		$this->cate = Category::unlimitedForLevel($cate,'|----');
		$this->display();		
	}
	//分类添加
	function addcate(){
		if (IS_POST) {
			$data = I('post.');
			if (D('cate')->add($data)) {
				$this->success('添加成功',U(GROUP_NAME .'/Category/index'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$id = I('pid');
			if ($id>0) {
				$this->p_cate = D('cate')->find($id);
			}else{
				$this->p_cate = array(
					'pid' =>0,
					'name'=>'顶级分类',
				);
			}
			$this->display();
		}
	}
	//分类排序
	function cate_sort(){
		$data = I('post.');
		foreach ($data as $id => $sort) {
			D('cate')->where(array('id'=>$id))->setField('sort',$sort);
		}
		$this->redirect(GROUP_NAME .'/Category/index');
	}
	//分类修改
	function cate_edit(){
		if (IS_POST) {
			$data = I('post.');
			if (D('cate')->save($data)) {
				$this->success('修改成功',U(GROUP_NAME .'/Category/index'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$pid = I('pid');
			$id = I('id');
			var_dump($id);
			if ($pid>0) {
				$this->p_cate = D('cate')->find($pid);
			}else{
				$this->p_cate = array(
					'pid' =>0,
					'name'=>'顶级分类',
				);
			}
			$this->cate = D('cate')->find($id);
			$this->display('addcate');
		}
	}
	//分类删除
	function cate_del(){
		$id = I('id');
		if (D('cate')->delete($id)) {
				$this->success('删除成功',U(GROUP_NAME .'/Category/index'));
			}else{
				$this->error('删除失败');
			}
	}
}