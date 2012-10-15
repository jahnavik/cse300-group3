<?php
session_start();
$_SESSION["name"]="Admin";
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Course Information</title>
<link href="css/styleta.css" rel="stylesheet" type="text/css" />
 <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css/buttonpage.css" />
        <link rel="stylesheet" type="text/css" href="css/buttonstyle.css" />
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
</head>


<body>
<div id="header"><img src="images/banner1.png" width="1342" height="156" /></div>


<div id="container">  
    <ul id="nav">  
        <li ><a href="homepage.html">Home</a></li>  
        <li ><a href="am_teachingassistants.php">Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.html">Time Table</a></li>  
        
    </ul>  
</div>  







<div id = "content_wrap">

<div id="left_content">
    <div id="h1" style=" font-weight:normal;  font-family: serif;   font-size:40px; ">  Courses Available in the <b>Current Semester </b></div>
	
    
	<form action="upload_file.php" method="post" enctype="multipart/form-data" id="form1">
	<label for="file" style=" font-weight:normal;  font-family: Tahoma;   font-size:20px; "></br></br></br>Upload the course info here:</label>
	<input  type="file" name="file" id="file" /> 
	<br />
	
	

				<div class="button-wrapper" >
					<a href="upload_file.php"  method="post" enctype="multipart/form-data" class="a-btn">
						<span class="a-btn-text">Upload </span> 
						<span class="a-btn-slide-text">FILE!</span>
						<span class="a-btn-icon-right"><span></span></span>
					</a>
					
				</div>
                </form>

 	</div>
    
           
</div>
</div>
</div>


</body>
</html>



