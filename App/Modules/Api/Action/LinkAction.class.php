<?php
/**
* 友情链接控制器
*/
class LinkAction extends CommonAction
{
	//友情链接列表
	function index()
	{
		import('ORG.Util.Page');
		$count = D('link')->count();
		$p = new Page($count,10);
		$limit = $p->firstRow.','.$p->listRows;
		$this->list = D('link')->order('sort')->limit($limit)->select();
		$this->page = $p->show();
		import('@.GROUP_NAME.Action.DefineBaseAction');
		$this->link_status = DefineBaseAction::$link_status;
		$this->display();
	}
	//友情添加
	function add_link(){
		if (IS_POST) {
			$data = I('post.');
			if (D('link')->add($data)) {
				$this->success('添加友情链接成功！',U(GROUP_NAME .'/Link/index'));
			}else{
				$this->error('添加失败，请从新添加');
			}
		}else{
			$this->display();
		}
	}
	//友情修改
	function edit_link(){
		if (IS_POST) {
			$data = I('post.');
			if (D('link')->save($data)) {
				$this->success('修改友情链接成功！',U(GROUP_NAME .'/Link/index'));
			}else{
				$this->error('修改失败，请从新添加');
			}
		}else{
			$id = I('id',0,'intval');
			$this->title = '修改友情链接';
			$this->list = D('link')->find($id);
			$this->display('add_link');
		}
	}
	//友情链接删除
	function del_link(){
		$id = I('id',0,'intval');
		if (D('link')->delete($id)) {
			$this->success('删除友情链接成功！',U(GROUP_NAME.'/Link/index'));
			}else{
				$this->error('删除失败，请从新添加');
		}
	}
}