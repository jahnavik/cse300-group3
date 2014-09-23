<?php
session_start();
$email= $_SESSION['email_ses'];
include "connect.php";
$i=0;

$query="SELECT * FROM course_list where email='$email'";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
			$course_no=$row['c_no'];

$query1="SELECT * FROM ta_selection where course_no='$course_no'";
$result1=mysql_query($query1);
$row1=mysql_fetch_assoc($result1);
$num=mysql_numrows($result1);

?>
<table border="1">
<tr>
<th>TA</th>
<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>

</tr>

<?php
	while($i<$num)
	{	
	$f1=mysql_result($result1,$i,"email");
			
$result6=mysql_query("SELECT * FROM ta_list where email='$f1'");
$row6=mysql_fetch_assoc($result6);
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
<th><?php echo "$name1";?></th>
<th><?php echo "$p1";?></th>
<th><?php echo "$b1";?></th>
<th><?php echo "$l1";?></th>
<th><?php echo "$q1";?></th>
<th><?php echo "$r1";?></th>

</tr>


<?php

$i++;
}


             
?>

</table>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>

</body>

</html>
