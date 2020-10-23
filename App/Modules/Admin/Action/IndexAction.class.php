<?php
class IndexAction extends CommonAction{
	function index(){
		$this->display();
	}
	function send(){
		$this->display();
	}
	function test(){
		import('Class.Test',APP_NAME);
		Test::ceshi();
	}
	function welcome(){
		import('Class.getIp',APP_NAME);
		//登录者信息
		$gifo = new getIp();
		$user['ip'] = array('IP:',$gifo->real_ip());
		$ipadds = $gifo->Getaddress();
		$user['ipadd'] =array('IP物理地址:',@implode('-', $ipadds));
		$user['Browser'] =array('浏览器：',$gifo->GetBrowser());
		$user['language'] =array('语言:', $gifo->GetLang());
		$user['system'] = array('操作系统:', $gifo->GetOs());
		$data['user'] = $user;
		//服务器信息
		$sys['software'] = array('服务器环境',$_SERVER['SERVER_SOFTWARE']);
		$sys['ip'] = array('IP：',$_SERVER['SERVER_ADDR']);
		$sys['email'] = array('邮箱：','firren@163.com');
		$sys['host'] = array('网站域名：',$_SERVER['SERVER_NAME']);
		$sys['port'] = array('端口：',$_SERVER['SERVER_PORT']);
		$data['sys'] = $sys;
  		$this->data = $data;
//        echo json_encode($_SERVER);exit;
		$this->display();
	}
}