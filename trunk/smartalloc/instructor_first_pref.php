<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TA Preferences</title>
	<link rel="stylesheet" href="css/style_ins.css"  type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
    <script	type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap-button.js"></script>

</head>


<body>
<?php
session_start();
$email= $_SESSION['email_ses'];
$member_name = $_SESSION['name_ses'];
$num=0;
include "connect.php";
$tbl_name="course_list";
$query ="SELECT * FROM course_list where email='$email'";  
$result=mysql_query($query);
//echo $result;
$num=mysql_numrows($result);  //to identify instructor course
           $i=0;
while($i < $num)
{

$f1=mysql_result($result,$i,"c_no");


 if (isset($_POST[$f1]))   {
$query="SELECT * FROM course_list where c_no='$f1'";
$result=mysql_query($query);
$row=mysql_fetch_assoc($result);
			$course_no1=$f1;
			$_SESSION['course_no']=$f1;
		//	$course_name=$row['course_name'];
$query1="SELECT * FROM choice1 where course_no='$f1'";      //choose 1st pref TAs
$query2="SELECT * FROM choice2 where course_no='$f1'";      //choose 2nd pref TAs
$query3="SELECT * FROM choice3 where course_no='$f1'";       //choose 3rd pref TAs
$result1=mysql_query($query1);
$result2=mysql_query($query2);
$result3=mysql_query($query3);

$num1=mysql_numrows($result1);
$num2=mysql_numrows($result2);
$num3=mysql_numrows($result3);

			

$num=$num+1;
//mysql_close();
?>


<div id="header"><img src="images/banner3.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li class="active"><a href="instructor_home.php" title="Your dashboard">Home</a>
         <li><a href="instructor_courses.php" >My Course</a></li>  
        <li><a href="instructor_ta_selection.php" >TA Selection</a>
             <ul>
			<li><a href="instructor_courses_tas.php">Select TAs</a></li>
			
        </ul>
        
        </li> 
        <li><a href="instructor_ta_results.php" >Results</a></li>  
        
    </ul>  
</div>  

<style>
	
	
#search {
	
	float:right;
	margin-right:10px;
}

#search input[type="text"] {
    background: url(search-white.png) no-repeat 10px 6px #fcfcfc;
    border: 1px solid #d1d1d1;
    font: normal 12px Arial,Helvetica,Sans-serif;
    color: #bebebe;
    width: 130px;
	height: 15px;
    padding: 6px 15px 6px 35px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    -webkit-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15) inset;
    -moz-box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15) inset;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.15) inset;
    -webkit-transition: all 0.7s ease 0s;
    -moz-transition: all 0.7s ease 0s;
    -o-transition: all 0.7s ease 0s;
    transition: all 0.7s ease 0s;
    }

#search input[type="text"]:focus {
    width: 130px;
    }
</style>

<div id = "content_wrap1">   
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff;">
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
 <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 26px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
</div>
 
    
<form method="get" action="/search" id="search">
  <input name="q" type="text" size="40" placeholder="Search..." />
  
</form>

 
   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 5px; width:800px;line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close"  title="This page contains the list of Teaching Assistants who have chosen your course as their first preference.  "><i class="cus-information"></i></button>
  First Preferences:  
</div>

<div id="middle_contenttable">
<form name= "form1" action="instructor_selection.php" method="post" enctype="multipart/form-data">
<?php 

if($num1==0)
{

?>
 <div class="alert  alert-danger" style=" font-weight:normal; margin-top: 50px; margin-bottom: 200px; margin-left: 65px; width:600px;line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" ><i class="cus-error"></i></button>
<?php 


echo"No 1st Preference given for your course yet! ";
echo "</div>";
}
else {
?>


<table id="hor-zebra" >
<tr>
<th>TA</th>
<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th style="text-align: center;">Select</th>

</tr>

<?php
$i=0;
while ($i < $num1) {

$f1=mysql_result($result1,$i,"email");
//echo"$f1";
$c1= explode("@", $f1);
$box1 = $c1[0];

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
<td style="text-align: center;"><input type='checkbox' value='<?php echo $box1 ?>' name='<?php echo $box1 ?>' required/></td>

</tr>
<?php
$i++;
}

?>

</table>

<input style="visibility:hidden" name="<?php echo $f1; ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<?php
}
?>

