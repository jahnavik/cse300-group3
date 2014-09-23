<?php
include "connect.php";
session_start();

if(!isset($_SESSION['email_ses']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['email_ses']))
{
	$current_session=$_SESSION['email_ses'];
	if($current_session!='astrid@iiitd.ac.in')
	{
		header("Location: unauthorized.html");
	}		
}
include "connect.php";
$query="SELECT * FROM form";
$result=mysql_query($query);

$num=mysql_numrows($result);
//$num=$num+1;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>TA Applications</title>
		<link rel="stylesheet" href="css/style_ad_list.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>       
</head>


<body>

<div id="header"><img src="images/banner2.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li ><a href="admin_home.php">Home</a></li>  
        <li ><a href="admin_teachingassistants.php">TAs</a></li>  
        <li ><a href="admin_courseinfo.php">Course Info</a></li>  
        <li ><a href="admin_updates.php">Course Updates</a></li>  
        <li class="active"><a href="admin_ta_applications.php">TA Applications</a></li>  
         <li><a href="admin_deadlines.php">Deadlines</a></li>   
        <li ><a href="admin_ta_conflicts.php">Conflicts</a></li>    
            
        <li><a href="admin_ta_results.php">Results</a></li  
        
    ></ul>  
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


<div id = "content_wrap">   
 <div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff; " >
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
 	</div>
 

<form method="get" action="/search" id="search">
 <!-- <input name="q" type="text" size="40" placeholder="Search..." />
  -->
</form>


   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 5px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 100px;">
   
  <button type="button" class="close" title="This page contains the a list of all the application forms filled by teaching assistants. "><i class="cus-information"></i></button>
Application Forms of Teaching Assistants:  
</div>



<div id="middle_contenttable">
<?php
if($num==0)
{
?>
<div class="alert  alert-danger" style=" font-weight:normal; width:600px;line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
<button type="button" class="close" ><i class="cus-error"></i></button>
 <?php
echo"No updates yet!";
echo "</div>";
}
else {
?>
<form name= "form1" method="post" enctype="multipart/form-data">
 
<table id="hor-zebra">
<tr>
<th>#</th>
<th>TA Name</th>
<th>Programme</th>
<th>Batch</th>
<th>Email</th>

<th>Languages</th>
<th>Qualifications</th>
<th>Remarks</th>
<th>Preference 1</th>
<th>Preference 2</th>
<th>Preference 3</th>




</tr>
<?php
$i=0;
while($i<$num){
$f1=mysql_result($result,$i,"ta_email");
$f2=mysql_result($result,$i,"Languages");
$f3=mysql_result($result,$i,"Qualifications");
$f4=mysql_result($result,$i,"Remarks");
$f7=mysql_result($result,$i,"choice1");
$f8=mysql_result($result,$i,"choice2");
$f9=mysql_result($result,$i,"choice3");
$query1="SELECT * FROM ta_list where email='$f1'";
$result1=mysql_query($query1);
$row1=mysql_fetch_assoc($result1);
			$name=$row1['name'];
			$programme=$row1['programme'];

$batch=$row1['batch'];


?>
<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $name; ?></td>
<td><?php echo $programme; ?></td>
<td><?php echo $batch; ?></td>

<td><?php echo $f1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f7; ?></td>
<td><?php echo $f8; ?></td>
<td><?php echo $f9; ?></td>

</tr>
<?php
$i++;}
}
?>
</form>
</table>




  
    </div>
 <div style="position: relative; top: -33em; margin-left: 900px; ">   
    <form action="graph1_ta.php" method="POST" enctype="multipart/form-data">
    <button class="btn" type="submit" name="submit1" title="Line Chart" id="save" ><i class="cus-add"></i>   Line Chart</button>

</form>
</div>
   
	</div>
    

   
   
  <div  style="float: right; position:relative; width: 505px; margin-right: 40px; top:-42.9em;z-index:1; text-decoration:none; border: 2px solid #fff; " >
 
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


    
        


<!--<div id="footer"><img  src="images/contactbanner.png" /></div>-->
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