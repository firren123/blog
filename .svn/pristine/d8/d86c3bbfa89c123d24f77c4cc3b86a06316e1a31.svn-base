<?php
	/**
	 * 	RBAC用户权限管理类
	 +
	 *	2013-10-12
	 +
	 *	lichenjun
	 */
class RbacAction extends CommonAction
{
	/**
	 * 	角色管理方法
	 +
	 *	2013-10-12
	 +
	 *	lichenjun
	 */
	/**
	 * 添加角色
	 */
	function addrole()
	{
		if (IS_POST) {
			$data['pid'] = I('pid');
			$data['name'] = I('name');
			$data['remark'] = I('remark');
			$data['status'] = I('status');
			if (D('role')->add($data)) {
				$this->success('添加成功',U('Admin/Rbac/listrole'));
			}else{
				$this->error('添加失败！');
			}
		}else{
			$this->display();
		}
	}
	/**
	 * 角色列表
	 */
	function listrole()
	{
		import('ORG.Util.Page');
		$count = D('role')->count();
		$p = new Page($count,20);
		$list = D('role')->limit($p->fristRow,$p->listRow)->select();
		$this->assign('page',$p->show());
		$this->assign('list',$list)->display();
	}
	/**
	 * 角色删除
	 */
	function delrole()
	{
		$id = I('id','','intval');
		if (D('role')->delete($id)) {
			$this->success('删除成功！');
		}else{
			$this->error('删除失败！');
		}
	}
	/**
	 * 角色修改
	 */
	function editrole(){
		if (IS_POST) {
			if (D('role')->save(I('post.'))) {
				$this->success('修改成功！',U('Admin/Rbac/listrole'));
			}else{
				$this->error('修改失败！');
			}
		}else{
			$id = I('id','','intval');
			$list = D('role')->find($id);
			$this->assign('list',$list)->display('addrole');
		}
		
	}
	/**
	 * 	节点管理方法
	 +
	 *	2013-10-12
	 +
	 *	lichenjun
	 */
	 /**
	  * 添加节点
	  */
	 function addnode(){
	 	if (IS_POST) {
	 		if (D('node')->add($_POST)) {
	 			$this->success('添加节点成功',U('Admin/Rbac/listnode'));
	 		}else{
	 			$this->error('添加失败');
	 		}
	 	}else{
	 		$this->pid = I('pid',0,'intval');
	 		$this->level = I('level',1,'intval');
	 		$list=array(
	 				'pid'=>I('pid',0,'intval'),
	 				'level' =>   I('level',1,'intval'),
	 				'status'=>1,
	 				'sort'	=>100
	 			);
	 		$this->assign('list',$list);
	 		switch ($this->level) {
	 			case 1:
	 				$this->type = '应用';
	 				break;
	 			case 2:
	 				$this->type = '控制器';
	 				break;
	 			case 3:
	 				$this->type = '动作方法';
	 				break;
	 		}
	 		$this->display();
	 	}
	 }
	 /**
	  * 节点列表
	  */
	 function listnode(){
	 	$list = D('node')->select();
	 	$node = node_merge($list);
	 	$this->assign('list',$node);
	 	$this->display();
	 }
	 /**
	  * 节点删除
	  */
	 function delnode(){
	 	$id =I('id');
	 	if (D('node')->delete($id)) {
	 		$this->success('删除节点成功');
	 	}else{
	 		$this->error('删除节点失败');
	 	}
	 }
	 /**
	  * 节点修改
	  */
	 function editnode(){
	 	if (IS_POST) {
	 		if (D('node')->save(I('post.'))) {
	 			$this->success('修改节点成功',U('Admin/Rbac/listnode'));
	 		}else{
	 			$this->error('修改节点失败');
	 		}
	 	}else{
	 		$this->list=D('node')->find(I('id'));

	 		$this->display('addnode');
	 	}

	 }
	/**
	 * 	权限管理方法
	 +
	 *	2013-10-13
	 +
	 *	lichenjun
	 */
	 /**
	  * 查看权限
	  */
	 function access(){
	 	$rid = I('id',0,'intval');
	 	$field = array('id','name','title','pid');
	 	$list = D('node')->field($field)->select();
	 	$access = D('access')->where(array('role_id'=>$rid))->getField('node_id',true);
	 	$node = node_merge($list,$access);
	 	$this->rid = $rid;
	 	$this->assign('list',$node);
	 	$this->display();
	 }
	 /**
	  * 设置权限
	  */
	 function setAccess(){
	 	$rid = I('rid');
	 	D('access')->where(array('role_id'=>$rid))->delete();
	 	$arr = array();
	 	foreach ($_POST['access'] as $k => $v) {
	 		$tmp = explode('_', $v);
	 		$arr[] = array(
	 			'role_id'=>$rid,
	 			'node_id'=>$tmp[0],
	 			'level'=>$tmp[1]
	 		);
	 	}
	 	if (D('access')->addAll($arr)) {
	 		$this->success('保存修改成功',U('Admin/Rbac/listrole'));
	 	}else{
	 		$this->error('保存修改失败');
	 	}
	 }
	/**
	 * 	用户管理方法
	 +
	 *	2013-10-13
	 +
	 *	lichenjun
	 */
	 /**
	  * 用户列表
	  */
	 function listuser(){
	 	import('ORG.Util.Page');
	 	$count = D('user')->count();
	 	$p = new Page($count,20);
	 	$limit = "$p->fristRow,$p->listRow";
	 	$list = D('UserRelation')->field('password',true)->relation(true)->select();
	 	$this->page = $p->show();
	 	$this->list = $list;
	 	$this->display();
	 }
	 /**
	  * 用户添加
	  */
	 function adduser(){
	 	if (IS_POST) {
	 		$data = array(
	 		'username' => I('username'),
	 		'password' => I('password','','mad5'),
	 		'status' => I('status'),
	 		'last_login_ip' => get_client_ip()
	 		);
	 		$node = array();
	 		if ($uid = D('user')->add($data)) {
		 		foreach ($_POST['role_id'] as $v) {
					$node[] = array(
							'user_id'=>$uid,
							'role_id'=>$v
						);
			 	}
			 	D('role_user')->addAll($node);
			 	$this->success('添加成功',U('Admin/Rbac/listuser'));
	 		}
	 		echo D('user')->getLastSql();
	 		exit;
	 		$this->error('添加失败');
	 		
	 	}else{
	 		$this->role = D('role')->select();
	 		$this->title = '添加用户';
	 		$this->display();
	 	}
	 }
	 /**
	  * 用户修改
	  */
	 function edituser(){
	 	if (IS_POST) {
	 		$password =I('possword');
	 		if (empty($password)) {
	 			unset($_POST['possword']);
	 		}
	 		$_POST['possword'] =I('possword','','md5');
	 		$ret =D('user')->save($_POST);
	 		if (false!==$ret) {
	 			D('role_user')->where("user_id = $_POST[id]")->delete();
	 			foreach ($_POST['role_id'] as $v) {
					$node[] = array(
							'user_id'=>$_POST['id'],
							'role_id'=>$v
						);
			 	}
			 	D('role_user')->addAll($node);
	 			$this->success('修改成功',U('Admin/Rbac/listuser'));
	 		}else{
	 			$this->error('修改失败');
	 		}
	 	}else{
		 	$uid = I('id',0,'intval');
		 	$role = D('role')->select();
		 	$role_id = D('role_user')->where(array('user_id'=>$uid))->getField('role_id',true);
		 	foreach ($role as $k => &$v) {
		 		$v['ch'] =in_array($v['id'], $role_id)?1:0;
		 	}
		 	$this->role = $role;
	 		$this->title = '添加用户';
		 	$this->list = D('user')->find($uid);
		 	$this->display('adduser');
	 	}

	 }
	 /**
	  * 用户删除
	  */
	 function deluser(){
	 	$uid = I('id',0,'intval');
	 	if (D('user')->delete($uid)) {
	 		$this->success('删除成功',U('Admin/Rbac/listuser'));
	 	}else{
	 		$this->error('删除失败');
	 	}
	 }
}