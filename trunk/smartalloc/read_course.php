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
require_once 'reader.php';
include "connect.php";

$query = mysql_query("SELECT location from upload WHERE location LIKE 'course_up%'");
//echo "$query";



$filename = "" ;
while($rows = mysql_fetch_array($query))
{
	$filename = $rows['location'];
}

if ($filename=="")
{
			header("location:am_courseinfo.php");	
}

//echo "$filename";
//$filename='course_list.xls';
if (isset($_POST["submit1"]))
{
//	echo "here";
	if (isset($_SESSION["name"]))
	{	
		function parseExcel($excel_file_name_with_path)
		{
			$data = new Spreadsheet_Excel_Reader();
			// Set Output Encoding
			$data->setOutputEncoding('CP1251');
			$data->read($excel_file_name_with_path);
			$colname=array('c_no','c_name','instructor','enrol_size','ta_reqd','email','contact');
			//	echo $data->sheets[0]['cells'][1][1];
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
		{
		//	$product[$i-1][$j-1]=$data->sheets[0]['cells'][$i][$j];
		//	$product[$i-1][$colname[$j-1]]=$data->sheets[0]['cells'][$i][$j];
		//	echo $data->sheets[0]['cells'][$i][$j];
			$c_no = $data->sheets[0]['cells'][$i][1];
		//	echo "$c_no";
			$c_name = $data->sheets[0]['cells'][$i][2];
			$instructor = $data->sheets[0]['cells'][$i][3];
			$enrol_size = $data->sheets[0]['cells'][$i][4];
			//$ta_reqd = $data->sheets[0]['cells'][$i][5];
			$email = $data->sheets[0]['cells'][$i][5];
			$contact = $data->sheets[0]['cells'][$i][6];
		//	echo $email;
		$ta_reqd = $enrol_size/20 ;
			mysql_query("INSERT INTO course_list (id,c_no,c_name,instructor,enrol_size,ta_reqd,email,contact) VALUES('','$c_no','$c_name','$instructor','$enrol_size','$ta_reqd','$email','$contact')");
	}
//	return $product;
}

		$prod=parseExcel($filename);
		echo"<pre>";
		print_r($prod);
		
		header("location:am_courselist.php");
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