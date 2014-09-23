<?php
session_start();
$email= $_SESSION['email_ses'];
$member_name = $_SESSION['name_ses'];
include "connect.php";
$result1 = mysql_query("SELECT * FROM course_list where email='$email'");  //to identify instructor course
              
			$row=mysql_fetch_assoc($result1);
			$course_no=$row['c_no'];
			$course_name=$row['c_name'];
			$contact=$row['contact'];

			

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>My Course</title>
	<link rel="stylesheet" href="css/style_ins.css"  type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
    <script	type="text/javascript" src="jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap-dropdown.js"></script>
	<script type="text/javascript" src="bootstrap-button.js"></script>
	<!--<script>
		jQuery(function($){
			$('select').each(function(i, e){
				if (!($(e).data('convert') == 'no')) {
					$(e).hide().wrap('<div class="btn-group" id="select-group-' + i + '" />');
					var select = $('#select-group-' + i);
					var current = ($(e).val()) ? $(e).val(): '&nbsp;';
					select.html('<input type="hidden" value="' + $(e).val() + '" name="' + $(e).attr('name') + '" id="' + $(e).attr('id') + '" class="' + $(e).attr('class') + '" /><a class="btn" href="javascript:;">' + current + '</a><a class="btn dropdown-toggle" data-toggle="dropdown" href="javascript:;"><span class="caret"></span></a><ul class="dropdown-menu"></ul>');
					$(e).find('option').each(function(o,q) {
						select.find('.dropdown-menu').append('<li><a href="javascript:;" data-value="' + $(q).attr('value') + '">' + $(q).text() + '</a></li>');
						if ($(q).attr('selected')) select.find('.dropdown-menu li:eq(' + o + ')').click();
					});
					select.find('.dropdown-menu a').click(function() {
						select.find('input[type=hidden]').val($(this).data('value')).change();
						select.find('.btn:eq(0)').text($(this).text());
					});
				}
			});
		});
	</script>-->
</head>

<body>

<div id="header"><img src="images/banner3.png" width="1342" height="156" /></div>


<div id="container">  
    <ul id="nav">  
        <li class="active"><a href="instructor_home.php" title="Your dashboard">Home</a>
         <li><a href="instructor_courses.php" >My Course</a></li>  
        <li><a href="instructor_ta_selection.php" >TA Selection</a>
             <ul>
			<li><a href="instructor_courses_tas.php">Select TAs</a></li>
			
        </ul>
        
        </li> 
        <li><a href="instructor_ta_results.php" >Results</a></li>  
         
        
    </ul>  
</div>  
 


<div id = "content_wrap">
  <a style="margin-left:214px; position:relative; top:-9.6em;z-index:1;  " href="logout.php" title="Log Out."><img src="images/1351863022_exit.png"/> </a>
  <div style = "float:left; position: relative; margin-left:-1180px; margin-top: 26px; line-height: 1; font: 24px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 130px; font-weight:normal; "><?php echo "$member_name"; ?>
 </div>

    
   <div class="alert  alert-info" style=" font-weight:normal; float:inherit; margin-left: 150px; width: 1000px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
   
  <button type="button" class="close" data-dismiss="alert" title="Fill out all your course details on on this page."><i class="cus-information"></i></button>
  Some fields are empty: Complete form and send again!!
</div>
  
  
  <div id="left_contentmy">
  
  <div class = "text-info" style="width: 150px; float: left; height: 250px; font-weight:normal;  margin-top: 20px; margin-left: 10px; line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  
  <i  class="cus-bullet-star" ></i> Course No:  </br></br> </br> 
  <i  class="cus-bullet-star" ></i> Course Name:  </br></br> </br>      
  <i  class="cus-bullet-star" ></i> Course Year: </br></br> </br>          
  <i  class="cus-bullet-star" ></i>  Course Details: 
  </div>
  

  <div class = "text-info" style="width: 250px; float: left; height: 250px; font-weight:normal;  margin-top: 20px; margin-left: 10px; line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">

    <input disabled="disabled" type="text" placeholder="<?php echo "course_no";?>"></br></br> 
    <input disabled="disabled" type="text" placeholder=" Enter your course name  ..."></br></br>
	<select style="">
		<option name=one selected>First Year Course</option>
		<option name=two value=two>Second Year Course</option>
		<option name=three value=one>Advanced Course</option>
	</select> </br> </br>
  <textarea rows="3"  placeholder="Enter your course details  ..."></textarea>
   
   </div>
   
 
  
    <div class = "text-info" style="width: 230px; float: right; height: 250px; top: -450em; margin-right: 80px; font-weight:normal;  margin-top: 20px;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 100px;">
 
 
  <textarea rows="3" placeholder="Enter the details about what you expect from your teaching assistants  ..."></textarea> </br> </br> 
  <input type="text" placeholder="Enter any request if you have for  ..."></br> </br>      
  <input disabled="disabled" type="text" placeholder="Enter your email-id ... "></br> </br>
  <input disabled="disabled" type="text" placeholder="Enter your contact no ... ">       
  </div>  
  
    
   <div class = "text-info" style="width: 210px; float: none; height: 250px;  font-weight:normal;  margin-top: 20px; margin-left:520px; line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  
  <i  class="cus-bullet-star" ></i> Work Expectations:  </br></br> </br> </br></br> 
  <i  class="cus-bullet-star" ></i> TA(s) Request:  </br></br> </br>      
  <i  class="cus-email" ></i>  &nbsp &nbsp  Email-Id: </br></br> </br>          
  <i  class="cus-vcard" ></i>    &nbsp &nbsp  Contact No: 
  </div>
  
 <div style="height:20px;width:100px;float:right;margin-right:70px;margin-left:0px;margin-top:20px;postion:absolute;">
  
  <button class="btn btn-info" style=" " type="submit" name="sendinfo" formaction="#" title="Send your course info" ><i class="cus-tick"></i> Send</button>	   
       
  </div>  
  
  </div>
      
        
      
       
    

  

             <div id="clockbox" style="line-height: 1;  position:relative; top:-49.7em;z-index:1; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color:  #3a87ad; float: right;"></div>
        
        
<div id="lastvisited" style = "line-height: 1; position:relative; top:-48.2em; z-index:1; margin-right: -305px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 150px; color:  #3a87ad; float: right;">  
 
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