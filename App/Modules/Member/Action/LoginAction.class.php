<?php
/**
* 会员首页
*/
class LoginAction extends Action
{
	
	function index()
	{
		$this->display();
	}
		/**
	 * 登录提交方法
	 */
	function loginDo(){
		$username = I('username');
		$password = I('password');
		$code = I('verify','','md5');
		if ($code!= session('verify')) {
			$this->error('验证码错误！');
		}
		$member = D('Member')->where(array('member_name'=>$username))->find();
		if (!isset($member) || $member['member_password'] != $password) {
			$this->error('用户名账号或者密码错误');
		}
		session('memberid',$member['member_id']);
		session('membername',$member['member_name']);
		
		session('last_login_ip',$member['last_ip']);
		$arr = array(
				'last_login_ip'=>get_client_ip(),
				'last_login_time'=>date('Y-m-d H:i:s',$member['last_time']),
				'id'=>$member['id']
			);
		D('Member')->save($arr);
		$this->success('登陆成功',U('/'));
	}
	/**
	 * 登出方法
	 */
	function logout(){
		session_unset();
		session_destroy();
		$this->success('登出成功',U('/Member/Login/index'));
	}
	/**
	 * 注册
	 */
	function reg(){
		$this->display();
	}
	/**
	 * 注册提交地址
	 */
	function regDo(){
		$Member = D("Member"); 
		$username = I('username');
		$password = I('password');
		$rpassword = I('rpassword');
		$email = I('email');
		$code = I('verify','','md5');
		if (empty($username)) {
			$this->error('账号不能为空');
		}
		if ($code!= session('verify')) {
			$this->error('验证码错误！');
		}
		if ($password != $rpassword) {
			$this->error('两次密码不一致');
		}
		$a = $Member->check($email,'email'); 
		if (!$a) {
			$this->error('邮箱不正确');
		}
		
		$ret = $Member->where(array('member_name'=>$username))->find();
		if ($ret) {
			$this->error('账号已经存在');
		}
		$ret = $Member->where(array('member_email'=>$email))->find();
		if ($ret) {
			$this->error('邮箱已经存在');
		}
		$data = array();
		$data['member_name'] = $username;
		$data['member_password'] = $password;
		$data['member_email'] = $email;
		$add = D('member')->add($data);
		if ($add) {
			D('Member')->add();
			$this->success('注册成功！',U('/Member/Login/index'));
		}else{
			$this->error('注册失败');
		}
	}
	/**
	 * 验证码
	 */
	function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(4,1);
	}

}