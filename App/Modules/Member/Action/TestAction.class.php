<?php
/**
* 测试类
*/
class TestAction extends Action
{
	
	function index()
	{
		$arr = array(1,2,3,4,5,6);
		p($arr);
		// dump($arr);
		$this->display();

	}
}