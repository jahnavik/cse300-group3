<?php
//connect to the server
include "connect.php";

/*$name = $_POST['e2'];
$prog = $_POST['e3'];
$batch = $_POST['e4'];
$email = $_POST['e5'];
$contact = $_POST['e6'];*/

if(!isset($_POST['edit']))
{
	echo "Please Fill the form";
	header("Location: teachingassistantslist.php");	
}
else
{
//	echo "WE ARE HERE!!!!";
	mysql_query("UPDATE ta_list SET name='$_POST[e2]', programme='$_POST[e3]', batch='$_POST[e4]', email='$_POST[e5]', contact='$_POST[e6]' WHERE id = $_POST[e1]");
//	echo "Added!";
	header("Location: teachingassistantslist.php");
}
?>