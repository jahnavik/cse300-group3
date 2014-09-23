<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>B.Tech First Year Courses</title>
		<link rel="stylesheet" href="css/style_ta_webpages.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>       

<script>
var NewCount = 0

function KeepCount() {
alert('Inside keep count');

if (NewCount >=2)
{
alert('Pick Just ONE Please')
 return false;
}

else
{
NewCount = NewCount + 1;
}
</script>
</head>


<body>
<div id="header"><img src="images/banner4.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li ><a href="ta_home.html" title="Your dashboard">Home</a></li>  
     	<li class="active"><a href="ta_courses.html" >Courses</a>
        <ul>
		    <li><a href="ta_firstyear_courses.php">B.Tech First Year Courses</a></li>
			<li><a href="ta_secondyear_courses.php">B.Tech Second Year Courses</a></li>
			<li><a href="ta_thirdyear_courses.php">B.Tech Advanced Courses</a></li>
        </ul>
        </li> 
        <li><a href="ta_courses_availaibility.html" >Availaibility</a></li>  
        <li><a href="ta_application_form.php" >Application</a></li>  
        <li ><a href="ta_results.html" >Results</a></li>  
        
    </ul>  
</div> 
	<style>
	
	
#search {
	
	float:right;
	margin-right:100px;
}

#search input[type=text] {
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

#search input[type=text]:focus {
    width: 130px;
    }
</style>

<div id = "content_wrap1">   
 <a style="margin-left:223px; position:relative; top:-9.6em;z-index:1; " href="logout.php" title="Log Out."><img src="images/1351863022_exit.png"/> </a>
 
    
<form method="get" action="/search" id="search">
  <input name="q" type="text" size="40" placeholder="Search..." />
  
</form>

 
   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 150px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" data-dismiss="alert" title="This page contains the list of BTech first year courses which are available in the current semester and you are free to apply for them.   "><i class="cus-information"></i></button>
  B.Tech First Year Courses: 
</div>

<div id="middle_content1">


<?php
$host="localhost";
$username="root";
$password="";
$database="smartalloc";
//$tbl_name="courses";

mysql_connect($host,$username,$password);
@mysql_select_db($database) or die( "Unable to select database");
$query1="SELECT * FROM deadline where action='TA_form_filling'";
$result1=mysql_query($query1);
if($result1)
		{
			$row=mysql_fetch_assoc($result1);
			$deadline_ts=$row['deadline'];
			
			 
		}
$current_ts=time();
if($current_ts < $deadline_ts) {
header("location:deadline_form_over.php");


}
else
{
$query="SELECT * FROM courses";
$result=mysql_query($query);

$num=mysql_numrows($result);
//$num=$num+1;
//mysql_close();
?>
<form name= "form1" action="ta_check_choice.php" method="post" enctype="multipart/form-data">
<table id="hor-zebra" summary="Employee Pay Sheet">
<tr>
<th>S.No</th>
<th>Course No</th>
<th>Course Name</th>
<th>Course Level</th>

<th>Course Instructor</th>
<th>Instructor Email</th>
<th>Course Details</th>
<th>Work Expectations</th>
<th>Best</th>
<th>Okay</th>
<th>Maybe</th>
<th>No</th>
</tr>


<?php
$i=0;
$best="Best";
$okay="Okay";
$maybe="MayBe";
while ($i < $num) {

$f2=mysql_result($result,$i,"course_no");
//echo"$f2";
$f3=mysql_result($result,$i,"year");
//echo"$f3";
$f4=mysql_result($result,$i,"detail");
$f5=mysql_result($result,$i,"expectations");
$f6=mysql_result($result,$i,"course_name");
$f7=mysql_result($result,$i,"size");
$f8=mysql_result($result,$i,"ta_demand");
$f9=mysql_result($result,$i,"instructor");
$f11=mysql_result($result,$i,"email");
$f10=mysql_result($result,$i,"contact");
//$course=$row['Course name'];


$name1=$f2.$best ;

//echo "$name1";
$name2=$f2.$okay ;
$name3=$f2.$maybe ;
?>
<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f6; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f9; ?></td>
<td><?php echo $f11; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>

<td><input type='radio' name='<?php echo $f2 ?>' value="Best" /></td>

<td><input type='radio' name='<?php echo $f2 ?>' value="Okay" /></td>


<td><input type='radio' name='<?php echo $f2 ?>' value="MayBe" /></td>
<td><input type='radio' name='<?php echo $f2 ?>' value="No" checked /></td>
</tr>

<?php
$i++;
}
}
?>
</table>
<input style="visibility:hidden" name="<?php echo $name1 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="<?php echo $name2 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="<?php echo $name3 ?>" value="<?php echo $num; ?>" />

<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />


<button id="submit" type="submit" class="btn" name="submit1" >Save and Move to Form</button>

</form>
	</div>
</div>

   <div id="clockbox" style="line-height: 1;  position:relative; top:-55em;z-index:1; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color:  #3a87ad; float: right;"></div>
        
        
<div id="lastvisited" style = "line-height: 1; position:relative; top:-53.5em; z-index:1; margin-right: -294px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 150px; color:  #3a87ad; float: right;">  


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