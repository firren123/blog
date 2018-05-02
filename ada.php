<?php
/**
 * Created by PhpStorm.
 * User: lichenjun
 * Date: 2017/7/5
 * Time: 下午2:41
 */
//header("Content-Type:text/html; charset=utf8");
header("Content-Type:text/html; charset=gbk");
$file = file_get_contents("city22.json");
echo $file;exit;
var_dump($file);


exit;
require_once "AdaptiveImages/AdaptiveImages.php";
$AdaptiveImages = AdaptiveImages::getInstance();
return $AdaptiveImages->adaptHTMLPart($texte, 780);