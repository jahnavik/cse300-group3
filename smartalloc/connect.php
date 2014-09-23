<?php

$host="192.168.1.20"; // Host name 
$username="group3"; // Mysql username 
$password="grp3orange"; // Mysql password 
$db_name="group3"; // Database name 

$connect = mysql_connect("$host","$username","$password") or die ("Could not connect to Mysql");
mysql_select_db("$db_name") or die ("No database");

?>

