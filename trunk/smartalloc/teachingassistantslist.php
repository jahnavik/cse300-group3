<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Assitants List</title>
		<link rel="stylesheet" href="css/stylelist.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>       
</head>


<body>
<div id="header"><img src="images/banner1.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li><a href="am_home.php">Home</a></li>  
        <li class="active"><a href="teachingassistantslist.php">Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.php">Time Table</a></li>  
        
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


<div id = "content_wrap">   
 
<div style="float: right; position:relative; width: 25px; margin-right: 10px; top:-11.2em;z-index:1; text-decoration:none; border: 2px solid #fff;">
 <a href="logout.php" title="Sign Out"> <img src="images/1351863022_exit.png"/> </a>
</div>
 

<form method="get" action="/search" id="search">
<!--  <input name="q" type="text" size="40" placeholder="Search..." />-->
</form>


 <div class="alert  alert-info" style=" font-weight:normal; margin-left:20px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
   <button type="button" class="close" title="This page contains the list of this semester's teaching assistants. "><i class="cus-information"></i></button>
 	Teaching Assistants for the current semester: 
	</div>



<div id="middle_contenttable">
<?php
include "connect.php";
$tbl_name="ta_list";
$query="SELECT * FROM $tbl_name";
$result=mysql_query($query);
$num=mysql_numrows($result);
//$num=$num+1;

?>

<form name="form" action="modify.php" method="post" enctype="multipart/form-data">
<table id="hor-zebra" summary="Datapass">
<th>#</th>
<th>Name</th>
<th>Programme</th>
<th>Batch</th>
<th>Email</th>
<th>Contact</th>
<th>Action</th>
</tr>

<?php
$i=0;

while ($i<$num) {
$modale="modale";
$modald="modald";
$f1=mysql_result($result,$i,"id");
$f2=mysql_result($result,$i,"name");
$f3=mysql_result($result,$i,"programme");
$f4=mysql_result($result,$i,"batch");
$f5=mysql_result($result,$i,"email");
$f6=mysql_result($result,$i,"contact");
$modale=$modale.$f1;
$modald=$modald.$f1;
?>

<tr>
<td><?php echo $i+1; ?></td>
<td><?php echo $f2; ?></td>
<td><?php echo $f3; ?></td>
<td><?php echo $f4; ?></td>
<td><?php echo $f5; ?></td>
<td><?php echo $f6; ?></td>

<td><a href="#<?php echo $modale; ?>" data-toggle="modal"><img src='images/actions-edit.png'/></a>
<a href="#<?php echo $modald; ?>" data-toggle="modal"><img src='images/actions-delete.png'/></a></td> 
<!--<a href="#myModal" role="button" class="btn" data-toggle="modal">Launch Modal</a>
-->
 <div class="modal hide" id="<?php echo $modale; ?>" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Edit Record</h3>
        </div>
        <form action="modify.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <label>Name</label>
            <input type="text" name="e2" class="span4" value="<?php echo $f2; ?>"/><br>
            <label>Programme</label>
    		<input type="text" name="e3" class="span4" value="<?php echo $f3; ?>"/><br>
            <label>Batch</label>
    		<input type="text" name="e4" class="span4" value="<?php echo $f4; ?>"/><br>
            <label>Email</label>
    		<input type="text" name="e5" class="span4" value="<?php echo $f5; ?>"/><br>
            <label>Contact</label>
    		<input type="text" name="e6" class="span4" value="<?php echo $f6; ?>"/><br>
            <input type="hidden" name="e1" value="<?php echo $f1; ?>">
		</div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="edit" >Save</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>   	
        </div>  
       </form>
</div>

 <div class="modal hide" id="<?php echo $modald; ?>" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-footer">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 style="text-align:left; font-style:normal; font-weight:lighter; font:'Palatino Linotype', 'Book Antiqua', Palatino, serif;">Are you sure you want to delete <b><?php echo $f2; ?></b>?</h4>
       <!-- </div>-->
        <form action="delete.php" method="POST" enctype="multipart/form-data">
		<!--<div class="modal-body">-->
            <input type="hidden" name="d1" value="<?php echo $f1; ?>">
		<!--</div>-->
        <!--<div class="modal-footer">-->
        <center>
        <button type="submit" class="btn btn-primary" name="delete" >Yes</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">No</button>   	
        </center>
        </div>
       </form>
</div>
</tr>

<?php
$i++;
}
?>
</table>
</form>

</div>
    
    <button class="btn" data-toggle="modal" data-target="#myModal" type="submit" title="Add a new record" id="save" style="position: relative; top: -38em; margin-left: 900px;" ><i class="cus-add"></i>   Add Record</button>
 	
    <div class="modal hide" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModelLabel" aria-hidden="true">
		<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h3>Add a New Record</h3>
        </div>
        
	<form action="create.php" method="POST" enctype="multipart/form-data">
		<div class="modal-body">
            <label>Name</label>
            <input type="text" name="i2" class="span4"/><br>
            <label>Programme</label>
    		<input type="text" name="i3" class="span4"/><br>
            <label>Batch</label>
    		<input type="text" name="i4" class="span4"/><br>
            <label>Email</label>
    		<input type="text" name="i5" class="span4"/><br>
            <label>Contact</label>
    		<input type="text" name="i6" class="span4"/><br>
		</div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-primary" name="add" >Add</button>
        <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>   	
        </div>  
	</div>
    </form>
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