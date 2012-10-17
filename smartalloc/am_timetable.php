<?php
session_start();
$_SESSION["name"]="Admin";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Assitants</title>
	<link rel="stylesheet" href="css/styleta.css"  type="text/css" />
 	<link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
</head>

<body>

<div id="header"><img src="images/banner1.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li ><a href="am_home.html">Home</a></li>  
        <li ><a href="am_teachingassistants.php">Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.php">Time Table</a></li>  
        
    </ul>  
</div>  


<div id = "content_wrap">

<div id="left_content">
    <div id="h1" style=" font-weight:normal;  font-size:40px; ">  Time Table for this <b>Semester </b></div>
	
    
	<form action="upload_file.php" method="post" enctype="multipart/form-data" >
	<label for="file" style=" font-weight:normal;  font-size:20px; "><br/><br/><br/>Upload the Time Table here:</label>
	<input  type="file" name="file" id="file"   /> 
    
    <!--<input type ="submit"  name="submit" value="Upload" />-->
    </br>
     <button class="btn" type="submit" name="submit" id="hello" ><i class="cus-control-eject-blue"></i>   Upload</button>
     <button class="btn" type="submit" formaction="read_ta.php" id="move1" ><i class="cus-user-go"></i>   Move to Form</button>
     </form>



	</div>
    
           
</div>
</div>
</div>


<script src="js/bootstrap.js"></script>
</body>
</html>