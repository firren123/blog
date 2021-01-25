<?php
/**
* 友情链接
*/
class NextWidget extends Widget
{
	public function render($data){
	    $content['title'] = $data['title'];
		$field = array('title','id');
		if($data['en'] == 'lt'){
		    $where = 'id < '.$data['where'];
        }else{
            $where = 'id > '.$data['where'];

        }
		$content['content'] = D('content')->field($field)->where($where)->order($data['order'])->limit(1)->select();
		return $this->renderFile('next',$content);
	}
}