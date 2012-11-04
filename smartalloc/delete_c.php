<?php

//connect to the server
$connect = mysql_connect("localhost","root","test123");
//connect to the data base
mysql_select_db("smartalloc");

	mysql_query("DELETE from course_list WHERE id=$_GET[id]");
	header("location:am_courselist.php");

?>