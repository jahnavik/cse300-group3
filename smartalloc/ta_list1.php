<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Untitled 1</title>
</head>

<body>
<?php
include "connect.php";
//$tbl_name="courses";

$query="SELECT * FROM ta_list";
$result=mysql_query($query);

$num=mysql_numrows($result);
//$num=$num+1;
mysql_close();
?>
<form name= "form1" method="post" enctype="multipart/form-data">
<table border="1">
<tr>
<th>S.No</th>
<th>TA Name</th>
<th>Programme</th>
<th>Batch</th>
<th>Email</th>
<th>Contact</th>


</tr>
<?php
$i=0;
while($i<$num){
$f1=mysql_result($result,$i,"name");
$f2=mysql_result($result,$i,"programme");
$f3=mysql_result($result,$i,"batch");
$f4=mysql_result($result,$i,"email");
$f7=mysql_result($result,$i,"contact");
?>
<tr>
<td><?php echo $i+1; ?></td>

<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f7; ?></td>
</tr>
<?php
$i++;}
?>


</body>

</html>
