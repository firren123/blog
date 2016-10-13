<?php
/**
*  用户登录管理控制器
+
*	2013-10-12
+
*	lichenjun
+
*/
class LoginAction extends CommonAction
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
		$user = D('user')->where(array('username'=>$username))->find();
		file_put_contents("/tmp/login.log", "user数据|".json_encode($user)."\r\n",FILE_APPEND);
		file_put_contents("/tmp/login.log", "==================".D("user")->getLastSql()."==========\r\n",FILE_APPEND);
		
		if (!isset($user) || $user['password'] != $password) {
			die(errorReturn('用户名账号或者密码错误'));
		}
		
		$time = time();
		$token = md5($user['username'].$time.$user['id']);
		$arr = array(
				'last_login_ip'=>get_client_ip(),
				'last_login_time'=>date('Y-m-d H:i:s',$user['last_login_time']),
				'id'=>$user['id'],
				'token'=>$token
			);
		D('user')->save($arr);
		$user2 = D('user')->where(array('username'=>$username))->find();
		die(successReturn($user2));
	}

	/**
	 * 验证码
	 */
	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1);
	}
}