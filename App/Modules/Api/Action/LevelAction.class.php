<?php
class LevelAction extends CommonAction{
	function index(){
		import("ORG.Util.Page");
		$count = D('Level')->count();
		$p = new Page($count);
		$limit = $p->firstRow.','.$p->listRows;
		$this->list = D('Level')->order('level_sum desc')->limit($limit)->select();
		$this->page = $p->show();
		$this->display();
	}
	function add(){
		if (IS_POST) {
			$level = D('Level')->create();
			if ($level) {
				D('Level')->add();
				$this->success('添加成功！');
			}else{
				$error = D('Level')->getError();
				$this->error($error);
			}

		}else{
			$this->display();
		}
	}
	function edit(){
		if (IS_POST) {
			$level = D('Level')->create();
			if ($level) {
				D('Level')->save();
				$this->success('修改成功');
			}else{
				$error = D('Level')->getError();
				$this->error($error);
			}
		}else{
			$level_id = I('id');
			$this->list = D('Level')->find($level_id);
			$this->display('add');
		}
	}
	
}