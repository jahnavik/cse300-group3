<?php
session_start();
$ta_email= $_SESSION['email_ses'];
include "connect.php";
$member_name = $_SESSION['name_ses'];


//$result2 = mysql_query("SELECT * FROM temp1 where email='$ta_email'") 
//    or die(mysql_error());  
$b="";
$o="";
$m="";
$c="";
$d="";
//$count=mysql_num_rows($result2);
//if($count==1)
	//	{
			//$row2=mysql_fetch_assoc($result2);
			//$check_status=$row2['form_submit'];
			//if($check_status=="yes")
			//{
			
			//echo"choice_is_saved";
			$result3 = mysql_query("SELECT * FROM saved_choice where email='$ta_email'") 
    or die(mysql_error());  
    if($result3)
		{
			$row3=mysql_fetch_assoc($result3);
			$c1=$row3['choice1'];
			$cx1=explode(" ", $c1);
			
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
		//	echo"$b";
			$c2=$row3['choice2'];
			$cx2=explode(" ", $c2);
			
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

$c3=$row3['choice3'];
$cx3=explode(" ", $c3);
			
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



//echo"$c1";

   

}




			
			
			

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Application Form</title>
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
			<li><a href="ta_firstyear_courses.php">B.Tech Courses</a></li>

        </ul>
        
        </li>
        
        </li>  
        <li><a href="ta_courses_availaibility.php" >Availaibility</a></li>  
        <li class="active"><a href="ta_application_form.php" >Application</a></li>  
        <li ><a href="ta_results.php" >Results</a></li>  
        
    </ul>  
</div>  

 


<div id = "content_wrap">
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff;" >
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>

 <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 24px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>
 </div>
    
      <div class="alert  alert-info" style=" font-weight:normal;  margin-left: 150px; width: 1000px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" data-dismiss="alert" title="Fill in all your details accordingly."><i class="cus-information"></i></button>
  Teaching Assistantship Application Form:
</div>
 <div id="left_content1">
	  
      <form action="ta_form_submit.php" method="post">
      <p  class = "text-info" style=" font-weight:normal;  margin-top: 20px; margin-left: 10px; width: 1000px; line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;" > 
      <i  class="cus-bullet-star" ></i> 
      Languages Known: &nbsp &nbsp <textarea rows="3" name="q1" id="q1" placeholder=" Enter your known languages ..." required></textarea> </br> </br> 
      
       <i  class="cus-bullet-star" ></i>  Tools Used: &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp   <textarea rows="3" name="q2" id="q2" placeholder="Enter the tools you have worked with ..." required></textarea> </br> </br> 
       
       <i  class="cus-bullet-star" ></i> Remarks: &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp <textarea rows="3" name="q3" id="q3" placeholder="Enter your remarks..." required></textarea>  
     </br>
     </br>
     
     </p> 
      
   &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp &nbsp  &nbsp &nbsp &nbsp &nbsp  
   
   <button class="btn " type="submit" name="submit"  title="Submit your final application form " ><i class=" cus-report-go"></i> Submit Form</button>
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
 echo"$b";
  
?>
</textarea>

   <textarea disabled="disabled" name="t2" rows="2"  style=" margin-top: 15px; width: 180px; margin-left: 10px;">
   <?php
 echo"$c";
?>
   </textarea>&nbsp;
   
   <textarea disabled="disabled" name="t3" rows="2"  style=" margin-top: 15px; width: 180px; margin-left: 10px;" >
   <?php
 echo"$d";
?>
   </textarea>
   
    </div>
     
        <div style= "width: 150px; height: 230px; float: none;   margin-top: 15px; margin-left: 180px;">
        
        <textarea disabled="disabled" name="t1" id="t1" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;"> <?php
echo"$c1";
?>
</textarea>

   <textarea disabled="disabled" name="t2" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;">
   <?php
 echo"$c2";
?>
   </textarea>&nbsp;
   
   <textarea disabled="disabled" name="t3" rows="2"  style=" margin-top: 15px; width: 120px; margin-left: 10px;" >
   <?php
 echo"$c3";
?>
   </textarea>
   
    
  </div>
  

	</div>
 
 <div id="right_contentmy">
  
  	   <!--<button class="btn " type="submit" name="submit" action="ta_form_submit.php" title="Submit your final application form " ><i class=" cus-report-go"></i> Submit Form</button>-->
       
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