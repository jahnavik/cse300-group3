<?php
include "connect.php";

session_start();
$member_name = $_SESSION['name_ses'];
$query1="SELECT * FROM deadline where action='TA_form_filling'"; 
$result1=mysql_query($query1);
$row1=mysql_fetch_assoc($result1);
$deadline=$row1['deadline'];
$curr_time=time();
if($deadline<$curr_time)
{
header("location:ta_deadline_form_over.php"); 
}
else
{
header("location:ta_check_courses.php"); 
}
?>