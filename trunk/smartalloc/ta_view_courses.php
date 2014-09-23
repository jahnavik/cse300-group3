<?php
session_start();
$ta_email= $_SESSION['email_ses'];
include "connect.php";
$result2 = mysql_query("SELECT * FROM temp1 where email='$ta_email'"); 
$num=mysql_numrows($result2);
if($num==0)
{
header("location:ta_firstyear_courses.php");
}
else if($num==1)
{
//$row2=mysql_fetch_assoc($result2);
//$check_status=$row2['choice_saved'];
			
header("location:ta_choice_filled.php");

}
?>