<?php
include "connect.php";
//$tbl_name="courses";

$query="SELECT * FROM courses";
$result=mysql_query($query);

$num=mysql_numrows($result);
//$num=$num+1;
//mysql_close();
?>
<form name= "form1" action="ta_check_choice.php" method="post" enctype="multipart/form-data">
<table id="hor-zebra" summary="Employee Pay Sheet">
<tr>
<th>S.No</th>
<th>Course No</th>
<th>Course Name</th>
<th>Course Level</th>
<th>Enrolment Size</th>
<th>TAs Required(Policy)</th>
<th>TAS Demanded</th>
<th>Course Instructor</th>
<th>Instructor Email</th>
<th>Course Details</th>
<th>Work Expectations</th>
</tr>


<?php
$i=0;
$best="Best";
$okay="Okay";
$maybe="MayBe";
while ($i < $num) {

$f2=mysql_result($result,$i,"course_no");
//echo"$f2";
$f3=mysql_result($result,$i,"year");
//echo"$f3";
$f4=mysql_result($result,$i,"detail");
$f5=mysql_result($result,$i,"expectations");
$f6=mysql_result($result,$i,"course_name");
$f7=mysql_result($result,$i,"size");
$ta=round($f7/20);
$f8=mysql_result($result,$i,"ta_demand");
$f9=mysql_result($result,$i,"instructor");
$f11=mysql_result($result,$i,"email");
$f10=mysql_result($result,$i,"contact");
//$course=$row['Course name'];


$name1=$f2.$best ;

//echo "$name1";
$name2=$f2.$okay ;
$name3=$f2.$maybe ;
?>
<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f6; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f7; ?></td>
<td><?php echo $ta; ?></td>
<td><?php echo $f8; ?></td>

<td><?php echo $f9; ?></td>
<td><?php echo $f11; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
</tr>
<?php
$i++;
}
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
