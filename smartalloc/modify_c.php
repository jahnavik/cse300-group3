<?php

include "connect.php";

/*$name = $_POST['e2'];
$prog = $_POST['e3'];
$batch = $_POST['e4'];
$email = $_POST['e5'];
$contact = $_POST['e6'];*/

if(!isset($_POST['edit']))
{
	echo "Please Fill the form";
	header("Location: am_courselist.php");	
}
else
{
//	echo "WE ARE HERE!!!!";
$enrol_size=$_POST['e5'];
//echo $enrol_size;
$ta_reqd=$enrol_size/20;
//echo $ta_reqd;
mysql_query("UPDATE course_list SET c_no='$_POST[e2]', c_name='$_POST[e3]', instructor='$_POST[e4]', enrol_size=$enrol_size, ta_reqd=$ta_reqd, email='$_POST[e6]', contact='$_POST[e7]' WHERE id = $_POST[e1]");
//	echo "Added!";
	header("Location: am_courselist.php");
}
?>

