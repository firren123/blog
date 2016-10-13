<?php
/**
* 
*/
// namespace Modules\Home\Action;
// use Think\Controller;
// import('ORG.Net.FastDFS');
class TestAction extends Action
{
	function index(){
    	header("Access-Control-Allow-Origin:*");
    	$arr=array('a'=>"赵成强",'b'=>"沈美娇",'c'=>"王冬");  
		
		$msg = json_encode($arr);
		// echo $msg;exit;
		$callback=$_GET['callback'];  

		echo $callback."($msg)";
	}

	function index2()
	{
		$password = $_GET['k'];
		$pattern = '/[^0-9A-Za-z]/';
		$num = preg_match($pattern, $password);
		if($num == 1){
			echo  '不是字母、数字组合';
		}else{
			echo  '是字母、数字组合';
		}
	}
	function f_break(){
		$a = 1;
		if ($a) {
			echo 1;
			break;
		}else{
			echo 2;
		}
	}
	function aaaa(){
		echo 'start:<br>';
		ob_end_clean();     //在循环输出前，要关闭输出缓冲区
		echo str_pad('.',10240);     //浏览器在接受输出一定长度内容之前不会显示缓冲输出，这个长度值 IE是256，火狐是1024
		for ($i=0; $i < 100 ; $i++) { 
			echo $i;
			sleep(1);
			echo '<br>';
			flush();    //刷新输出缓冲
		}
		
	}
	function file_append(){
		$n = date('d H:i:s',time());
		$allsql= "我要写入文件\r\n".$n."\r\n\r\n";
		file_put_contents('/tmp/notice_status_sql_tmp.log',$allsql,FILE_APPEND);	
		echo 'It’s ok';	
	}
	function tagTab(){
		dump($_POST);
	}
	function send_mail(){

// #* 在控制器里用法:
// import('Think.Mail');//导入本类
// $data['mailto'] = 'i@pengyong.info'; //收件人
// $data['subject'] =	'邮件正文标题'; //邮件标题
// $data['body'] =	'邮件正文内容'; //邮件正文内容
// $mail = new Email();
// if($mail->send($data))
// {
// //邮件发送成功...
// }
// else
// {
// //邮件发送失败...
// }
// $mail->debug(true)->send($data); //开启调试功能 
		import('ORG.Think.Mail');
		$mail = new Mail();
    	$mail->SendMail('firren@163.com','邮件标题','邮件正文','我测试来着');



	}
	function fsfd(){
		
		if ($_POST) {
			// import('ORG.Net.FastDFS1');
			import('ORG.Net.FDFS');
				# code...
			
			$filename = $_FILES['file'];
			dump($filename);
			// dump($filename);
			$title = $_POST['title'];
			$fdfs = new FDFS();  //FastDFS
			// $aa = fastdfs_tracker_get_connection();
			// $bbb = fastdfs_tracker_query_storage_store();
			// $aaa = $fdfs->fastdfs_tracker_query_storage_store();
			// var_dump($fdfs);       
			// var_dump($aa);                  //调用FastDFS类
			$file_info = $fdfs->fdfs_upload('file');         //上传文件 $filename 是所上传的文件，html是上传后的更名后缀名为.html
			// echo $file_info['filename'];                       //输出上传文件目录和文件名
			var_dump($file_info);
			// $a = fastdfs_storage_upload_by_filename('/tmp/tianqi.txt');
			// var_dump($a);
		}else{
			echo 'aaaaa';
			$this->display('fdfs');
		}

	}
	function fsfd2(){
		// $a = new FastDFS();
		// { ["ip_addr"]=> string(13) "182.92.84.129" ["port"]=> int(22122) ["sock"]=> int(22) }
		// fastdfs_connect_server($this->storage['ip_addr'], $this->storage['port']);
		// $aaa = fastdfs_connect_server("182.92.84.129", 22122);
		// var_dump($aaa);
		// die(0);
		// var_dump($a);
		// $arr2 = fastdfs_tracker_get_connection();
		// var_dump($arr2);
		// $arr = fastdfs_tracker_query_storage_store();
		// var_dump($arr);
		//fastdfs_storage_upload_by_filename
		// $arr= fastdfs_storage_upload_by_filename('/tmp/tianqi.txt');/data/images/data/00/00/tlxUgVP2_XDjtZZRAAB7UNInADc29.html
		$file_info=fastdfs_get_file_info1('group1/M00/00/00/tlxUgVP2_XDjtZZRAAB7UNInADc29.html');
		var_dump($file_info);
		// $arr = fastdfs_tracker_query_storage_store();
		// var_dump($arr);
	}
	function fsfd3(){
		$tracker = fastdfs_tracker_get_connection();
		var_dump($tracker);
		 if (!fastdfs_active_test($tracker))
		 {
		        error_log("errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info());
		        exit(1);
		 }
		$storage = fastdfs_tracker_query_storage_store();
		dump($storage);
		if (!$storage)
		 {
		        error_log("errno: " . fastdfs_get_last_error_no() . ", error info: " . fastdfs_get_last_error_info());
		        exit(1);
		 }
		$file_info = fastdfs_storage_upload_by_filename("/var/www/html/lcj/ueditor/php/upload/image/20140828/1409217122568527.jpg", null, array(), null, $tracker, $storage);
		dump($file_info);
	}

}