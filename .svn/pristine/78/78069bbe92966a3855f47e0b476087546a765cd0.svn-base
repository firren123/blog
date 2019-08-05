<?php

class CateWidget extends Widget{
	public function render($data){
		$content['title']=$data['title'];
		$field = array('id','title','click');
		$content['cate'] = D('content')->field($field)->order("$data[order]")->limit($data['limit'])->select();
		return $this->renderFile('cate',$content);
	}
}