<?php

$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="test123"; // Mysql password 
$db_name="smartalloc"; // Database name 
$tbl_name="login"; // Table name 


// Connect to server and select database.
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");


// username and password sent from form 
$email=$_POST['email']; 
$password=$_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);
$sql="SELECT * FROM $tbl_name WHERE email='$email' and password='$password'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $email and $password, table row must be 1 row
if($count==1){

// Register $email, $password and redirect to file "login_success.php"
$_SESSION['email']=$email;
$_SESSION['password']=$password;
$sql1="SELECT view FROM $tbl_name WHERE email='$email' and password='$password'";
$result1=mysql_query($sql1);
if($result1)
{
	$row=mysql_fetch_assoc($result);
	$member_view=$row['view'];
	}
header("location:$member_view");
print $sql;
}
else {
header("location:index.html");
echo "Wrong Username or Password";
echo $count;
}
?>