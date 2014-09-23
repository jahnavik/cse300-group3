<?php
include "connect.php";

if(isset($_POST["submit1"]))
{
	header("location:ta_application_form.php");
}
else
{
	echo "ERROR";
}
?>