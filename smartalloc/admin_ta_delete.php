<?php

include "connect.php";

	mysql_query("DELETE from ta_list WHERE id=$_POST[d1]");
	header("location:admin_teachingassistants.php");

?>