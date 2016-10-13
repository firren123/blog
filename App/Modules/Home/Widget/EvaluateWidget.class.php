<?php
class EvaluateWidget extends Widget
{
	public function render($data){
		$id = I('id');
		$where = array(array('target_uid'=>$id,'target_id'=>0,'status'=>0));
		$content['evaluate'] = D('evaluate')->where($where)->limit('0,5')->select();
		return $this->renderFile('evaluate',$content); 

	}
}