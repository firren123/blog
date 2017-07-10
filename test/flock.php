<?php
/**
 * Created by PhpStorm.
 * User: lichenjun
 * Date: 2017/5/5
 * Time: 下午12:02
 */

//$fp = fopen("lock.txt", "w+");
//if(flock($fp,LOCK_EX))   //锁定当前指针，，，
//{
//    //..处理订单
//
//    echo '处理订单';
//    $fb = date("Y-m-d H:i:s");
//    flock($fp,LOCK_UN);
//}
//echo "<br>";
//echo "over";
//fclose($fp);

//$fp = fopen("lock.txt", "w+");
//if(flock($fp,LOCK_EX | LOCK_NB))
//{
//    //..处理订单
//    echo '处理订单2';
//
//    flock($fp,LOCK_UN);
//}
//else
//{
//    echo "系统繁忙，请稍后再试";
//}
//
//fclose($fp);
$s = file_get_contents("test.txt");
//var_dump($s);

$file = fopen("w.txt","w+");
var_dump($file);
//echo $file;
//echo 33333;exit;
// 排它性的锁定
if (flock($file,LOCK_EX))
{
    fwrite($file,"Write something");
    // release lock
    flock($file,LOCK_UN);
}
else
{
    echo "Error locking file!";
    flock($file,LOCK_UN);

}

fclose($file);