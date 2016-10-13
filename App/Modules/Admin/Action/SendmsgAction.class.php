<?php
header('Content-type:text/html;charset=utf8');
class SendmsgAction extends Action{

	function index(){
		echo 'send msg ';
		
	}
	/**
	*post请求http; 
	*$remote_server：远程地址，
	*$post_string：post参数
	*/
	function postRequest($remote_server,$post_string){
		$context = array(
			'http'=>array(
			'method'=>'POST',
			'header'=>'Content-type: application/x-www-form-urlencoded'."\r\n".
			'User-Agent : Jimmy\'s POST Example beta'."\r\n".
			'Content-length: '.strlen($post_string)+8,
			'content'=>$post_string)
		);
		$stream_context = stream_context_create($context);
		$data = file_get_contents($remote_server,FALSE,$stream_context);
		return $data;
	}

	/**
	 *发送短信
	 *@param string $url 服务器地址
	 *@param string $ececcid 接入账户，非空
	 *@param string $password 接入密码，非空。
	 *@param string $msisdn 接收号码，多个用逗号隔开，非空。
	 *@param string $smscontent 短信内容，非空。长度不能超过500字符
	 *@param int $msgtype=5 短信类型，默认值为5。
	 *@param int $longcode="" 扩展码，可为空。
	 *登录账号：101003001
	 *登录密码：zgfpjj
	 */
	function SendSMS_HTTP($url,$ececcid,$password,$msisdn,$smscontent,$msgtype=5,$longcode=""){
		$post_string="ececcid=$ececcid&password=$password&msisdn=$msisdn&smscontent=$smscontent&msgtype=$msgtype&longcode=$longcode";		
		return $this->postRequest($url,$post_string);
	}
	function send(){
		$result=$this->SendSMS_HTTP("http://pi.noc.cn/SendSMS.aspx","101003001","zgfpjj","15810325342,15001316083,15698041861","孙立军，这是测试信息，收到请回复！","5","11");
		print_r("发送短信结果：".$result);
	}
	
}