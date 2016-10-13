<?php
/**
 * 递归重组节点信息为多维数组
 */
function node_merge($node,$access=null,$pid=0){
	$arr = array();
	foreach ($node as $key => $value) {
		if (is_array($access)) {
			$value['access'] = in_array($value['id'], $access)?1:0;
		}
		if ($value['pid'] == $pid) {
			$value['child'] = node_merge($node,$access,$value['id']);
			$arr[] = $value;
		}
		
	}
	return $arr;
}

function is_show($is_show){
	if ($is_show == 1) {
		$arr = '显示';
	}else if ($is_show == 0) {
		$arr = '不显示';
	}
	return $arr;
}
// 获取当前等级
// function level($id){
// 	return D('Level')->where(array('level_id'=>$id))->getField('level_name');
// }