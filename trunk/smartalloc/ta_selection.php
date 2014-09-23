<?php
//echo"TAs selected by you:";
session_start();
$email= $_SESSION['email_ses'];
include "connect.php";
$query="SELECT * FROM course_list where email='$email'";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
			$course_no=$row['c_no'];
//$query="SELECT * FROM courses where email='$email'";
//$result=mysql_query($query);
//$row=mysql_fetch_assoc($result);
	//		$course_no=$row['course_no'];
		//	$course_name=$row['course_name'];
$query1="SELECT * FROM choice1 where course_no='$course_no'";      //choose 1st pref TAs
$query2="SELECT * FROM choice2 where course_no='$course_no'";      //choose 2nd pref TAs
$query3="SELECT * FROM choice3 where course_no='$course_no'";       //choose 3rd pref TAs
$result1=mysql_query($query1);
$result2=mysql_query($query2);
$result3=mysql_query($query3);

$num1=mysql_numrows($result1);
$num2=mysql_numrows($result2);
$num3=mysql_numrows($result3);
$i=0;
$j=0;
$k=0;
?>
<?php

while ($i<$num1)
{

$f1=mysql_result($result1,$i,"email");
$c1=explode("@", $f1);

$box1=$c1[0];
echo"$box1";

//$result6=mysql_query("SELECT * FROM ta_list where email='$f1'");
//$row6=mysql_fetch_assoc($result6);
//			$name1=$row6['name'];

//echo"$name1";
if (isset($_POST[$box1]))
{
$ta1="$_POST[$box1]";
echo"$ta1";
$e1=$ta1."@iiitd.ac.in";
$query25="INSERT INTO ta_selection(course_no,email) VALUES('$course_no','$e1')";
$result25=mysql_query($query25);

//echo"$e1";
//$result6=mysql_query("SELECT * FROM ta_list where email='$e1'");
//$row6=mysql_fetch_assoc($result6);
//			$name1=$row6['name'];
//$p1=$row6['programme'];
//$b1=$row6['batch'];
//$query5="SELECT * FROM form where ta_email='$f1'";
//$result5=mysql_query($query5);
//$row5=mysql_fetch_assoc($result5);
//$l1=$row5['Languages'];
//$q1=$row5['Qualifications'];
//$r1=$row5['Remarks'];


//echo"$name1";





//echo"disabled";



}
$i++;
}


header("location:instructor_selected_tas.php");                     //go on page to show all chosen TAs

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
