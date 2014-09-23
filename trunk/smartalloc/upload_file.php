<?php
include "connect.php";
session_start();

if(!isset($_SESSION['email_ses']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['email_ses']))
{
	$current_session=$_SESSION['email_ses'];
	if($current_session!='vivek@iiitd.ac.in')
	{
		header("Location: unauthorized.html");
	}		
}

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
		
		if ($type== "application/vnd.ms-excel")
		{
			if($error > 0)
			{
//			echo "Error!".$error;
			header("location:am_teachingassistants.php");
			}
			else
			{  
		
			$location = "upload/".$name;
				
			if (file_exists("upload/".$name))
			{
				//echo $name." already exists";
				unlink($location);
			}
				move_uploaded_file($tmp_name,$location);
				$user = $_SESSION["name"];
				$sqlcode = mysql_query("INSERT INTO upload (id,user,location) VALUES ('','$user','$location')");
				//echo "<a href='$location'>Click here to view the file.</a>";
				header("location:am_teachingassistants.php");
				//header("location:read_ta.php?file='$name'");

			
			}
		}
	
	else
	{
		//echo "Error1";	
		header("location:am_teachingassistants.php");
	}
	
	}
	else
	{
		//echo "Error2";	
			header("location:am_teachingassistants.php");
	}
	}
else
{
	echo "<a href='index.php'>";
}
?>