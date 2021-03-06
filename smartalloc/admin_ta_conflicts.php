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
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Information</title>
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
        <li ><a href="admin_ta_applications.php">TA Applications</a></li>  
        <li><a href="admin_deadlines.php">Deadlines</a></li>  
        <li class="active"><a href="admin_ta_conflicts.php">Conflicts</a></li>       
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
 

   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 5px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 100px;">
   
  <button type="button" class="close" title="This page contains the a list of TA Conflicts."><i class="cus-information"></i></button>
Teaching Assistants Conflicts:  
</div>



<div id="middle_contenttable">
<?php
include "connect.php";
$tempname="None";
$tempcourse = "Nil";
$tbl_name="ta_list";
$query=mysql_query("SELECT t1.email, t1.course_no FROM ta_selection as t1, ta_selection as t2 where t2.email = t1.email and t1.course_no != t2.course_no order by t1.email,t1.course_no"); 
$num=mysql_numrows($query);
//$num=$num+1;
if($num==0)
{
echo "No Conflicts so far";
}
else
{
?>
<form name="form" action="resolve_conflicts.php" method="post" enctype="multipart/form-data">
<table id="hor-zebra" summary="Datapass">
<th>#</th>
<th>Name</th>
<th>Email</th>
<th>Course No.</th>
<th>Course Name</th>
<th>Instructor</th>
<th>Assign</th>
</tr>
<?php
$i=0;
$j=0;
while($i < $num)
{
//$f1=mysql_result($result,$i,"s_no");
$f2=mysql_result($query,$i,"email");
$f1=mysql_result($query,$i,"course_no");

$q2=mysql_query("SELECT name from ta_list WHERE email='$f2'");
$f3=mysql_result($q2,0,"name");

$q3=mysql_query("SELECT c_name,instructor from course_list WHERE c_no='$f1'");

$f5=mysql_result($q3,0,"instructor");
$f4=mysql_result($q3,0,"c_name");

/*
$c=0;
while($c < $num)
{
$tn=mysql_result($q2,c,"name");
}

*/

if ($tempname == $f3)
{
if ($tempcourse != $f1)
{
?>
<tr>
<td></td>
<td></td>
<td></td>
<td><?php echo $f1; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
<td><input type='radio' name='<?php echo $f2; ?>' value='<?php echo $f1; ?>' /></td>
</tr>
<?php
}
$tempcourse = $f1;
}
else
{
?>

<tr>
<td><?php echo $j+1; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f1; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
<td><input type='radio' name='<?php echo $f2; ?>' value='<?php echo $f1; ?>'/></td>
</tr>

<input style="visibility:hidden" name="<?php echo $f1; ?>" value="<?php echo $f1; ?>" />
<input style="visibility:hidden" name="<?php echo $j; ?>" value="<?php echo $j; ?>" />

<?php
$j++;
$tempcourse = $f1;
$tempname = $f3;
//echo $f1;
}
$i++;
}
}

?>
<input style="visibility:hidden" name="count" value="<?php echo $f1; ?>" />

  </table>
  <button id="submit" type="submit" class="btn" name="submit" ><i class="cus-tick"></i> Save Choices</button>

</form>

  
  
    </div>
	<div class="modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-header">
        </div>
		<div class="modal-body">
		</div>
        <div class="modal-footer">
        </div>  
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


    
        


<!-- <div id="footer"><img  src="images/contactbanner.png" /></div> -->
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