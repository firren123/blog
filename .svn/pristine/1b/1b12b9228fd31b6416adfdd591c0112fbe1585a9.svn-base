<?php
/**
*  用户管理控制器
*/
class UserAction extends CommonAction
{
	//用户信息
	function index()
	{
		$id = $_SESSION[C('USER_AUTH_KEY')];
		$this->list = D('user')->find($id);
		$this->title = '用户信息';
		$this->display();
	}
	//用户修改
	function edit(){
		$id  =  $_SESSION[C('USER_AUTH_KEY')];
        $oldpassword=I('oldpassword');
        $password     =I('password');
        $repassword    =I('rpassword');
     	$email = I('email');
        $phone = I('phone');
        $User=D('user')->find($id);
        if(''!= $password) {
            if(strlen($password)!=strlen(trim($password))) {
                $this->error( '密码前后不能有空格！');
            }
            if(strlen(trim($password))<5) {
                $this->error( '密码长度不能小于5位！');
            }
            if($password!=$repassword){
                $this->error('两次密码不一致！');
            }
            if($User['password'] != md5($oldpassword)){
                $this->error('原密码不正确！');
            }
            if($User['password']==md5($password)){
                $this->error('新密码与原密码相同！');
            }
            $data['password']    =    md5($password);
        }
        if(strlen($phone) != 11){
            $this->error('手机号码位数不对！');
        }
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        	$this->error('邮箱输入错误！');
        }
        $data['email'] = $email;
        $data['phone']  = $phone;
        $data['id']= $id;
        $result    =    D('user')->save($data);
        if(false !== $result) {
            $this->success("资料修改成功");
        }else {
            $this->error('重置资料失败！');
        }
	}

}

?>