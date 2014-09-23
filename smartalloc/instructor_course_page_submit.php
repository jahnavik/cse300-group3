<?php
 session_start();

 include "connect.php";
 
 $tbl_name="form"; // Table name 
$email= $_SESSION['email_ses'];

// Connect to server and select database.



// Get values from form 
$course_no=$_POST['no'];

$expect = $_POST['expect'];
$detail = $_POST['detail'];
$ta = $_POST['ta'];
$level = $_POST['level'];

//$query2="INSERT INTO course_detail(course_no,year,detail,expectations,ta_demand) VALUES('$course_no','$level','$detail','$expect','$ta')";
$query2="UPDATE course_list SET year='$level', detail='$detail', expectations='$expect', ta_demand='$ta' where c_no='$course_no'";

$result2=mysql_query($query2);
if($result2)
{
echo"yes";
}
else
{
echo"error";
}
$query3="INSERT INTO temp3(course_no,detail_submit) VALUES('$course_no','yes')";


$result3=mysql_query($query3);
$_SESSION['course_no'] = $course_no;
//header("location:course_detail_view.php");
header("location:instructor_course_detail_view.php");

//$q2 = $_POST['q2'];
//$q3 = $_POST['q3'];



?>



