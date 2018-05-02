<?php
/**
* 内容添加控制器
*/
class BlogAction extends CommonAction
{
	//内容列表
	function index()
	{
        echo 33333;exit;
		import('ORG.Util.Page');
		$count = D('content')->count();
		$p = new Page($count ,10);
		$limit = "$p->firstRow,$p->listRows";
		$field = "id,title,cate_id,add_time,summary,click";
		$content = D('content')->field($field)->limit($limit)->order("add_time desc")->select();
		$this->page = $p->show();
		successReturn($content);
	}
	//添加内容
	public function add_blog(){
		if (IS_POST) {
			$data = $_POST;
			$data['add_time'] = time();
			if ($id = D('content')->add($data)) {
				$attr = $_POST['attr_id'];
				$arr = array();
				foreach ($attr as $v) {
					$arr[] = array(
							'cid'=>$id,
							'attr_id'=>$v
						);
				}
				D('attr_content')->addAll($arr);
				$this->success('添加成功',U(GROUP_NAME .'/Blog/index'));
			}else{
				$this->error('添加失败');
			}
		}else{
			import('Class.Category',APP_NAME);
			$cate = D('cate')->order('sort')->select();
			$this->cate = Category::unlimitedForLevel($cate,'|---');
			$this->attr = D('attr')->select();
			$this->display();
		}
	}
	//修改内容
	public function edit_blog(){
		if (IS_POST) {
			$data = $_POST;
			if (false === D('content')->save($data)) {
				$this->error('修改失败');
			}else{
				D('attr_content')->where(array('cid'=>$data['id']))->delete();
				$attr = $_POST['attr_id'];
				$arr = array();
				foreach ($attr as $v) {
					$arr[] = array(
							'cid'=>$data['id'],
							'attr_id'=>$v
						);
				}
				D('attr_content')->addAll($arr);
				$this->success('修改成功',U(GROUP_NAME .'/Blog/index'));
			}
		}else{
			$id = I('id',0,'intval');
			import('Class.Category',APP_NAME);
			$blog = D('content')->find($id);
			$this->blog = $blog;
			$cate = D('cate')->order('sort')->select();
			$select = array($blog['cate_id']);
			$this->cate = Category::unlimitedForLevel($cate,'|---',$select);
			$attrd = D('attr_content')->where(array('cid'=>$id))->getField('attr_id',true);
			$this->attr = Category::unlimitedForLevel(D('attr')->select(),'',$attrd);
			$this->display('add_blog');
		}
	}
	//回收站
	function trach(){
		$this->content = D('BlogRelation')->getBlog(1);
		$this->display('index');
	}
	//添加回收站
	function toTrach(){
		$id = I('id',0,'intval');
		$status = I('del',0,'intval');
		$data = array('id'=>$id,'status'=>$status);
		$msg = !empty($status)?'删除到回收站':'还原';
		if (D('content')->save($data)) {
			$this->success($msg.'成功');
		}else{
			$this->error($msg.'失败');
		}
	}
	//清除回收站
	function clear_trach(){
		$ids = D('content')->where(array('status'=>1))->getField('id',true);
		$del = D('content')->where(array('status'=>1))->delete();
		if ($del !== false) {
			D('attr_content')->where(array('cid'=>array('in',$ids)))->delete();
			$this->success('清除回收站成功',U(GROUP_NAME .'/Blog/trach'));
		}else{
			$this->error('清除回收站失败');
		}
	}
	//删除内容
	public function del_blog(){
		$id = I('id');
		if (D('content')->delete($id)) {
			D('attr_content')->where(array('cid'=>$data['id']))->delete();
			$this->success('删除成功',U(GROUP_NAME .'/Blog/trach'));
		}else{
			$this->error('删除失败');
		}
	}
	//编辑器上传文件
	function upload(){
		import('ORG.Net.UploadFile');
		$upload = new UploadFile();
		$upload->autoSub = true;
		$upload->subType = 'date';
		$upload->dateFormat = 'Ym';
		if($upload->upload('./Uploads/')){
			$info = $upload->getUploadFileInfo();
			import('ORG.Util.Image');
			Image::water('./Uploads/'.$info[0]['savename'],'./Data/water.png',null,50);
			echo json_encode(array(
				'url'=>$info[0]['savename'],
				'title' => htmlspecialchars($_POST['pictitle'],ENT_QUOTES),
				'original' => $info[0]['name'],
				'state'		=> 'SUCCESS'
			));
		}else{
			echo json_encode(array(
				'state'=>$upload->getErrorMsg()
				));
		}
	}

}