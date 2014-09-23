<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script language="javascript">
function disable()
{
document.form1.button.disabled = true;
}
</script>
</head>
<body>
<form name="form1"  method="post"> 
 </form>
</body>
</html>

<?php 
include "connect.php";
//$tbl_name="courses";

$deadline=$_POST["text1"];
$len1=strlen($deadline); 
//for($j=0;$j<$len1;$j=$j+1)
//{echo"$deadline[$j]";
//}
if($deadline[1]=='-'){
$date=(int)$deadline[0];
$month=substr($deadline,2,3);
$year=(int)substr($deadline,6,4);
}
else {
$date=(int)substr($deadline,0,2);
$month=substr($deadline,3,3);
$year=(int)substr($deadline,7,4);	
}
if ($month=="Jan")
	{$month=1;}
if ($month=="Feb")
	{$month=2;}
if ($month=="Mar")
	{$month=3;}
if ($month=="Apr")
	{$month=4;}
if ($month=="May")
	{$month=5;}
if ($month=="June")
	{$month=6;}
if ($month=="July")
	{$month=7;}
if ($month=="Aug")
	{$month=8;}
if ($month=="Sep")
	{$month=9;}
if ($month=="Oct")
	{$month=10;}				
if ($month=="Nov")
	{$month=11;}
if ($month=="Dec")
	{$month=12;}
//date_default_timezone_set('Asia/Kolkata');

//echo "$current_ts\n";
$deadline_ts = mktime(0,0,0,$month,$date,$year);
$action="TA_form_filling";
$query="UPDATE deadline SET deadline='$deadline_ts' where action='$action'";
$result=mysql_query($query);
//echo "Here";
//if($current_ts > $deadline_ts) {
  //   echo "$deadline_ts";
	// echo "disable()";
//} else {
     //code for the registration form
//}
//echo"$date";
//echo"$month";
//echo"$year";
//$mon=$deadline[2,4];
?>

<?php

require("class.phpmailer.php");
if(isset($_POST["set"]))
{
$to=$_POST["i1"];
$subject=$_POST["i2"];
$email=$_POST["i3"];
$mail             = new PHPMailer();
$body             = "Dear Student,<br><br>This is to inform you that the list of courses for the current semester has been uploaded on the smarTAlloc website.<br>You are required to fill your preferences on http://14.139.56.179:8083/ by <b> $deadline </b><br><br><b>Note: This email is system generated. Do not reply to this mail.</b>";
$mail->Mailer = "smtp"; 
$mail->Host = "ssl://smtp.gmail.com"; 
$mail->Port = 465; 
$mail->SMTPAuth = true; // turn on SMTP authentication 
$mail->Username = "smartalloc.iiitd@gmail.com"; // SMTP username 
$mail->Password = "cullenjahn"; // SMTP password 
$mail->IsSMTP(); // telling the class to use SMTP
$mail->SetFrom('smartalloc.iiitd@gmail.com', 'smarTAlloc');
 
$mail->Subject    = "smarTAlloc : Fill Your Preferences";
 
$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test
 
$mail->MsgHTML($body);
 
$mail->AddAddress('jahnavi10032@iiitd.ac.in', 'Jahnavi Kalyani');
 
if(!$mail->Send()) {
  echo "Mailer Error: " . $mail->ErrorInfo;
} else {
 header("location:admin_deadlines.php");
}}

?> 