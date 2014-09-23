
<?php
$date = date('Y-m-d H:i:s');
session_start();
$member_email=$_SESSION['email_ses'];
include "connect.php" ;
$tbl_name="login"; // Table name 

// Connect to server and select database.
$sql="UPDATE $tbl_name SET last_visit='$date' WHERE email='$member_email'";
$result=mysql_query($sql);





//$_SESSION['last_visit']=$date;

setcookie("email","",time()-(60*60*24*365));
setcookie("password","",time()-(60*60*24*365));
header("LOCATION:index.php");
?>

