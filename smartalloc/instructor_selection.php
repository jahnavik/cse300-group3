<?php
//echo"TAs selected by you:";
session_start();
$email= $_SESSION['email_ses'];
include "connect.php";

			$course_no=$_SESSION['course_no1'];
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
//echo $num1;
while ($i<$num1)
{

$f1=mysql_result($result1,$i,"email");
$c1=explode("@", $f1);

$box1=$c1[0];

if (isset($_POST[$box1]))
{
$e1=$box1."@iiitd.ac.in";
echo"$e1";
$query25="INSERT INTO ta_selection(course_no,email) VALUES('$course_no','$e1')";
$result25=mysql_query($query25);
}
$i++;
}
while ($j<$num2)
{

$f2=mysql_result($result2,$j,"email");
$c2=explode("@", $f2);

$box2=$c2[0];

if (isset($_POST[$box2]))
{
$e2=$box2."@iiitd.ac.in";
echo"$e2";
$query26="INSERT INTO ta_selection(course_no,email) VALUES('$course_no','$e2')";
$result26=mysql_query($query26);
}
$j++;
}
while ($k<$num3)
{

$f3=mysql_result($result3,$k,"email");
$c3=explode("@", $f3);

$box3=$c3[0];

if (isset($_POST[$box3]))
{
$e3=$box3."@iiitd.ac.in";
echo"$e3";
$query27="INSERT INTO ta_selection(course_no,email) VALUES('$course_no','$e3')";
$result27=mysql_query($query27);
}
$k++;
}
$_SESSION['course_no1']=$course_no;
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
