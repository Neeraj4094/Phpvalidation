<?php
include('smtp/PHPMailerAutoload.php');
function smtp_mailer($to,$subject, $msg){
	$mail = new PHPMailer(); 
	$mail->IsSMTP(); 
	$mail->SMTPAuth = true; 
	$mail->SMTPSecure = 'tls';
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587;
	$mail->IsHTML(true);
	$mail->CharSet = 'UTF-8';
	// $mail->SMTPDebug = true;
	$mail->Username = "4094.neeraj@gmail.com";
	$mail->Password = "pihigxrydigmvlrx";
	$mail->SetFrom("4020.neeraj@gmail.com");
	$mail->Subject = $subject;
	$mail->Body =$msg;
	$mail->AddAddress($to);
	$mail->SMTPOptions=array('ssl'=>array(
		'verify_peer'=>false,
		'verify_peer_name'=>false,
		'allow_self_signed'=>false
	));
	if(!$mail->Send()){
		echo $mail->ErrorInfo;
	}else{
		$errmsg = 'Mail sent successfully. Please, check your mail';
		return $errmsg;
	}
}
?>