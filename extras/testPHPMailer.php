<?php 

$ROOT =  __DIR__ . '/' ;
echo 'root = ' . $ROOT ;
		
// this function sends mail thru PHPMailer, it is in _common/functions.php
require_once(ROOT . 'PHPMailer/PHPMailerAutoload.php');
function sendMail($to, $subject, $message, $name=null, $filename=null, $url=null)
{
			 $mail             = new PHPMailer();
			 $mail->IsHTML(true);
			 $mail->isSMTP();
			 $mail->SMTPDebug = 0;
			 $mail->Debugoutput = 'html';
			 $mail->SMTPAuth   = true;
			 $mail->Host       = 'mail4.pointinspace.com';
			 $mail->Port       = 587;
			 $mail->Username   = 'tami@asktami.com';
			 $mail->Password   = 'admin!23';
			 $mail->setFrom('tami@asktami.com', 'Tami Williams');
			 $mail->addReplyTo('tami@asktami.com', 'Tami Williams');
			 $mail->Subject    = $subject;
			 
			 if(!empty($name)){
			 	$mail->addAddress($to, $name);
			 } else {
			 	$mail->addAddress($to);
			 }
			 
			 if(!empty($filename)){
			// use template for email body		 
			   $getbody = file_get_contents( ROOT . 'mail_templates/' . $filename );
			   $getbody = str_replace('%emailaddress%', $to, $getbody );
			   $getbody = str_replace('%name%', $name, $getbody );
			   $getbody = str_replace('%url%', $url, $getbody );
			   $mail->msgHTML( $getbody );
			} else {
			// use variable for email body
			   $mail->Body = $message;
			}
			
			 if(!$mail->Send()) {
				 return 0;
			 } else {
				   return 1;
			}
}

// to use the function 
			$to = 'test@asktami.com' ;
			$subject = "Test PHPMailer";
			$message = 'test email message' ;
			$name = 'Test Name' ;

			try {
				$sendMail = sendMail($to,$subject,$message,$name,$filename='reset_password.html',$url='www.google.com');
			} catch (Exception $e) {
				echo $e->getMessage();
			}
			
// to use the function and pass a mail_template for the email message body
			try {
				$sendMail = sendMail($to,$subject,$message,$name,$filename='',$url='');
			} catch (Exception $e) {
				echo $e->getMessage();
			}

?>