<?php
/**
	
*/
class DetailAction extends Action{
	function index(){
		$id = I('id',0,'intval');
		$blog = D('content')->find($id);
		$cate = D('cate')->select();
		//作者
		$this->author = $blog['author'];
		//摘要
		$this->description = $blog['summary'];
		// 关键字
		$this->keywords = $blog['keywords'];
		$this->blog = $blog;
		import('Class.Category',APP_NAME);
		$this->topCate = Category::getParentsCate($cate,$blog['cate_id']);
		// 评论信息
		import('ORG.Util.Page');
		// 计算共有多少人评论，不算回复
		$where = array('target_uid'=>$id,'target_id'=>0);
		$count = D('evaluate')->where($where)->count();
		$p = new Page($count,5);
		$limit = "$p->firstRow,$p->listRows";
		$message = D('evaluate')->where($where)->limit($limit)->select();
		$page = $p->show();
		$this->assign('page',$page);
		$this->assign('message',$message);
		$this->display('show');
	}
	//点击数
	function clicknum(){
		$id = I('id',0,'intval');

		$where = array('id'=>$id);
		$num = D('content')->where($where)->getField('click');
		D('content')->where($where)->setInc('click');
		echo 'document.write('.$num.')';
	}
	function subMessage(){
		$data = array();
		$data['uid'] = I('uid');
		$data['target_uid'] = I('target_uid');
		$data['content'] = I('content');
		$data['add_time'] = date('Y-m-d H:i:s',time());
		$message = D('evaluate')->add($data);
		if ($message) {
			echo 0;
			exit;
		}else{
			echo 1;
			exit;
		}
	}
	public function bSub(){
		$data = array();
		$data['id'] = I('id');
		$data['support'] = I('support',0,'intval');
		$data['against'] = I('against',0,'intval');
		$ret = D('evaluate')->setInc('support');
		$ret2 = D('evaluate')->setInc('against');
		echo 1;
	}
}


?>