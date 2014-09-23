<!DOCTYPE html>
<html lang="en">
<head>
<?php
include "connect.php";

session_start();
$member_name = $_SESSION['name_ses'];


?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>B.Tech First Year Courses</title>
		<link rel="stylesheet" href="css/style_ta_webpages.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>       
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
        <li ><a href="ta_results.php" >Results</a></li>  
        
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
 <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 24px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
</div>

<form method="get" action="/search" id="search">
<!--  <input name="q" type="text" size="40" placeholder="Search..." />
--></form>

 
   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 5px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close"  title="This page contains the list of all courses which are available in the current semester and you are free to apply for them.   "><i class="cus-information"></i></button>
  Courses: 
</div>


<div id="middle_contenttable">

<?php
//$tbl_name="course_list";
$ta_email_check=$_SESSION['email_ses'];

$query1="SELECT * FROM temp2 where email='$ta_email_check'";
$result1=mysql_query($query1);
if($result1)
		{
			$row=mysql_fetch_assoc($result1);
			$form=$row['form_submit'];
if($form=='yes')
{
header("location:form_already_submitted.php");
}
else {
$query="SELECT * FROM course_list";
$result=mysql_query($query);

$num=mysql_numrows($result);
//$num=$num+1;
//mysql_close();
?>
<form name= "form1" action="ta_check_choice.php" method="post" enctype="multipart/form-data">
<table id="hor-zebra" summary="Employee Pay Sheet">
<th>#</th>
<th>Course#</th>
<th>Course Name</th>
<th>Level</th>
<th>Instructor</th>
<th>Email</th>
<th>Course Details</th>
<th>Work Expectations</th>
<th>First</th>
<th>Second</th>
<th>Third</th>
<th>No</th>
</tr>



</tr>

<?php
$i=0;
$best="Best";
$okay="Okay";
$maybe="MayBe";
while ($i < $num) {

$f2=mysql_result($result,$i,"c_no");
$f3=mysql_result($result,$i,"year");
$f4=mysql_result($result,$i,"detail");
$f5=mysql_result($result,$i,"expectations");
//$course=$row['Course name'];
$result45 = mysql_query("SELECT * FROM course_list where c_no='$f2'");  //to identify instructor course
 //$course_name=             
					$row45=mysql_fetch_assoc($result45);
			$course_name=$row45['c_name'];
			$instructor=$row45['instructor'];
			$email=$row45['email'];


$name1=$f2.$best ;

//echo "$name1";
$name2=$f2.$okay ;
$name3=$f2.$maybe ;

?>

<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $f2; ?></td>

<td><?php echo $course_name; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $instructor; ?></td>
<td><?php echo $email; ?></td>
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
}
?>
</table>
<input style="visibility:hidden" name="<?php echo $name1 ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="<?php echo $name2 ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="<?php echo $name3 ?>" value="<?php echo $num; ?>" />
<input style="visibility:hidden" name="num" value="<?php echo $num; ?>" />

	</div>
    
    
<div style="top: -33em; position:relative; margin-left: 880px; width: 300px; height: 30px;  ">
<button id="submit" type="submit" class="btn" name="submit1" ><i class="cus-tick"></i> Save Choices</button>
</div>
</form>
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


    
        

<!--
<div id="footer"><img  src="images/contactbanner.png" /></div>-->
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