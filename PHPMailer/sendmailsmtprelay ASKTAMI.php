<?php
/**
 * This example shows making an SMTP connection with authentication.
 */
//SMTP needs accurate times, and the PHP time zone MUST be set
//This should be done in your php.ini, but this is how to do it if you don't have access to that
date_default_timezone_set('America/New_York');


if(!isset($emailAddress)){
	$emailAddress = isset($_REQUEST["emailAddress"]) ? $_REQUEST["emailAddress"] : '' ;
}
if(!isset($subject)){
	$subject = isset($_REQUEST["subject"]) ? $_REQUEST["subject"] : '' ;
}
if(!isset($body)){
	$body = isset($_REQUEST["body"]) ? $_REQUEST["body"] : '' ;
}
if(!isset($filename)){
	$filename = isset($_REQUEST["filename"]) ? $_REQUEST["filename"] : '' ;
}
if(!isset($name)){
	$name = isset($_REQUEST["name"]) ? $_REQUEST["name"] : '' ;
}


require("PHPMailerAutoload.php");

	//Create a new PHPMailer instance
	$mail = new PHPMailer;

	//Tell PHPMailer to use SMTP
	$mail->isSMTP();

	//Enable SMTP debugging
	// 0 = off (for production use)
	// 1 = client messages
	// 2 = client and server messages
	$mail->SMTPDebug = 0;

	//Ask for HTML-friendly debug output
	$mail->Debugoutput = 'html';

	//Set the hostname of the mail server
	$mail->Host = "mail4.pointinspace.com";

	//Set the SMTP port number - likely to be 25, 465 or 587
	$mail->Port = 587;

	//Whether to use SMTP authentication
	$mail->SMTPAuth = true;

	//Username to use for SMTP authentication
	$mail->Username = 'tami@asktami.com';

	//Password to use for SMTP authentication
	$mail->Password = "admin!23";

	//Set who the message is to be sent from
	$mail->setFrom('tami@asktami.com', 'Tami Williams');

	//Set an alternative reply-to address
	$mail->addReplyTo('tami@asktami.com', 'Tami Williams');

	//Set who the message is to be sent to
	$mail->addAddress($emailAddress);

	//Set the subject line
	$mail->Subject = $subject;
	
	// send HTML email
	$mail->IsHTML(true);

if(!empty($filename)){
// use template for email body
$getbody = file_get_contents( $filename, dirname(__FILE__));

$getbody = str_replace('%emailaddress%', $emailAddress, $getbody );
$getbody = str_replace('%name%', $name, $getbody );
$getbody = str_replace('%url%', $url, $getbody );

$mail->msgHTML( $getbody );

} else {
// use variable for email body

	//Set the Body
	$mail->Body = $body;
}


	//Replace the plain text body with one created manually
	//$mail->AltBody = 'This is a plain-text message body';

	//Attach an image file
	//$mail->addAttachment('images/phpmailer_mini.png');


	//send the message, check for errors
	if (!$mail->send()) {
	    $mailmessageerror = "Mailer Error: " . $mail->ErrorInfo;
	} else {
	    $mailmessageerror = "Message sent!" . $mail->ErrorInfo;
	}
	
?>