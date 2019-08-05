<?php
/**
* 会员权限控制器
*/
class CommonAction extends Action
{
	
	function _initialize()
	{
		if (!isset($_SESSION['memberid'])) {
			$this->redirect('/Member/Login/index');  //Member/Login/index.html
		}
		
	}
	
}