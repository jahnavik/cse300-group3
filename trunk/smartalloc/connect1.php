<?php

$db_host = "localhost";
$db_username = "root" ;
$db_pass = "test123";

$connect = mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to Mysql");
mysql_select_db("smartalloc") or die ("No database");

?>

