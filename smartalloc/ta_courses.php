<?php
include "connect.php";

session_start();
$member_name = $_SESSION['name_ses'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Courses</title>
	<link rel="stylesheet" href="css/style_ta_webpages.css"  type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
    <style>
	li#chu li a:hover  li.active a {
	color:  #39aea8 ;
	text-decoration:none;
}
li#chu
{
	color:  #f4ba51 ;
	text-decoration:none;
}
ul#nav li a:hover,ul#nav  li.active a {
	color:  #f4ba51 ;
	text-decoration:none;
}
	</style>
</head>

<body>

<div id="header"><img src="images/banner4.png" width="1342" height="156" /></div>



<div id="container">  
    <ul id="nav">  
        <li ><a href="ta_home.php" title="Your dashboard">Home</a></li>  
        <li class="active"><a href="ta_courses.php" >Courses</a>
        <ul>
			<li><a href="ta_check_courses.php">Select Courses</a></li>

        </ul>
        
        </li>  
        <li><a href="ta_courses_availaibility.php" >Availaibility</a></li>  
        <li><a href="ta_application.php" >Application</a></li>  
        <li><a href="ta_results.php" >Results</a></li>  
        
    </ul>  
</div>  




<div id = "content_wrap">
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff;" >
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
 <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 24px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
</div>

<div class="alert  alert-info" style=" font-weight:normal;  margin-left: 150px; width: 1000px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" data-dismiss="alert" title="This page contains the name of the course for which you would be teaching assistant this semester. "><i class="cus-information"></i></button>
 View all courses and apply as per your preference:
</div>

	  <div id="left_content1">
	  
      <img style= " border: 2px solid  #fff; height: 300px; background-shadow: #000 2px 2px; " src="images/selects_pen.png" />
    
    
  </div>

  
  <div id="right_contentok">
  
  <p style="margin-left:200px;  font-weight:normal;  font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; " class="text-info">Instructions:</p>
    <p class="text-info" style="margin-left:10px; line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">  <br/>  	- Three tabs (Courses) have been provided for you to select your courses according to your preferences. </br> </br>
			- Details of each course has been tabulated for your convenience. </br> </br>
			- Please adhere to the deadline specified in the email. </br> </br>
</p>
  
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