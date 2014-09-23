<?php
session_start();
$ta_email= $_SESSION['email_ses'];

//header('Location: ta_form.php');
//include("course_select.php"); 

//$ta_email=$_SESSION['email_ses'];
//$member_nme=$_SESSION['name_ses'];
//$num=$_POST['num'];


$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password=""; // Mysql password 
$db_name="smartalloc"; // Database name 
mysql_connect("$host", "$username", "$password")or die("cannot connect"); 
mysql_select_db("$db_name")or die("cannot select DB");
$tbl_name="saved_choice";
$best="Best";
		$okay="Okay";
		$maybe="MayBe";
$b="";
$o="";
$m="";
//$ctr=0;
$result2 = mysql_query("SELECT * FROM courses"); 
$num=mysql_numrows($result2);
for($ctr=0;$ctr<$num;$ctr++)
{ 
//$result2 = mysql_query("SELECT * FROM course_list where id='$ctr'") 
    //or die(mysql_error());  
  // $num=mysql_numrows($result);


		
		
			$check_no=mysql_result($result2,$ctr,"course_no");
			
            $name21=$check_no.$best ;
			$name22=$check_no.$okay ;
			$name23=$check_no.$maybe ;
//echo $_POST['Software EngineeringBest'] ;
//echo $_POST["Software Engineering.Best"];
//echo"$name21";
//echo"$name22";
//echo"$name23";
//if(isset($_POST['submit1']))
//{

if (isset($_POST[$check_no]))
{
//$comma_separated = implode(",", $arr1);
$dsa=$_POST[$check_no];
if($dsa=="Best")
{
$b=$b.$check_no." ";

}
else if($dsa=="Okay")
{
$o=$o.$check_no." ";

}
else if($dsa=="MayBe")
{
$m=$m.$check_no." ";

}//echo"Best";
else if($dsa=="No")
{


}
//echo"Best";
//echo"$dsa";
//echo"</br>";
	}

}
//echo"$b";
//echo"$o";
//echo"$m";

$query="INSERT INTO $tbl_name(email,choice1,choice2,choice3) VALUES('$ta_email','$b','$o','$m')";

$result=mysql_query($query);

$query1="INSERT INTO temp1(email,choice_saved) VALUES('$ta_email','yes')";
$result1=mysql_query($query1);
if($result1){
header("location:ta_application_form.php");
}


else {
echo "ERROR";
}


//echo"$comma_separated";

//if(($_GET["$name1"])==true)
//{
    
  //  echo $_GET["$name1"];

//echo"$name21";
//echo"$name22";
//echo"$name23";




//echo $_POST['aa'] ;

/*if (isset($_POST['aa'])) {

echo"enabled";
}
else
{
echo"not enabled";
}*/

?>