<?php

$connect = mysql_connect("localhost","root","test123");
mysql_select_db("smartalloc");

if(!isset($_POST['submit']))
{
	$query = mysql_query("SELECT * FROM ta_list WHERE id = $_GET[id]");
	$row = mysql_fetch_array($query);
}
?>

<h1> Edit Record <h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
    Name <input type="text" name="i2" value="<?php echo $row['name']; ?>"><br>
    Prog <input type="text" name="i3" value="<?php echo $row['programme']; ?>"><br>
    Batch <input type="text" name="i4" value="<?php echo $row['batch']; ?>"><br>
    Email <input type="text" name="i5" value="<?php echo $row['email']; ?>"><br>
    Contact <input type="text" name="i6" value="<?php echo $row['contact']; ?>"><br>
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
mysql_query("UPDATE ta_list SET name='$_POST[i2]', programme='$_POST[i3]', batch='$_POST[i4]', email='$_POST[i5]', contact='$_POST[i6]' WHERE id = $_POST[i1]");
header("location:admin_teachingassistants.php");
}
?>