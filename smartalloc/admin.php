<?php
include "connect.php";

session_start();
$member_name = $_SESSION['name_ses'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" href="css/stylehome.css" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

</head>


<body>
<div id="header"><img src="images/banner3.png" width="1342" height="156" /></div>


<div id="container">  
    <ul id="nav">  
        <li class="active"><a href="admin.php" title="Your dashboard">Home</a>
         <li><a href="admin_home.php" >Login as Admin</a></li>  
        <li><a href="instructor_home.php" >Login as Instructor</a>
             </li>
    </ul>  
</div>  


<div id = "content_wrap">
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-9.4em;z-index:1; text-decoration:none; border: 2px solid #fff;">
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
 <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 26px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
</div>

<div id="left_content">
  <div id="wrapper">
     
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/initiate.jpg" data-thumb="images/initiate.jpg" alt="" title="Start the process..."  />
                <img src="images/work.jpg" data-thumb="images/work.jpg" alt="" title="Be a smart worker..." /></a>
                <img src="images/coments.jpg" data-thumb="images/coments.jpg" alt=""  title="Post everything..."  />
           
            </div>
           
        </div>

    </div>
    
</div>

 
<div id="right_content">
		
        <div id="clockbox" style="line-height: 1;  position:relative; z-index:1;  font: 13px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 100px; color:  #3a87ad; float: right;">
    </div>

	<div id="lastvisited" style = "line-height: 1; position:relative; z-index:5; font: 13px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 100px; color:  #3a87ad; float: right;">  
 
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

<div style="margin-right: 110px; margin-top: 70px; width: 400px; border: 2px solid #eee;">
		<p style="color:black;margin-top:110px;margin-left:10px;font-size:40px;text-align:center;">Welcome!</p>
		<p style="color: blue;;margin-top:20px;margin-left:10px;font-size:40px;text-align:center;"><?php echo "$member_name"; ?></p>
		<p style="line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 120px;"></br></br>
			The <b>My course</b> and  <b>TA Selection</b> tabs have been given for you to provide your course details and select Teaching Assistants for your course.
		</p>	
	</div>
</div>
</div>
</div>


<div id="footer">
	<img  src="images/contactbanner.png" /></div>

<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
    </script>
    
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



