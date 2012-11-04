<?php
session_start();
$_SESSION["name"]="Admin";
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Assitants</title>
	<link rel="stylesheet" href="css/styleta.css"  type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
<script>
function myFunction()
{
	
	var x = document.getElementById("file").value; 


	if(x==""){
			alert("No file has been chosen. Upload again!");
		
		}
		
		else if(x.substring(x.indexOf(".")+1)=="xls"){
			alert("Success! Your file has been uploaded. ");
		}
			
	else{
		
			alert(" The uploaded file is not readable. Please upload .xls file. ");
		
		}
}



function myFunction1()
{
	
	var x = document.getElementById("file").value;


	if(x==""){
		
		}
		
		else if(x.substring(x.indexOf(".")+1)=="xls"){
			alert("Please upload your file first. duh!?  ");
		}
			
	else{
		
			alert("Please upload .xls file first.");
		
		}
}

</script>

</head>

<body>

<div id="header"><img src="images/banner1.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li ><a href="am_home.php">Home</a></li>  
        <li class="active"><a href="am_teachingassistants.php" >Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.php">Time Table</a></li>  
        
    </ul>  
</div>  



<div id = "content_wrap">

<a style="margin-left:130px; position:relative; top:-9.6em;z-index:1; " href="logout.php" title="Log Out."><img src="images/1351863022_exit.png"/> </a>


<div id="left_content">
     <div class="alert  alert-info" style=" font-weight:normal; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" data-dismiss="alert" title="Info: Attach files on this page."><i class="cus-information"></i></button>
  Teaching Assistants for this Semester:
</div>
	
    
	<form action="upload_file.php"  method="post" enctype="multipart/form-data" >
	<label for="file" style=" font-weight:normal;  font-weight:normal;  font: 17px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 1000px; " class="text-info"><br/>Upload the list of Teaching Assistants below - </label>
	<input  type="file" name="file" id="file"   /> 
    
    <!--<input type ="submit"  name="submit" value="Upload" />-->
   
     <button class="btn"  type="submit" name="submit"  onclick="myFunction()"  id="hello" title="Upload the xls file here." ><i class="cus-control-eject-blue"></i>   Upload</button>
     <button class="btn" type="submit" name="submit1" formaction="read_ta.php" onclick="myFunction1()" id="move1" title="Go to the TA list you just uploaded" ><i class="cus-table-go"></i>   Move to List</button>
     </form>
     


	</div>
    
   
    
    
    
<div id="right_content">
	<p style="margin-left:100px;  font-weight:normal;  font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; " class="text-info">Instructions:</p>
    <p class="text-info" style="margin-left:10px; line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">  <br/>   	- Upload only .xls files for Teaching Assistants List for the current semester.</br> </br>
			- This list should contain the details of all teaching assistants for the current semester.</br> </br>
			- The excel file should strictly contain the following columns in the same order : </br> </br>
				Name | Programme | Batch | Email | Contact No. </br> </br> 
			- To view and modify the uploaded list, click on <b>'Move to List'</b></br> </br> 
            - Here's a sample file format for you. You can download it from here. - <a href="sample_ta_list.xls"><i class="cus-page-attach"></i>  Sample File</a></p>
</div>
</div>

 
        <div id="clockbox" style="line-height: 1;  position:relative; top:-52.5em;z-index:1; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; color:  #3a87ad; float: right;"></div>
        
        
<div id="lastvisited" style = "line-height: 1; position:relative; top:-52.5em;z-index:5; margin-right: 50px; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 200px; color:  #3a87ad; float: right;">  


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