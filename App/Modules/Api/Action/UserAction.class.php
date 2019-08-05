<?php
/**
*  用户管理控制器
*/
class UserAction extends CommonAction
{
	//用户信息
	function index()
	{
		$id = I("uid",0);
		$list = D('user')->find($id);
		successReturn($list);
	}
	//用户修改
	function edit(){
		$id  =  I("uid",0);
        $oldpassword=I('oldpassword');
        $password     =I('password');
        $repassword    =I('rpassword');
     	$email = I('email');
        $phone = I('phone');
        $content = I('content');
        $realname = I('realname');
        $User=D('user')->find($id);
        if(''!= $password) {
            if(strlen($password)!=strlen(trim($password))) {
                errorReturn( '密码前后不能有空格！');
            }
            if(strlen(trim($password))<5) {
                errorReturn( '密码长度不能小于5位！');
            }
            if($password!=$repassword){
                errorReturn('两次密码不一致！');
            }
            if($User['password'] != md5($oldpassword)){
                errorReturn('原密码不正确！');
            }
            if($User['password']==md5($password)){
                errorReturn('新密码与原密码相同！');
            }
            $data['password']    =    md5($password);
        }
        if(strlen($phone) != 11){
            errorReturn('手机号码位数不对！');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        	errorReturn('邮箱输入错误！');
        }
        $data['email'] = $email;
        $data['phone']  = $phone;
        $data['content']  = $content;
        $data['realname']  = $realname;
        $data['id']= $id;
        $result    =    D('user')->save($data);
        file_put_contents("/tmp/login.log", D('user')->getLastSql()."\r\n",FILE_APPEND);
        if(false !== $result) {
            successReturn('',"资料修改成功");
        }else {
            successReturn('重置资料失败！');
        }
	}

}

?>