<?php
include "connect.php";
session_start();
if(!isset($_SESSION['email_ses']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['email_ses']))
{
	$current_session=$_SESSION['email_ses'];
	if($current_session!='vivek@iiitd.ac.in')
	{
		header("Location: unauthorized.html");
	}		
}

include "connect.php";

$name = $_POST['i2'];
$prog = $_POST['i3'];
$batch = $_POST['i4'];
$email = $_POST['i5'];
$contact = $_POST['i6'];

if(!isset($_POST['add']))
{
	echo "Please Fill the form";
	header("Location: teachingassistantslist.php");	
}
else
{
//	echo "WE ARE HERE!!!!";
	mysql_query("INSERT into ta_list(id,name,programme,batch,email,contact) VALUES ('','$name','$prog','$batch','$email','$contact')");
//	echo "Added!";
	header("Location: teachingassistantslist.php");
}
?>