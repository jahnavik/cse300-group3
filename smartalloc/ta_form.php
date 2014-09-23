<?php
session_start();
$ta_email= $_SESSION['email_ses'];
include "connect.php";

$result2 = mysql_query("SELECT * FROM temp1 where email='$ta_email'") 
    or die(mysql_error());  
$b="";
$o="";
$m="";
if($result2)
		{
			$row2=mysql_fetch_assoc($result2);
			$check_status=$row2['choice_saved'];
			if($check_status=="yes")
			{
			
			//echo"choice_is_saved";
			$result3 = mysql_query("SELECT * FROM saved_choice where email='$ta_email'") 
    or die(mysql_error());  
    if($result3)
		{
			$row3=mysql_fetch_assoc($result3);
			$c1=$row3['choice1'];
			$cx1=explode(" ", $c1);
			
		for($x=0;$x<count($cx1);$x++)
			{
			    $vb=$cx1[$x];
			   
			   $result4 = mysql_query("SELECT * FROM course_list where c_no='$vb'") 
    or die(mysql_error());  
  if($result4)
		{
			$row4=mysql_fetch_assoc($result4);
			$c6=$row4['c_name'];
$b=$b.$c6." ";
}
			    
			}
		//	echo"$b";
			$c2=$row3['choice2'];
$c3=$row3['choice3'];


//echo"$c1";

   
}
}
}
else
{
echo"error";
}
			
			
			

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link href="css/stylehome.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

</head>


<body>
<div id="header"><img src="images/monika_image.png" width="1342" height="156" /></div>


<div id="container">  
    <ul id="nav">  
        <li ><a href="teaching_assistant.php">Home</a></li>  
        <li ><a href="am_teachingassistants.html">Courses</a></li>  
        <li><a href="am_courseinfo.html">Availability</a></li>  
        <li><a href="am_timetable.html">Application</a></li>
        <li><a href="am_timetable.html">Results</a>
</li></ul></div>  




<div id="left_content" style="width:1342px">


  <p style="color:black;margin-top:20px;margin-left:-100px;font-size:20px;text-align:left;font-size:40px">TAship Form: Winter Semester</p>
   <p style="color:black;margin-top:20px;margin-left:-100px;font-size:20px;text-align:left;font-size:20px">Fill in your details:</p>
   
   
   
    
<div id="menu" style="color:blue;background-color:#FFD700;height:100px;width:430px;float:left;margin-left:-100px;margin-top:20px" >
<form id="ha" action="ta_form_submit.php" method="post">
  
<b><strong>Languages/Tools Known</strong>
<textarea rows="5" cols="50"  name="q1" id="q1" style="background-color:#FFD700;border:none"></textarea>

<div id="menu" style="color:blue;background-color:#FFD700;height:100px;width:430px;float:left;margin-left:00px;margin-top:30px">
  <b><strong>Other Qualifications</strong>
  <textarea rows="5" cols="50" name="q2" id="q2" style="background-color:#FFD700;border:none"></textarea>
  
  
<div id="menu" style="color:blue;background-color:#FFD700;height:100px;width:430px;float:left;margin-left:00px;margin-top:30px">
 <strong><b>Remarks</strong> 
 <textarea rows="5" cols="50"  name="q3" id="q3" style="background-color:#FFD700;border:none" ></textarea>
  </div>
   <input type="submit" name ="submit" value="Submit Form">
  
</form>

</div>
   
		
			
</div>
    
   <div id="content_wrap" style="background-color:#33CC33;margin-top:20px;margin-left:410px;width:800px;height:370px">
   <textarea name="t1" id="t1" rows="2" cols="20" style="background-color:#33CC33;margin-top:-100px;margin-left:-20px"> <?php
 echo"$c1";
 //echo"$b";
?>
</textarea>

   <textarea name="t2" rows="2" cols="20" style="background-color:#33CC33;margin-top:100px;margin-left:60px">
   <?php
 echo"$c2";
?>
   </textarea>&nbsp;
   
    
    <div id="menu" style="color:black;background-color:#00CCCC;height:40px;width:230px;float:left;margin-left:10px;margin-top:20px">Preferences
    
    
    
    
    
<div id="menu" style="color:black;background-color:#00CCCC;height:40px;width:230px;float:left;margin-left:270px;margin-top:-20px">Course Number
  <div id="menu" style="color:black;background-color:#00CCCC;height:40px;width:230px;float:left;margin-left:270px;margin-top:-20px">Course Name
   
   
   
</div>
</div>
    </div>
    
       <b>
   <textarea name="t3" rows="2" cols="20" style="background-color:#33CC33;margin-top:100px;margin-left:120px" >
   <?php
 echo"$c3";
?>
   </textarea></b><div id="left_content" style="color:blue;margin-top:-30px;margin-left:30px">First
    <div id="left_content" style="color:blue;margin-top:90px;margin-left:0px">Second
    <div id="left_content" style="color:blue;margin-top:90px;margin-left:0px">Third
    
</div>

<div id=form_buttons style="height:80px;width:50px;margin-top:-300px;margin-left:250px">

 

</div>
</body>
</html>

