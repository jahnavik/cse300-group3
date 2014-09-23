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

$query = mysql_query("SELECT location from upload WHERE location LIKE '%upload%' ");
//echo "$query";

$filename = "" ;
while($rows = mysql_fetch_array($query))
{
	$filename = $rows['location'];
}

if ($filename=="")
{
			header("location:am_teachingassistants.php");	
}

if (isset($_POST["submit1"]))
{
	if (isset($_SESSION["name"]))
	{	
	
	
		function parseExcel($excel_file_name_with_path)
		{
			$data = new Spreadsheet_Excel_Reader();
			// Set Output Encoding
			$data->setOutputEncoding('CP1251');
			$data->read($excel_file_name_with_path);
			$colname=array('name','programme','batch','email','contact');
			//	echo $data->sheets[0]['cells'][1][1];
			for ($i = 2; $i <= $data->sheets[0]['numRows']; $i++)
		{
			//	$product[$i-1][$j-1]=$data->sheets[0]['cells'][$i][$j];
		//	$product[$i-1][$colname[$j-1]]=$data->sheets[0]['cells'][$i][$j];
		//	echo $data->sheets[0]['cells'][$i][$j];
			$name = $data->sheets[0]['cells'][$i][1];
			$programme = $data->sheets[0]['cells'][$i][2];
			$batch = $data->sheets[0]['cells'][$i][3];
			$email = $data->sheets[0]['cells'][$i][4];
			$contact = $data->sheets[0]['cells'][$i][5];
		//	echo $name;
		//	echo $email;
		
			//mysql_query("DELETE * FROM ta_list" );
					
			$sqlcode = mysql_query("INSERT INTO ta_list (id,name,programme,batch,email,contact) VALUES('','$name','$programme','$batch','$email','$contact')");
	}
//	return $product;
}

		$prod=parseExcel($filename);

		echo"<pre>";

		print_r($prod);
		
		header("location:teachingassistantslist.php");
	}

	else
	{
		header("location:am_teachingassistants.php");
	}
}
else
{
	echo "<a href='index.php'>";
}