</div>
<?php 

if($num2==0)
{

?>
 <div class="alert  alert-danger" style=" font-weight:normal; margin-top: 50px; margin-bottom: 200px; margin-left: 65px; width:600px;line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" ><i class="cus-error"></i></button>
<?php 


echo"No 2nd Preference given for your course yet! ";
echo "</div>";
}
else {
?>


<table id="hor-zebra" >
<tr>
<th>TA</th>
<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th style="text-align: center;">Select</th>

</tr>

<?php
$i=0;
while ($i < $num2) {

$f2=mysql_result($result2,$i,"email");
//echo"$f1";
$c2= explode("@", $f2);
$box2 = $c2[0];

$result7=mysql_query("SELECT * FROM ta_list where email='$f2'");
$row7=mysql_fetch_assoc($result7);
			//$name1=$row7['name'];
		//	echo"name1";
$name2=$row7['name'];
$p2=$row7['programme'];
$b2=$row7['batch'];
$query8="SELECT * FROM form where ta_email='$f2'";
$result8=mysql_query($query8);
$row8=mysql_fetch_assoc($result8);
$l2=$row5['Languages'];
$q2=$row5['Qualifications'];
$r2=$row5['Remarks'];



?>

<tr>
<td><?php  echo $name2; ?></td>
<td><?php   echo $p2; ?></td>
<td><?php  echo $b2; ?></td>
<td><?php echo $l2; ?></td>
<td><?php echo $q2; ?></td>
<td><?php echo $r2; ?></td>
<td style="text-align: center;"><input type='checkbox' value='<?php echo $box2 ?>' name='<?php echo $box2 ?>' required/></td>

</tr>
<?php
$i++;
}

?>

</table>

<input style="visibility:hidden" name="<?php echo $f1; ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<?php
}
?>
</div>
<?php 

if($num3==0)
{

?>
 <div class="alert  alert-danger" style=" font-weight:normal; margin-top: 50px; margin-bottom: 200px; margin-left: 65px; width:600px;line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" ><i class="cus-error"></i></button>
<?php 


echo"No 3rd Preference given for your course yet! ";
echo "</div>";
}
else {
?>


<table id="hor-zebra" >
<tr>
<th>TA</th>
<th>Programme</th>
<th>Batch</th>
<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th style="text-align: center;">Select</th>

</tr>

<?php
$i=0;
while ($i < $num3) {

$f3=mysql_result($result3,$i,"email");
//echo"$f1";
$c3= explode("@", $f3);
$box3 = $c3[0];

$result9=mysql_query("SELECT * FROM ta_list where email='$f3'");
$row9=mysql_fetch_assoc($result9);
			$name3=$row9['name'];
		//	echo"name1";
//$name1=$row6['name'];
$p3=$row9['programme'];
$b3=$row9['batch'];
$query10="SELECT * FROM form where ta_email='$f3'";
$result10=mysql_query($query10);
$row10=mysql_fetch_assoc($result10);
$l3=$row10['Languages'];
$q3=$row10['Qualifications'];
$r3=$row10['Remarks'];



?>

<tr>
<td><?php  echo $name3; ?></td>
<td><?php   echo $p3; ?></td>
<td><?php  echo $b3; ?></td>
<td><?php echo $l3; ?></td>
<td><?php echo $q3; ?></td>
<td><?php echo $r3; ?></td>
<td style="text-align: center;"><input type='checkbox' value='<?php echo $box3 ?>' name='<?php echo $box3 ?>' required/></td>

</tr>
<?php
$i++;
}

?>

</table>
<?php
}

?>

<input style="visibility:hidden" name="<?php echo $f1; ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<?php

break;
}
else
{
$i++;
}
}
?>
</div>
<div style="top: -35em; position:relative; margin-left: 890px; width: 300px; height: 30px; ">


