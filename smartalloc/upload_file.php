<?php
session_start();

include "connect.php";

if (isset($_POST["submit"]))
{

	
	if (isset($_SESSION["name"]))
	{
		
		
		$name = $_FILES["file"]["name"];
		$type = $_FILES["file"]["type"];
		$size = $_FILES["file"]["size"];
		$tmp_name = $_FILES["file"]["tmp_name"];
		$error = $_FILES["file"]["error"];
		
		if($error > 0)
		{
			echo "Error!".$error;
		}
		else
		{
			if (file_exists("upload/".$name))
			{
				echo $name." already exists";
			}
			else
			{
				$location = "upload/".$name;
				move_uploaded_file($tmp_name,$location);
				$user = $_SESSION["name"];
				$sqlcode = mysql_query("INSERT INTO upload (id,user,location) VALUES ('','$user','$location')");
				//echo "<a href='$location'>Click here to view the file.</a>";
				header("location:am_teachingassistants.php");
				//header("location:read_ta.php?file='$name'");

			}
		}
	}
	else
	{
		echo "Please Sign In";
	}
	}
else
{
	echo "<a href='index.php'>";
}