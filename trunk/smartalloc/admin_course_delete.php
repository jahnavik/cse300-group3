<?php

include "connect.php";

	mysql_query("DELETE from course_list WHERE id=$_POST[d1]");
	header("location:admin_courseinfo.php");

?>