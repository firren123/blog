<?php
/**
* 公共模板 
*/
class CommonAction extends Action
{
	
	function _initialize()
	{
		header('charset=utf-8');
		if (!isset($_SESSION[C('USER_AUTH_KEY')])) {
			$this->redirect('/Admin/Login/index');
		}
		$noAccess = in_array(MODULE_NAME, explode(',',C('NOT_AUTH_MOUDEL'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
		if (C('USER_AUTH_ON') && !$noAccess) {
			import('ORG.Util.RBAC');
			RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');
		}
	}
	
}