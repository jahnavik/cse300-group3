<?php
session_start();
$ta_email= $_SESSION['email_ses'];
include "connect.php";
$member_name = $_SESSION['name_ses'];
$result2 = mysql_query("SELECT * FROM temp2 where email='$ta_email'") 
  or die(mysql_error());  
$count=mysql_num_rows($result2);
			if($count==1)
			{
				header("location:form_already_submitted.php");
			}
			else if($count==0)
			{
$result3 = mysql_query("SELECT * FROM temp1 where email='$ta_email'") 
  or die(mysql_error());  
$count1=mysql_num_rows($result3);
			if($count1==0)
			{
				header("location:ta_firstyear_courses.php");
			}
			else if($count1==1)
			{
			     header("location:ta_choice_filled.php");
			}
		}	
?>