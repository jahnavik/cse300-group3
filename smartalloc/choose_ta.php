<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
session_start();
$email= $_SESSION['email_ses'];

include "connect.php";
$query="SELECT * FROM course_list where email='$email'";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
			$course_no=$row['c_no'];
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

			

//$num=$num+1;
//mysql_close();
?>
<form name= "form1" action="ta_selection.php" method="post" enctype="multipart/form-data">
<?php echo "FIRST PREFERENCE TAs:"; 

if($num1==0)
{
echo"No TAs applied ";
}
else {
?>

<table border="1">
<tr>
<th>TA</th>
<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th>choose</th>

</tr>

<?php
$i=0;
while ($i < $num1) {

$f1=mysql_result($result1,$i,"email");
//echo"$f1";

$result6=mysql_query("SELECT * FROM ta_list where email='$f1'");
$row6=mysql_fetch_assoc($result6);
			$name1=$row6['name'];
		//	echo"name1";
$name1=$row6['name'];
$p1=$row6['programme'];
$b1=$row6['batch'];
$query5="SELECT * FROM form where ta_email='$f1'";
$result5=mysql_query($query5);
$row5=mysql_fetch_assoc($result5);
$l1=$row5['Languages'];
$q1=$row5['Qualifications'];
$r1=$row5['Remarks'];



?>

<tr>
<td><?php  echo $name1; ?></td>
<td><?php   echo $p1; ?></td>
<td><?php  echo $b1; ?></td>
<td><?php echo $l1; ?></td>
<td><?php echo $q1; ?></td>
<td><?php echo $r1; ?></td>
<td><input type='checkbox' value='<?php echo $f1 ?>' name='<?php echo $f1 ?>' /></td>

</tr>
<?php
$i++;
}
}
?>

</table>
<?php 
echo"</br>";
echo "SECOND PREFERENCE TAs:";
if($num2==0)
{
echo"No TAs applied ";
}
else {

 ?>
<table border="1">
<tr>
<th>TA</th>

<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th>choose</th>




</tr>

<?php

$j=0;

while ($j < $num2) {

$f2=mysql_result($result2,$j,"email");
$result8=mysql_query("SELECT * FROM ta_list where email='$f2'");
$row8=mysql_fetch_assoc($result8);
			$name2=$row8['name'];
		//	echo"name1";
$p2=$row8['programme'];
$b2=$row8['batch'];
$query9="SELECT * FROM form where ta_email='$f2'";
$result9=mysql_query($query9);
$row9=mysql_fetch_assoc($result9);
$l2=$row9['Languages'];
$q2=$row9['Qualifications'];
$r2=$row9['Remarks'];



?>

<tr>
<td><?php echo $name2; ?></td>
<td><?php   echo $p2; ?></td>
<td><?php  echo $b2; ?></td>
<td><?php echo $l2; ?></td>
<td><?php echo $q2; ?></td>
<td><?php echo $r2; ?></td>



<td><input type='checkbox' value='<?php echo $f2 ?>' name='<?php echo $f2 ?>' /></td>

</tr>
<?php
$j++;
}
}
?>
</table>


</table>
<?php 
echo"</br>";
echo "THIRD PREFERENCE TAs:";
if($num3==0)
{
echo"No TAs applied ";
}
else {

 ?>
<table border="1">
<tr>
<th>TA</th>

<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th>choose</th>




</tr>

<?php

$k=0;

while ($k < $num3) {

$f3=mysql_result($result3,$k,"email");
$result11=mysql_query("SELECT * FROM ta_list where email='$f3'");
$row11=mysql_fetch_assoc($result11);
			$name3=$row11['name'];
		//	echo"name1";
$p3=$row11['programme'];
$b3=$row11['batch'];
$query12="SELECT * FROM form where ta_email='$f3'";
$result12=mysql_query($query12);
$row12=mysql_fetch_assoc($result12);
$l3=$row12['Languages'];
$q3=$row12['Qualifications'];
$r3=$row12['Remarks'];



?>

<tr>
<td><?php echo $name3; ?></td>
<td><?php   echo $p3; ?></td>
<td><?php  echo $b3; ?></td>
<td><?php echo $l3; ?></td>
<td><?php echo $q3; ?></td>
<td><?php echo $r3; ?></td>



<td><input type='checkbox' value='<?php echo $f3 ?>' name='<?php echo $f3 ?>' /></td>

</tr>
<?php
$k++;
}
}
?>
</table>


<input style="visibility:hidden" name="<?php echo $f1 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />


<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />


<button id="submit" type="submit" name="submit1" >Submit</button>

</form>

</body>
</html>