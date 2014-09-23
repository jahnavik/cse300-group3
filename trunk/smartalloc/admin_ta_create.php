<?php

include "connect.php";

$name = $_POST['i2'];
$prog = $_POST['i3'];
$batch = $_POST['i4'];
$email = $_POST['i5'];
$contact = $_POST['i6'];

if(!isset($_POST['add']))
{
	echo "Please Fill the form";
	header("Location: admin_teachingassistants.php");	
}
else
{
//	echo "WE ARE HERE!!!!";
	mysql_query("INSERT into ta_list(id,name,programme,batch,email,contact) VALUES ('','$name','$prog','$batch','$email','$contact')");
//	echo "Added!";
	header("Location: admin_teachingassistants.php");
}
?>