<?php

/**
* 自定义标签库
*/
import("TagLib");
class TagLibLj extends TagLib
{
	// Portected $tags = array(
	// 		// 标签定义： attr 属性列表 close 是否闭合（0 或者1 默认1） alias 标签别名 level 嵌套层次
	// 		'nav' =>array('attr' =>'sort,limit','close'=>1)
	// 	);
	protected $tags = array(
			'nav' => array('attr'=>'limit,sort','close'=>1)
		);

	function _nav($attr,$content){
		$attr = $this->parseXmlAttr($attr,'nav');
		$str =<<<str
		<?php
		\$cate = M('cate')->order("{$attr['sort']}")->where(array('is_show'=>1))->limit({$attr['limit']})->select();
		import('Class.Category',APP_NAME);
		\$cates = Category::unlimitedForLayer(\$cate);
		foreach (\$cates as \$v) :
		?>
str;
		$str.=$content;
		$str.='<?php endforeach ?>';
		return $str;
	}

}