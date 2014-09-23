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
<title>Deadlines</title>
		<link rel="stylesheet" href="css/style_ad_list.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<!--		<link rel="stylesheet" type="text/css" href="/anytime.css" />
		<script src="/jquery.js"></script>
		<script src="/anytime.js"></script>	-->
        <script language="javascript" type="text/javascript" src="datetimepicker.js"></script>

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
        <li class="active"><a href="admin_deadlines.php">Deadlines</a></li>  
        <li><a href="admin_ta_conflicts.php">Conflicts</a></li>    
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
   
  <button type="button" class="close" title="This page lets you to specify deadlines for different processes."><i class="cus-information"></i></button>
Set Deadline here:  
</div>

<div id="middle_contenttable">



<!--<button class="btn" type="submit"  id="save" ><i class="cus-add"></i>   Add Record</button>-->
<!--<img src="images/actions-delete.png" />-->
<?php
include "connect.php";

$query=mysql_query("SELECT email from course_list");
$query2=mysql_query("SELECT name from ta_list");
$num=mysql_numrows($query);
$num1=mysql_numrows($query2);
$i=0;
$j=0;
$f1= mysql_result($query,$i,"email");
$f2= mysql_result($query2,$j,"name");
while ($i < $num-1)
{
$i++;
$f1 = $f1.", ".mysql_result($query,$i,"email");
}
while ($j < $num1-1)
{
	$j++;
	$f2 = $f2.", ".mysql_result($query2,$j,"name");
}
?>

<?php
if (isset($_POST['set'])){
if (isset($_POST['text1']))
{
 $var= $_POST['text1'] ;
 echo "$var";
}}
?>
</head>
<body>


<form name="form1" method="post" action="deadline_view.php">
<p style="margin-top:20px"><b><center></center></b> </p>
<p>&nbsp;</p>
<p>&nbsp;</p>

<p>
 <center> <label for="date"></label> <input id="demo1" name="text1" value=" Set Deadline Here" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)">  <i class="cus-date"></i></a></center></p>&nbsp;<p>
 <center> <button class="btn" title="Inform TAs to fill their preferences" type="submit" name="set"><i class="cus-email"></i>  Send Mail to TAs to fill Preferences</button></center>  </p><p>
  <center> <button class="btn" title="Inform Instructors to update their course page" formaction="deadline_view1.php" type="submit" name="set"><i class="cus-email"></i>  Send Mail to Instructors to update Course Page</button></center> </p><p>
   <center> <button class="btn" title="Inform Instructors to select TAs" type="submit" formaction="deadline_view2.php" name="set"><i class="cus-email"></i>    Send Mail to Instructors for Selection</button></center> </p>
   
 </form>



<!--<input type="text" name="text1" id="ButtonCreationDemoInput1" value="Instructor: Course Page Update"/> <i id="ButtonCreationDemoButton1" class="cus-date"></i>

  <script>
    $('#ButtonCreationDemoButton1').click(
      function(e) {
        $('#ButtonCreationDemoInput1').AnyTime_noPicker().AnyTime_picker().focus();
        e.preventDefault();
      } );
  </script>
   
<style type="text/css">
  #field2 { background-image:url("clock.png");
    background-position:right center; background-repeat:no-repeat;
    border:1px solid #FFC030;color:#3090C0;font-weight:bold}
  #AnyTime--field2 {background-color:#EFEFEF;border:1px solid #CCC}
  #AnyTime--field2 * {font-weight:bold}
  #AnyTime--field2 .AnyTime-btn {background-color:#F9F9FC;
    border:1px solid #CCC;color:#3090C0}
  #AnyTime--field2 .AnyTime-cur-btn {background-color:#FCF9F6;
      border:1px solid #FFC030;color:#FFC030}
  #AnyTime--field2 .AnyTime-focus-btn {border-style:dotted}
  #AnyTime--field2 .AnyTime-lbl {color:black}
  #AnyTime--field2 .AnyTime-hdr {background-color:#FFC030;color:white}
</style>

--> 

<div id="right_content_style">
<p style="margin-left:100px;  font-weight:normal;  font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; " class="text-info">Instructions:</p>
    <p class="text-info" style="margin-left:10px; line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">  <br/> This page provides you with the provision to set deadlines. </br> </br>
			- <b>Instructor Deadline :</b> Set deadline to inform the instructors to Update their course page.</br> </br>
			- <b>TA Deadline :</b> Set deadline to inform the TAs to fill their preferences.</br> </br> 
            - <b>Instructor Deadline :</b> Set deadline to inform the instructors to select their TAs.</a></br> </br> 
            On clicking the Send button, a mail notification will be sent to all the TAs / Instructors according to the deadline specified.
            </p>
</div>   
    </div>
    
    
<!-- <button class="btn" data-toggle="modal" data-target="#myModal" type="submit" title="Inform Instructors to Update their Course Page" id="save" style="position: relative; top: -38em; margin-left: 500px;margin-top: 60px;" ><i class="cus-email"></i>  Set Instructor Deadline</button>
 
 <button class="btn" data-toggle="modal" data-target="#myModal2" type="submit" title="Set Deadine for Teaching assistants to fill their preferences" id="save" style="position: relative; top: -38em; margin-left: 500px; margin-top: 20px;" ><i class="cus-email"></i>  Set TA Deadline</button>
 
 <button class="btn" data-toggle="modal" data-target="#myModal" type="submit" title="Set Deadine for Instructors to select " id="save" style="position: relative; top: -38em; margin-left: 500px; margin-top: 20px;" ><i class="cus-email"></i>  Set Selection Deadline</button>

	<div class="modal hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Inform Instructors to Update their Course Page</h3>
        </div>
        <form action="send_email_i1.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <label>To</label>
            <input type="text" name="i1" value="<?php /*?><?php echo $f1; ?><?php */?>" class="span6"/><br>
            <label>Subject</label>
    		<input type="text" name="i2" value="smarTAlloc : Update Your Course Page" class="span6"/><br>
            <label>Email</label>
    		<textarea rows="5" name="i3" class="span6">Dear Instuctor,&#10;&#10;This is to inform you that the list of Courses for the current semester has been uploaded on the smarTAlloc website.&#10;You are required to fill your course requirements and other course details on http://14.139.56.179:8083/instructor_mycourse.php by <b>XYZ</b>&#10;&#10;<b>Note: This email is system generated. Do not reply to this mail.</b></textarea><br>
		</div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit_i1" >Send Email</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>   	
        </div>  
	</div>
        </form>
	</div>   
	<div class="modal hide" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Inform Instructors to Update their Course Page</h3>
        </div>
        <form action="send_email_i1.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <label>To</label>
            <input type="text" name="i1" value="<?php /*?><?php echo $f2; ?><?php */?>" class="span6"/><br>
            <label>Subject</label>
    		<input type="text" name="i2" value="Subject" class="span6"/><br>
            <label>Email</label>
    		<textarea rows="5" name="i3" class="span6">Email Content</textarea><br>
		</div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="submit_i1" >Send Email </button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>   	
        </div>  
	</div>
       </form>-->
	</div>
    </div>
    
  <div  style="float: right; position:relative; width: 505px; margin-right:-343px; top:-42.9em;z-index:1; text-decoration:none; border: 2px solid #fff; " >
 
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