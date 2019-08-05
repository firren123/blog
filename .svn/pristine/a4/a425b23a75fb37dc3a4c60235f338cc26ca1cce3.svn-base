<?php //
//	//www.hdphp.com 向军
//	define('APP_NAME','home');//应用名
//	define('APP_PATH','/hd/');
//	define('COMPILE',true);//是否生成核心编译文件
//	include './hd/hdphp/hdphp.php'; //HD框架核心包
//?>

<?php
$rows = array('name0'=>'0','name1'=>'1','name2'=>'2','name3'=>'3','name4'=>'4','name5'=>'5','name6'=>'6','name7'=>'7','name8'=>'8','name9'=>'9');
$p=array('name123'=>'123');
array_splice($rows, 1, 0, $p);

print_r($rows);
echo table($rows);
function table($array){

	$str="<table width='700' border='1'>";
	$str.="<tr>";
	foreach ($array as $key => $value) {
		if($key=='name7') {
			$str .= "<th>456</th>";
		}else{
			$str.="<th>".$key."</th>";
		}
	}
	$str.="</tr>";
	$str1.="<tr>";
	foreach ($array as $key => $value) {
		if($key=='name3') {
			$str2.="";
		}else {
			$str2.="<td>".$value."</td>";
		}
	}
	$str1.=$str2."</tr>";
	$str.=$str1."</table>";
	return $str;
}

echo table2($rows);
function table2($arr){
	$str = '';
	$str1 = '';
	$str2 ='';
	$str = "<table width='700' border='1'>";
	$str.="<tr>";
	foreach($arr as $key =>$value){
		if($value == '7'){
			$str.="<th>456</th>";    //这部是把 name7=7 替换成name7=456
		}else{
			$str.="<th>".$key."</th>";
		}
	}
	$str.="</tr>";
	$str1.="<tr>";
	foreach($arr as $key =>$value){

			$str1.="<th>".$value."</th>";
//		}
	}
	$str1.="</tr>";
	$str.=$str1."</table>";
	return $str;

}
echo intval('name7');

//if(0 =='namee7'){
//	echo 1;
//}else{
//	echo 2;
//}
?>