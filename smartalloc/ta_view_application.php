<?php
session_start();
$email= $_SESSION['email_ses'];
include "connect.php";
$sql1="SELECT * FROM form WHERE ta_email='$email'";
		$result1=mysql_query($sql1);

		$count=mysql_num_rows($result1);
if($count==1)
{
header("location:ta_view_form.php");

}	
else if(count==0)
{
header("location:ta_form_not_filled.php");
}	
?>