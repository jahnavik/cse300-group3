<?php
include "connect.php";

$c_no = $_POST['i2'];
$c_name = $_POST['i3'];
$instructor = $_POST['i4'];
$enrol_size = $_POST['i5'];
$ta_reqd = $enrol_size/20;
$email = $_POST['i6'];
$contact = $_POST['i7'];

if(!isset($_POST['add']))
{
	//echo "Please Fill the form";
	header("Location: am_courselist.php");	
}
else
{
	mysql_query("INSERT into course_list(id,c_no,c_name,instructor,enrol_size,ta_reqd,email,contact) VALUES ('','$c_no','$c_name','$instructor','$enrol_size','$ta_reqd','$email','$contact')");
//	echo "INSERT into course_list(id,c_no,c_name,instructor,enrol_size,ta_reqd,email,contact) VALUES ('','$id','$c_no','$c_name','$instructor','$enrol_size','$ta_reqd','$email','$contact')";
	echo "Added!";
	header("Location: am_courselist.php");
}
?>