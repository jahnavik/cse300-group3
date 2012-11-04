<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home</title>
<link rel="stylesheet" href="css/styleadhome.css" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

</head>


<body>
<div id="header"><img src="images/banner2.png" width="1342" height="156" /></div>


<div id="container">  
    <ul id="nav">  
        <li class="active"><a href="admin_home.php">Home</a></li>  
        <li><a href="admin_teachingassistants.php">TAs</a></li>  
        <li><a href="admin_courseinfo.php">Course Info</a></li>  
        <li><a href="admin_updates.php">Course Updates</a></li>  
        <li><a href="admin_ta_applications.php">TAship Applications</a></li>  
        <li><a href="admin_ta_results.php">Results</a></li>  
        
    </ul>  
</div>  


<div id = "content_wrap">
 <a style="margin-left:174px; position:relative; top:-9.6em;z-index:1;" href="logout.php" title="Log Out."><img src="images/1351863022_exit.png"/> </a>


<div id="left_content">
  <div id="wrapper">
     
        <div class="slider-wrapper theme-default">
            <div id="slider" class="nivoSlider">
                <img src="images/initiate.jpg" data-thumb="images/initiate.jpg" alt="" title="Start the process..."  />
                <img src="images/work.jpg" data-thumb="images/work.jpg" alt="" title="Be a smart worker..." /></a>
                <img src="images/coments.jpg" data-thumb="images/coments.jpg" alt="" data-transition="slideInLeft" title="Post everything..."  />
                <img src="images/pages.jpg" data-thumb="images/pages.jpg" alt="" title="No more paper work..." />
            </div>
           
        </div>

    </div>
    
</div>

	
        <div id="clockbox" style="line-height: 1;  position:relative; top:-15.8em;z-index:1; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color:  #3a87ad; float: right;"></div>
<div id="lastvisited" style = "line-height: 1; position:relative; top:-15.8em;z-index:5; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 200px; color:  #3a87ad; float: right;">  
 
 
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


<div id="right_content">
		<p style="color:black;margin-top:30px;margin-left:10px;font-size:40px;text-align:center;">Welcome!</p>
		<p style="color:blue;margin-top:1px;margin-left:10px;font-size:40px;text-align:center;">Dr. Astrid Kiehn</p>
		<p style="line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 420px;"></br></br>
			- The <b>TAs</b> and <b>Course Info</b> tabs have been given for you to <i><b>review</b></i> the list of TAs and the courses offered in the current semester. </br>
            - The <b>Course Updates</b> tab provides the information updated by the instructor in their course page. </br>
            - The <b>TAship Applications</b> tab contains the applications of all the TAs for the current semester. </br>
            - The <b>Results</b> tab contains the final selection of the TAs by the Instructors.    
		</p>	
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