<button id="submit" type="submit" class="btn" name="submit1" ><i class="cus-accept"></i>   Save</button>
</div>
</form>

	</div>
</div>

    
	<div  style="float: right; position:relative; width: 505px; margin-right: 40px; top:-42.7em;z-index:1; text-decoration:none; border: 2px solid #fff; " >
 
     <div id="clockbox" style=" font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color:  #3a87ad; float: right;"></div>
     <div id="lastvisited" style = " font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 200px; color:  #3a87ad; float: right;">  
     
	<script type = "text/javascript">
		var days = 730; // days until cookie expires = 2 years.
		var lastvisit=new Object();
		var firstvisitmsg="This is your first visit to this page. Welcome!"; 
		lastvisit.subsequentvisitmsg=" Your last visit was on: [displaydate]";

		lastvisit.getCookie=function(Name){ 
		var re=new RegExp(Name+"=[^;]+", "i"); 
		if (document.cookie.match(re)) 
		return document.cookie.match(re)[0].split("=")[1];
		return''; 
		}

		lastvisit.setCookie=function(name, value, days){ 
		var expireDate = new Date();

		var expstring=expireDate.setDate(expireDate.getDate()+parseInt(days));
		document.cookie = name+"="+value+"; expires="+expireDate.toGMTString()+"; path=/";
		}

		lastvisit.showmessage = function() {
		var wh = new Date();
		if (lastvisit.getCookie("visitc") == "") { 
		lastvisit.setCookie("visitc", wh, days); 
		document.write(firstvisitmsg);
		}

		else {
		var lv = lastvisit.getCookie("visitc");
		var lvp = Date.parse(lv);
		var now = new Date();
		now.setTime(lvp);
		var day=new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
		var month=new Array("January","February","March","April","May","June","July","August","September","October","November","December");
		var dd = now.getDate();
		var dy = now.getDay();
		dy = day[dy];
		var mn = now.getMonth();
		mn = month[mn];
		yy = now.getFullYear();
		var hh = now.getHours();
		var ampm = "AM";
		if (hh >= 12) {ampm = "PM"}
		if (hh >12){hh = hh - 12};
		if (hh == 0) {hh = 12}
		if (hh < 10) {hh = "" + hh};
		var mins = now.getMinutes();
		if (mins < 10) {mins = "0"+ mins}
		var secs = now.getSeconds();
		if (secs < 10) {secs = "0" + secs}
		var dispDate = dy + ", " + mn + " " + dd + ", " + yy + " " + hh + ":" + mins + ":" + secs + " " + ampm
		document.write(lastvisit.subsequentvisitmsg.replace("\[displaydate\]", dispDate))
		}

		lastvisit.setCookie("visitc", wh, days);

		}

		lastvisit.showmessage();

</script>

</div>
</div>


<script src="js/bootstrap.js"></script>
<script type="text/javascript">
tday  =new Array("Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday");
tmonth=new Array("January","February","March","April","May","June","July","August","September","October","November","December");

function GetClock(){
d = new Date();
nday   = d.getDay();
nmonth = d.getMonth();
ndate  = d.getDate();
nyear = d.getYear();
nhour  = d.getHours();
nmin   = d.getMinutes();
nsec   = d.getSeconds();

if(nyear<1000) nyear=nyear+1900;

     if(nhour ==  0) {ap = " AM";nhour = 12;} 
else if(nhour <= 11) {ap = " AM";} 
else if(nhour == 12) {ap = " PM";} 
else if(nhour >= 13) {ap = " PM";nhour -= 12;}

if(nmin <= 9) {nmin = "0" +nmin;}
if(nsec <= 9) {nsec = "0" +nsec;}


document.getElementById('clockbox').innerHTML="Today: "+tday[nday]+", "+tmonth[nmonth]+" "+ndate+", "+nyear+" "+nhour+":"+nmin+":"+nsec+ap+"";
setTimeout("GetClock()", 1000);
}
window.onload=GetClock;
</script>
</body>
</html>