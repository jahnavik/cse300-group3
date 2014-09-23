<?php

require("class.phpmailer.php");
if(isset($_POST["submit_i1"]))
{
$to=$_POST["i1"];
$subject=$_POST["i2"];
$email=$_POST["i3"];
$mail             = new PHPMailer();
$body             = $email;
$mail->Mailer = "smtp"; 
$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = 465; 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "smartalloc.iiitd@gmail.com"; // SMTP username 
$mail->Password = "cullenjahn"; // SMTP password 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom('smartalloc.iiitd@gmail.com', 'smarTAlloc');
 
$mail->Subject    = $subject;
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress('jahnavi10032@iiitd.ac.in', 'Jahnavi Kalyani');
 
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
 header("location:admin_deadlines.php");
}}
?>