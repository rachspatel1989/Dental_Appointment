<?php
function Send_Mail($to,$subject,$body)
{
require 'class.phpmailer.php';
$from = "hms@yogintechnologies.com";
$mail = new PHPMailer();
$mail->SMTPDebug  = 1;                     // enables SMTP debug information (for testing)
$mail->IsSMTP(true); // SMTP
$mail->SMTPAuth   = true; // SMTP authentication
$mail->SMTPSecure = 'none'; // secure transfer enabled REQUIRED for Gmail
$mail->Mailer = "smtp";
$mail->Host       = "mail.yogintechnologies.com"; // Amazon SES server, note "tls://" protocol
$mail->Port       = 25;                    // set the SMTP port
$mail->Username   = "hms@yogintechnologies.com";  // SES SMTP  username
$mail->Password   = "Yogintech04";  // SES SMTP password
$mail->SetFrom($from, 'Notification');
$mail->AddReplyTo($from,'Notification');
//  $mail->AddAddress('whoto@otherdomain.com', 'John Doe');
//  $mail->SetFrom('name@yourdomain.com', 'First Last');
//  $mail->AddReplyTo('name@yourdomain.com', 'First Last');
//$mail->AddAttachment('images/phpmailer.gif');      // attachment
//  $mail->AddAttachment('images/phpmailer_mini.gif'); // attachment
$mail->Subject = $subject;
$mail->MsgHTML($body);
$address = $to;
$address_bcc = "amit.bhuriya@yogintechnologies.com";
$mail->AddAddress($address, $to);
$mail->AddBCC($address_bcc);
if(!$mail->Send())
return false;
else
return true;
}
?>