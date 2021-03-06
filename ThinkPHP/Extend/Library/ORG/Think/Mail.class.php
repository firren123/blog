<?php
namespace Think;

class Mail{
	function SendMail($address,$title,$message,$fromname='NONE'){
		$mail = new PHPMailer\PHPMailer;
		$mail->IsSMTP();
		$mail->CharSet=C('MAIL_CHARSET');
		$mail->AddAddress($address);
		$mail->Body=$message;$mail->From= C('MAIL_ADDRESS');
		$mail->FromName=$fromname;
		$mail->Subject=$title;
		$mail->Host=C('MAIL_SMTP');$mail->SMTPAuth=C('MAIL_AUTH');
		$mail->Username=C('MAIL_LOGINNAME');
		$mail->Password=C('MAIL_PASSWORD');  
		$mail->IsHTML(C('MAIL_HTML'));
		return($mail->Send());}
}