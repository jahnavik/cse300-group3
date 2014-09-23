<?php
 session_start();
include "connect.php";
 
$ta_email= $_SESSION['email_ses'];

// Get values from form 
$q1 = $_POST['q1'];
$q2 = $_POST['q2'];
$q3 = $_POST['q3'];
//$t1= $_POST['t1'];
//$t2= $_POST['t2'];
//$t3= $_POST['t3'];

			
			//echo"choice_is_saved";
			$result3 = mysql_query("SELECT * FROM ta_list where email='$ta_email'") 
    or die(mysql_error());  
    
			$row3=mysql_fetch_assoc($result3);
			$c1=$row3['choice1'];
			$c2=$row3['choice2'];
			$c3=$row3['choice3'];
			

//echo"$ta_email";
// Insert data into mysql 
//echo"$ta_email";
//echo"$q1";
//echo"$q2";
//echo"$q3";
//echo"$c1";
//echo"$c2";
//echo"$c3";
$query="INSERT INTO form(ta_email,Languages,Qualifications,Remarks,choice1,choice2,choice3) VALUES('$ta_email','$q1','$q2','$q3','$c1','$c2','$c3')";
///echo $query;

$result=mysql_query("INSERT INTO form(ta_email,Languages,Qualifications,Remarks,choice1,choice2,choice3) VALUES('$ta_email','$q1','$q2','$q3','$c1','$c2','$c3')");
//echo $result;
if($result){
$query1="INSERT INTO temp2(email,form_submit) VALUES('$ta_email','yes')";
echo $query1;
$result1=mysql_query($query1);
if($result1){
$cx1=explode(" ", $c1);                 //for calc course nos given as best choice
			
		for($x=0;$x<count($cx1);$x++)
			{
			    $vb=$cx1[$x];
			    if($vb!="")
{ $query2="INSERT INTO choice1(email,course_no) VALUES('$ta_email','$vb')";
  $result2=mysql_query($query2);
   $result0 = mysql_query("UPDATE course_list SET tas_applied=tas_applied+1 where c_no='$vb'") 
    or die(mysql_error()); 
  }
}
$cx2=explode(" ", $c2);							 //for calc course nos given as okay choice

			
		for($x=0;$x<count($cx2);$x++)
			{
			    $vc=$cx2[$x];
			    if($vc!="")
{ $query3="INSERT INTO choice2(email,course_no) VALUES('$ta_email','$vc')";
  $result3=mysql_query($query3);
   $result01 = mysql_query("UPDATE course_list SET tas_applied=tas_applied+1 where c_no='$vc'") 
    or die(mysql_error()); 
  }
}

$cx3=explode(" ", $c3);							 //for calc course nos given as maybe choice

			
		for($x=0;$x<count($cx3);$x++)
			{
			    $vd=$cx3[$x];
			    if($vd!="")
{ $query4="INSERT INTO choice3(email,course_no) VALUES('$ta_email','$vd')";
  $result4=mysql_query($query4);
    $result02 = mysql_query("UPDATE course_list SET tas_applied=tas_applied+1 where c_no='$vd'") 
    or die(mysql_error()); 
  }
}

header("location:ta_view_form.php");
}
else
{
echo"errror";
}
}
else 
  header("location:ta_view_form.php");





// if successfully insert data into database, displays message "Successful". 
/*if($result){

echo "Form submitted Successfully";
//echo "<BR>";
//echo "<a href='insert.php'>Back to main page</a>";
}

else {
echo "ERROR";
}*/
 
?>