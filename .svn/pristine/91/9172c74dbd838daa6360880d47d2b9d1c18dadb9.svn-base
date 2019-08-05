<?php
/**
 * 

 我们的采集办法
 利用土豆的API，得到XML信息
 1：domdocument 

 */
 // 获取最后的参数
/* $url ='http://www.tudou.com/albumplay/Xa-8WcZD3l8/SG8W6kRowQE';
echo basename($url);
$source = file_get_contents($api);
$start = strpos($source, '<html5Url>');
$end   = strpos($source, '</html5Url>');
$noad = substr($source, $start,$end-$start);
*/
/**
 * 
 如何通过PHP的DOM对象来解析XML
 1：要把XML文件读入进来,形成一个XML文档对象<--对应js-->document对象
 2：再通过getElementsByTagName('标签名')得到一组节点<--js-->
 document.getElementsByTagName();
 3:再把2步中，得到一组对象，取得其中某一个,就得到了一个节点
 */
 //1 创建DOM解析对象
 $dom = new DOMdocument('1.0','utf-8');
 /*DOMdocument Object 有什么用？
 答：他可以把你的XML文件加载入内容并解析
 你就可以利用Object分析XML了*/
 // print_r($dom);
 // 2：载入XML文档
 $dom->load('./2.xml');
 // 3:得到title节点列表
 // 分析：title节点有很多，因此得到的是"节点列表对象"
 $ts = $dom->getElementsByTagName('title');
 // print_r($ts);  //DOMNodeList Object ()
/*
 DOMNodeList
 有一个属性：length 代表取得的节点数量
 有一个方法：item(N) 代表取得第N个节点
 */
 /*
echo '我们得到了'.$ts->length.'个书名<br />';
echo '第一个节点是：'；print_r($ts->item(0));
*/
// 天龙八部是一个文本节点，而且是<title></title>的子节点
$title0 = $ts->item(0);
print_r($title0->childNodes); //打印结果，又是一个列表对象

echo $title0->childNodes->length.'个子节点<br/>';

$text = $title0->childNodes->item(0);

print_r($text);

echo $text->wholeText;


?>