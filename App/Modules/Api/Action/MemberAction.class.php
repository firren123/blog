<?php
//会员等级管理类
class MemberAction extends CommonAction {
	function index() {
		$this->the_sname();
	}
	function add() {
		if (IS_POST) {
			$ret = D('Member')->create();
			if ($ret) {
				D('Member')->add();
				$this->success('添加成功');
			}else{
				$error = D('Member')->getError();
				$this->error($error);
			}
		}else{
			$level = M ( "level" );
			$row = $level->select();
			$this->assign ( "row", $row );
			$this->display ();			
		}
	}

	function del() {
		$n = M ( "member" );
		if ($n->where ( $_GET ['member_id'] )->del ()) {
			$this->success ( '删除成功' );
		} else {
			$this->error ( '删除失败！' );
		}
	}
	function update() {
		$level = M ( "level" );
		$row = $level->select ();
		$this->assign ( "row", $row );
		$n = M ( "member" );
		$arr = $n->find ( $_GET ['member_id'] );
		
		$this->assign ( 'list', $arr );
		$this->display ();
	}
	function updateApi() {
		$n = M ( "member" );
		if ($n->save ()) {
			$this->success ( '修改成功' );
		} else {
			$this->error ( '修改失败！' );
		}
	}
	function state1() {
		$n = M ( "member" );
		$member = $_GET ['member_id'];
		if (isset ( $_GET ['member_id'] ) && ! empty ( $_GET ['member_id'] )) {
			$_POST = array ('member_id' => $_GET ['member_id'], 'member_state' => 1 );
			if ($n->update ()) {
				$this->success ( '修改成功' );
			} else {
				$this->error ( '修改失败！' );
			}
		} else {
			$this->error ( '警告：非法操作' );
		}
	}
	function state0() {
		$n = M ( "member" );
		if (isset ( $_GET ['member_id'] ) && ! empty ( $_GET ['member_id'] )) {
			$_POST = array ('member_id' => $_GET ['member_id'], 'member_state' => 0 );
			if ($n->update ()) {
				$this->success ( '修改成功' );
			} else {
				$this->error ( '修改失败！' );
			}
		} else {
			$this->error ( '警告：非法操作' );
		}
	}
	/*
	 * 显示各组会员信息
	 */
	function level() {
		$this->the_sname();
	}
	function the_sname(){
		import('ORG.Util.Page');
		$n = M ( "member" );
		$total = $n->where($where)->count ();
		$page = new Page ( $total,20 );
		
		$limit = "$page->firstRow,$page->listRows";
		$arr = $n->where($where)->order("member_id desc")->limit($limit)->select();//执行查询
		
		if ($arr) {
			foreach ( $arr as $k => $v ) {
				if ($v ['member_sex'] == 1) {
					$arr [$k] ['sex'] = '男';
				}
				if ($v ['member_sex'] == 0) {
					$arr [$k] ['sex'] = '女';
				}
				if ($v ['level_id']) {
					$arr [$k] ['member_level'] =$v ['level_name'];
				} else {
					$arr [$k] ['member_level'] = '未定义分组';
				}
				if ($v ['member_state'] == 1) {
					$arr [$k] ['member_state'] = '启用';
				}
				if ($v ['member_state'] == 0) {
					$arr [$k] ['member_state'] = '禁止';
				}
				// $arr [$k]['level'] = level($v['level']);
			}
		}
		
		$this->assign ( 'page', $page->show () );
		$this->assign ( 'list', $arr );
		$this->display ("index");
	}
	

}