<?php
session_start();
require_once 'reader.php';
include "connect.php";


$filename='ta_list.xls';

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
			for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++)
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
		echo "Please Sign In";
	}
}
else
{
	echo "<a href='index.php'>";
}
		
