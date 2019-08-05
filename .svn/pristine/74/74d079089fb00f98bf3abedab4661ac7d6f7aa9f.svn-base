<?php
/**
* 评论
*/
class MessageWidget extends Widget
{
	public function render($data){
		$field = array('name','link');
		$content['link'] = D('link')->field($field)->order("sort")->select();
		return $this->renderFile('link',$content);
	}
}