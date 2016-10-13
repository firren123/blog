<?php
/**
*  用户登录管理控制器
+
*	2013-10-12
+
*	lichenjun
+
*/
class LoginAction extends Action
{
	/**
	 * 登录页面
	 */
	function index()
	{
		$this->display('login');
	}
	/**
	 * 登录提交方法
	 */
	function login(){
		$username = I('username');
		$password = I('password','','md5');
		$code = I('code','','md5');
//		if ($code!= session('verify')) {
//			$this->error('验证码错误！');
//		}
		$user = D('user')->where(array('username'=>$username))->find();
		if (!isset($user) || $user['password'] != $password) {
			$this->error('用户名账号或者密码错误');
		}
		session(C('USER_AUTH_KEY'),$user['id']);
		session('username',$user['username']);
		
		session('last_login_ip',$user['last_login_ip']);
		$arr = array(
				'last_login_ip'=>get_client_ip(),
				'last_login_time'=>date('Y-m-d H:i:s',$user['last_login_time']),
				'id'=>$user['id']
			);
		if ($user['username'] == C('RBAC_SUPERADMIN')) {
			session(C('ADMIN_AUTH_KEY'),true);
		}
		import('ORG.Util.RBAC');
		RBAC::saveAccessList();
		D('user')->save($arr);
		$this->success('登陆成功',U('/Admin/Index/index'));
	}
	/**
	 * 登出方法
	 */
	function logout(){
		session_unset();
		session_destroy();
		$this->success('登出成功',U('/Admin/Login/index'));
	}
	/**
	 * 验证码
	 */
	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1);
	}
}