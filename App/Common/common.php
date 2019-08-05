<?php
//打印函数
function p($arr){
	echo '<pre>'.print_r($arr,true).'</pre>';
}
// 获取当前等级
function level($id){
	return D('Level')->where(array('level_id'=>$id))->getField('level_name');
	// return '123';
}
// 获取用户姓名
function getUsername($uid){
	if (!$uid) {
		return '游客';
	}
	return D('Member')->where(array('member_id'=>$uid))->getField('member_name');
}
// 获取管理员用户姓名
function getAdminName($uid){
	return D('user')->where(array('id'=>$uid))->getField('username');
}
// 获取标题
function getTitle($id){
	return D('Content')->where(array('id'=>$id))->getField('title');
}
// 获取头像
function getPic($uid){
	if (!$uid) {
		return false;
	}
	return D('Member')->where(array('member_id'=>$uid))->getField('top_pic');
}
function getStatus($status){
	if ($status==1) {
		return '不显示';
	}else{
		return '显示';
	}
}
/**
 * 失败返回的pack数据
 * @author linxinliang@lashou-inc.com
 * @param $code String error code
 * @param $msg String error info
 * @create_time 2014-10-16 14:20:00
 * @param String Json Data
 */
function errorReturn($msg='',$code=0){
	$_r['code'] = "{$code}";
	$_r['msg'] = empty($msg) ? 'error' : $msg ;
	$_r['data'] = array();
	file_put_contents('/tmp/livedeal_api_error.log', "请求时间：".date('Y-m-d H:i:s')."| 请求参数：".var_export($_r, TRUE)."\n", FILE_APPEND);
	
	die(msgpack_pack($_r));
}
/**
 * 成功返回的pack数据
 * @author linxinliang@lashou-inc.com
 * @param $msg String info
 * @param $data Array 
 * @create_time 2014-10-16 14:20:00
 * @param String Json Data
 */
function successReturn($data=array(),$msg=''){
	$_r['code'] = "200";
	$_r['msg'] = empty($msg) ? 'success' : $msg ;
	$_r['data'] = empty($data) ? array() : $data;
	file_put_contents('/tmp/livedeal_api_success.log', "请求时间：".date('Y-m-d H:i:s')."| 请求参数：".var_export($_r, TRUE)."\n", FILE_APPEND);
	die(msgpack_pack($_r));
}

function isMobile($phone='') {
	if(preg_match("/^1[0-9]{10}$/",$phone))
		return TRUE;
	return FALSE;
}
