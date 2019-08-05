<?php
/**
* 留言信息模块
*/
class EvaluateAction extends CommonAction
{
	// 留言列表
	function index()
	{
		$this->display();
	}
	// 删除留言
	function del(){

	}
	// 回复留言
	function reply(){
		$this->display();
	}
}