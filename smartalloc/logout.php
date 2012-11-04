
<?php
$date = date('Y-m-d H:i:s');
session_start();
$member_email=$_SESSION['email_ses'];

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="test123"; // Mysql password 
$db_name="smartalloc"; // Database name 
$tbl_name="login"; // Table name 

// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$sql="UPDATE $tbl_name SET last_visit='$date' WHERE email='$member_email'";
$result=mysql_query($sql);





//$_SESSION['last_visit']=$date;

setcookie("email","",time()-(60*60*24*365));
setcookie("password","",time()-(60*60*24*365));
header("LOCATION:index.php");
?>

