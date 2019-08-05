<?php
/**
* 	属性控制器
*	time:2013-10-20
*/
class AttributeAction extends CommonAction
{
	//默认列表页
	function index()
	{
		import('ORG.Util.Page');
		$count = D('attr')->count();
		$p = new Page($count,10);
		$limit = "$p->firstRow,$p->listRows";
		$this->attr = D('attr')->limit($limit)->select();
		$this->page = $p->show();
		$this->display();
	}
	//添加
	public function add_attr()
	{
		if (IS_POST) {
			$data = I('post.');
			if (D('attr')->add($data)) {
				$this->success('添加成功',U(GROUP_NAME .'/Attribute/index'));
			}else{
				$this->error('添加失败');
			}
		}else{
			$this->display();
		}
	}
	//修改
	public function edit_attr(){
		if (IS_POST) {
			$data = I('post.');
			if (D('attr')->save($data)) {
				$this->success('修改成功',U(GROUP_NAME .'/Attribute/index'));
			}else{
				$this->error('修改失败');
			}
		}else{
			$id = I('id',0,'intval');
			$this->attr = D('attr')->find($id);
			$this->display('add_attr');
		}
	}
	//删除
	public function del_attr(){
		$id = I('id',0,'intval');
		if (D('attr')->delete($id)) {
			$this->success('删除成功',U(GROUP_NAME .'/Attribute/index'));
		}else{
			$this->error('删除失败');
		}
	}
}