<?php

$connect = mysql_connect("localhost","root","test123");
mysql_select_db("smartalloc");

if(!isset($_POST['submit']))
{
	$query = mysql_query("SELECT * FROM course_list WHERE id = $_GET[id]");
	$row = mysql_fetch_array($query);
}
?>

<h1> Edit Record <h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    Course Number <input type="text" name="i2" value="<?php echo $row['c_no']; ?>"><br>
    Course Name <input type="text" name="i3" value="<?php echo $row['c_name']; ?>"><br>
    Instructor <input type="text" name="i4" value="<?php echo $row['instructor']; ?>"><br>
    Enrolment Size <input type="text" name="i5" value="<?php echo $row['enrol_size']; ?>"><br>
    TAs Required <input type="text" name="i6" value="<?php echo $row['ta_reqd']; ?>"><br>
    Email <input type="text" name="i7" value="<?php echo $row['email']; ?>"><br>
    Contact <input type="text" name="i8" value="<?php echo $row['contact']; ?>"><br>
    <input type="hidden" name="i1" value="<?php echo $_GET['id']; ?>">
    <input type="submit" name="submit1" value="Edit" />
</form>

<?php
//connect to the server
$connect = mysql_connect("localhost","root","test123");
//connect to the data base
mysql_select_db("smartalloc");
if(isset($_POST['submit1']))
{
mysql_query("UPDATE ta_list SET c_no='$_POST[i2]', c_name='$_POST[i3]', instructor='$_POST[i4]', enrol_size='$_POST[i5]', ta_reqd='$_POST[i6]', email='$_POST[i7]', contact='$_POST[i8]' WHERE id = $_POST[i1]");
header("location:am_courselist.php");
}
?>