<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>
<body>
<?php
include "connect.php";
$tbl_name="course_list";

$query="SELECT * FROM $tbl_name";
$result=mysql_query($query);
$num=mysql_numrows($result);
//$num=$num+1;
mysql_close();
?>
<form name= "form1" action="ta_check_choice.php" method="post" enctype="multipart/form-data">
<table border="1">
<th>Course#</th>
<th>Course Name</th>
<th>Course Instructor</th>
<th>Course Details</th>
<th>Work Requirements</th>
<th>Best</th>
<th>Okay</th>
<th>Maybe</th>
</tr>

<?php
$i=0;
$best="Best";
$okay="Okay";
$maybe="MayBe";
while ($i < $num) {

$f1=mysql_result($result,$i,"id");
$f2=mysql_result($result,$i,"c_no");
$f3=mysql_result($result,$i,"instructor");
$f4=mysql_result($result,$i,"email");
$f5=mysql_result($result,$i,"enrol_size");
//$course=$row['Course name'];

$name1=$f2.$best ;

//echo "$name1";
$name2=$f2.$okay ;
$name3=$f2.$maybe ;

?>

<tr>
<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
<td><input type='checkbox' value='<?php echo $f2 ?>' name='<?php echo $name1 ?>' /></td>
<?php echo"$f2";
echo"$name1"; ?>
<td><input type='checkbox' value='<?php echo $f2 ?>' name='<?php echo $name2 ?>' /></td>


<td><input type='checkbox' value='<?php echo $f2 ?>' name='<?php echo $name3 ?>' /></td>
</tr>

<?php
$i++;
}
?>
</table>
<input style="visibility:hidden" name="<?php echo $name1 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="<?php echo $name2 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="<?php echo $name3 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />


<button id="submit" type="submit" name="submit1" >Save and Move to Form</button>

</form>

</body>
</html>