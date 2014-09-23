<?php
session_start();
include "connect.php";

$tbl_name="form"; // Table name 
$ta_email_check=$_SESSION['email_ses'];
$member_name=$_SESSION['name_ses'];
$b="";
$c="";
$d="";
$sql1="SELECT * FROM $tbl_name WHERE ta_email='$ta_email_check'";
		$result1=mysql_query($sql1);
		//$count=mysql_num_rows($result2);

		
		if($result1)
		{
			$row=mysql_fetch_assoc($result1);
			$ta_languages=$row['Languages'];
			$ta_qualification=$row['Qualifications'];
			$ta_remarks=$row['Remarks'];
			$ta1=$row['choice1'];
			$ta2=$row['choice2'];
			$ta3=$row['choice3'];
		$cx1=explode(" ", $ta1);
			
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
//$c2=$row3['choice2'];
			$cx2=explode(" ", $ta2);
			
		for($x=0;$x<count($cx2);$x++)
			{
			    $vc=$cx2[$x];
			   
			   $result5 = mysql_query("SELECT * FROM course_list where c_no='$vc'") 
    or die(mysql_error());  
  if($result5)
		{
			$row5=mysql_fetch_assoc($result5);
			$c7=$row5['c_name'];
$c=$c.$c7." ";
}
			    
			}

$cx3=explode(" ", $ta3);
			
		for($x=0;$x<count($cx3);$x++)
			{
			    $vd=$cx3[$x];
			   
			   $result6 = mysql_query("SELECT * FROM course_list where c_no='$vd'") 
    or die(mysql_error());  
  if($result6)
		{
			$row6=mysql_fetch_assoc($result6);
			$c8=$row6['c_name'];
$d=$d.$c8." ";
}
			    
			}
		}
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Results</title>
	<link rel="stylesheet" href="css/style_ta_webpages.css" type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
</head>

<body>

<div id="header"><img src="images/banner4.png" width="1342" height="156" /></div>



<div id="container">  
    <ul id="nav">  
        <li ><a href="ta_home.php" title="Your dashboard">Home</a></li>  
        <li><a href="ta_courses.php" >Courses</a>
        <ul>
		<li><a href="ta_check_courses.php">Select Courses</a></li>
        </ul>
        
        </li>
        
        </li>  
        <li ><a href="ta_courses_availaibility.php" >Availaibility</a></li>  
        <li class="active"><a href="ta_view_application.php" >Application</a></li>  
        <li ><a href="ta_results.php" >Results</a></li>  
        
    </ul>  
</div>  


 


<div id = "content_wrap">
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff;" >
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
<div style = "float:left; position: relative; margin-left:-1180px; margin-top: 24px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
 </div>
    
        <div class="alert  alert-success" style=" font-weight:normal;  margin-left: 150px; width: 1000px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close"  ><i class="cus-tick"></i></button>
  Form Filled Successfully! 
</div>
 <div id="left_content1">
	  
      <form action="ta_form_submit.php" method="post">
      <p  class = "text-info" style=" font-weight:normal;  margin-top: 20px; margin-left: 10px; width: 1000px; line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;" > 
      <i  class="cus-bullet-star" ></i> 
      Languages Known: &nbsp &nbsp <textarea  disabled="disabled" rows="3" name="q1" id="q1" placeholder=" Enter your known languages ..."><?php echo "$ta_languages" ?></textarea> </br> </br> 
      
       <i  class="cus-bullet-star" ></i>  Tools Used: &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp   <textarea  disabled="disabled" rows="3" name="q2" id="q2" placeholder="Enter the tools you have worked with ..."><?php echo"$ta_qualification" ?></textarea> </br> </br> 
       
       <i  class="cus-bullet-star" ></i> Remarks: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <textarea  disabled="disabled" rows="3" name="q3" id="q3" placeholder="Enter your remarks..."><?php echo"$ta_remarks" ?></textarea>  
     </br>
     
     </p> 
      
<!--      <button class="btn " type="submit" name="sendinfo" formaction="#" title="Submit your final application form " ><i class=" cus-report-go"></i> Submit Form</button>-->
    
    </form>
  </div>
  
  	<div id="boxform">
    
    	<div style="margin-top:15px; margin-left: 35px; width: 500px; height: 30px;  ">
    	<button class="btn btn-info" > Preferences </button>
         &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp
        <button class="btn btn-info" > Course # </button>
         &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp  &nbsp &nbsp
        <button class="btn btn-info" > Course Name </button>
        </div>
       
       <div style= "width: 160px; height: 230px; float: left; margin-top: 20px; margin-left: 10px;font-weight:normal;    line-height: 1; font: 17px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color: #3a87ad;">
       
     
       First Preference(s): </br> </br> 
       Second Preference(s): </br> </br> 
       Third Preference(s): 
    
    </div>
        <div style= "width: 220px; height: 230px;   margin-top: 15px; margin-right: 10px; float: right;">
    
    <textarea  disabled="disabled" name="t1" id="t1" rows="2"  style=" margin-top: 15px; width: 180px; margin-left: 10px;"> <?php
 //echo"$c1";
 echo"$b";
?>
</textarea>

   <textarea disabled="disabled" name="t2" rows="2"  style=" margin-top: 15px; width: 180px; margin-left: 10px;">
   <?php
// echo"$c2";
echo"$c";

?>
   </textarea>&nbsp;
   
   <textarea disabled="disabled" name="t3" rows="2"  style=" margin-top: 15px; width: 180px; margin-left: 10px;" >
   <?php
 //echo"$c3";
echo"$d";

?>
   </textarea>
   
    </div>
     
        <div style= "width: 150px; height: 230px; float: none;   margin-top: 15px; margin-left: 180px;">
        
        <textarea disabled="disabled" name="t1" id="t1" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;"> <?php
 echo"$ta1";
 //echo"$b";
?>
</textarea>

   <textarea disabled="disabled" name="t2" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;">
   <?php
 echo"$ta2";
?>
   </textarea>&nbsp;
   
   <textarea disabled="disabled" name="t3" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;" >
   <?php
 echo"$ta3";
?>
   </textarea>
   
    
  </div>
  

	</div>
 
 <div id="right_contentmy">
  
  	   
       
  </div>
  
</div>

<div style="float: right; position:relative; width: 505px; margin-right: 40px; top:-42em;z-index:1; text-decoration:none; border: 2px solid #fff;">
 
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

<div id="footer"><img  src="images/contactbanner.png" /></div>


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