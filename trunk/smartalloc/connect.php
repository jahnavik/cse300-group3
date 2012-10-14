<?php

$db_host = "localhost";
$db_username = "root" ;
$db_pass = "test123";
$db_name ="test_datkkkabase";


@mysql_connect("$db_host","$db_username","$db_pass") or die ("Could not connect to Mysql");
@mysql_select_db("$db_name") or die ("No database");

echo"Succesful Connection!";
  
?>