<?php
/**
* 友情链接
*/
class LinkWidget extends Widget
{
	public function render($data){
		$field = array('name','link');
		$content['link'] = D('link')->field($field)->order("sort")->select();
		return $this->renderFile('link',$content);
	}
}