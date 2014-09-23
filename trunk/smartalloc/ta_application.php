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
			$row2=mysql_fetch_assoc($result2);
			$check_status=$row2['form_submit'];
			if($check_status=="yes")
			{
			
			header("location:form_already_submitted.php");
			}
		}
		else if($count==0)
			{
			$result3 = mysql_query("SELECT * FROM temp1 where email='$ta_email'") 
  or die(mysql_error());  
$count1=mysql_num_rows($result3);
			if($count1==0)
			{
				header("location:ta_choice_not_filled.php");
			}
			else if($count1==1)
			{
			     header("location:ta_application_form.php");
			}
			}
?>