<?php
/**
* 分类控制器插件
+
*	time: 2013-10-18
+
*/
class Category
{
	//无限分类   返回 一维数组
	static public function unlimitedForLevel($cate,$html='--',$select=array(), $pid = 0, $level = 0)
	{
		$arr = array();
		foreach ($cate as  $v) {
			if (!empty($select)) {
				$v['select'] = in_array($v['id'], $select)?1:0;
			}
			if ($v['pid'] == $pid) {
				$v['level'] = $level + 1;
				$v['html']=str_repeat($html, $level);
				$arr[] = $v;
				$arr = array_merge($arr,self::unlimitedForLevel($cate,$html,$select,$v['id'],$level + 1));
				
			}
		}
		return $arr;
	}
	//无限分类返回多维数组
	static public function unlimitedForLayer($cate ,$name = 'child', $pid =0)
	{
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v[$name] = self::unlimitedForLayer($cate ,$name, $v['id']);
				$arr[] = $v;
			}
		}
		return $arr;
	}
	//通过子ID来获取所有的父级ID
	static public function getParentsCate($cate ,$id){
		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr[] = $v;
				$arr = array_merge(self::getParentsCate($cate , $v['pid']),$arr);
			}
		}
		return $arr;
	}
	//通过父ID来获取所有子ID
	static public function getChildCateId($cate , $pid)
	{
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v['id'];
				$arr = array_merge($arr,self::getChildCateId($cate , $v['id']));
			}
		}
		return $arr;
	}
	//通过父ID来获取所有子ID的信息
	static public function getChildCate($cate ,$pid)
	{
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v;
				$arr = array_merge($arr,self::getChildCate($cate , $v['id']));
			}
		}
		return $arr;
	}
}