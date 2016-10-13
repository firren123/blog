<?php
/**
	
*/
class JsonAction extends Action{
	function index(){
		// $file=readfile("./Data/data.txt","r");
		// $file=file_get_contents("./Data/data.txt","r");
		
		// $str=iconv("GBK","UTF-8",$file); 
		// $a = json_decode($str);
		// dump($str);
		// // $b =json_decode($a);
		// // echo $b;
		// dump($a);
		$data=urldecode(file_get_contents("./Data/data2.txt","r"));
		$str = iconv("GBK", "utf-8//ignore",$data);//若文件原本是utf-8格式,无需转换	
		$arr2=json_decode($str,true);
		dump($arr2['results'][0]);
		preg_replace('/,\s*([\]}])/m', '$1', $str);
		$arr=json_decode($str,true);
		dump($arr['results'][0]);
	}
	function json(){
		$data=urldecode(file_get_contents("./Data/data2.txt","r"));
		$str = iconv("GBK", "utf-8//ignore",$data);//若文件原本是utf-8格式,无需转换	
		preg_replace('/,\s*([\]}])/m', '$1', $str);
		$arr=json_decode($str,true);
		dump($arr);

	}
}

?>