<?php	
/**
* 留言板控制器
*/
class MessageAction extends CommonAction
{
	//显示留言
	function index()
	{
		import('ORG.Util.Page');
		$count = D('evaluate')->count();
		$p = new Page($count,10);
		$limit = $p->firstRow.','.$p->listRows;
		$this->list = D('evaluate')->order('id')->limit($limit)->select();
		$this->page = $p->show();
		$this->display();
	}
	//留言添加
	function reply_msg(){
		if (IS_POST) {
			$data = I('post.');
			$data['add_time'] = date('Y-m-d H:i:s');
			$data['uid'] = $_SESSION['uid'];
			if (D('evaluate')->add($data)) {
				$this->success('回复成功！',U(GROUP_NAME .'/Message/index'));
			}else{
				$this->error('回复失败');
			}
		}else{
			$id = I('id',0,'intval');
			$this->title = '修改留言链接';
			$message = D('evaluate')->find($id);
			$reply = D('evaluate')->where(array('target_id'=>$id))->find();
			$this->assign('message',$message);
			$this->assign('reply',$reply);
			$this->display();
		}
	}
	//留言修改
	function look_msg(){
		$id = I('id',0,'intval');
		$this->title = '修改留言链接';
		$message = D('evaluate')->find($id);
		$reply = D('evaluate')->where(array('target_id'=>$id))->find();
		$this->assign('message',$message);
		$this->assign('reply',$reply);
		$this->display();
	}
	//留言链接删除
	function del_msg(){
		$id = I('id',0,'intval');
		if (D('evaluate')->delete($id)) {
			$this->success('删除留言成功！',U(GROUP_NAME.'/Message/index'));
			}else{
				$this->error('删除失败');
		}
	}
}