<?php
include "connect.php";
$tbl_name="login"; // Table name 

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

if (isset($_POST['email']) && isset($_POST['password'])) {
    
    if ($count==1) {    
        session_start();
			$_SESSION['email_ses']=$email;
			
			//@diti $_SESSION['is_remember_me']=$email;
		$sql1="SELECT view FROM $tbl_name WHERE email='$email' and password='$password'";
		$result1=mysql_query($sql1);
		$sql2="SELECT name FROM $tbl_name WHERE email='$email' and password='$password'";
		$result2=mysql_query($sql2);
		
		if($result1)
		{
			$row=mysql_fetch_assoc($result1);
			$member_view=$row['view'];
			 
		}
		if($result2)
		{
			$row=mysql_fetch_assoc($result2);
			$member_name=$row['name'];
			 
		}
		$_SESSION['name_ses']=$member_name;
        if (isset($_POST['vehicle'])) {
            /* Set cookie to last 1 year */
            setcookie('email', $_POST['email'], time()+60*60*24*365);
            setcookie('password', md5($_POST['password']), time()+60*60*24*365);
			
        
        } 
		/*session_start();
			$_SESSION['email']=$_POST['email'];
			session_write_close();*/
        header("location:$member_view");
        
    } else {
         header('Location: index.php?err=1');
    }
}


else {
    echo 'You must supply a username and password.';
}
?>