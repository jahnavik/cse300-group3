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
alert("Success! Your file has been uploaded.");
}
</script>

</head>

<body>

<div id="header"><img src="images/banner1.png" width="1342" height="156" /></div>

<div id="container">  
    <ul id="nav">  
        <li ><a href="am_home.html">Home</a></li>  
        <li class="active"><a href="am_teachingassistants.php" >Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.php">Time Table</a></li>  
        
    </ul>  
</div>  


<div id = "content_wrap">
 <a style="margin-left:90px;font-size:16px;text-decoration:underline;" href="logout.php">Sign Out</a>

<div id="left_content">
     <div class="alert  alert-info" style=" font-weight:normal; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close" data-dismiss="alert" title="Info: Attach files on this page."><i class="cus-information"></i></button>
  Teaching Assistants for this Semester:
</div>
	
    
	<form action="upload_file.php" method="post" enctype="multipart/form-data" >
	<label for="file" style=" font-weight:normal;  font-weight:normal;  font: 17px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 1000px; " class="text-info"><br/>Upload the list of Teaching Assistants here:</label>
	<input  type="file" name="file" id="file"   /> 
    
    <!--<input type ="submit"  name="submit" value="Upload" />-->
   
     <button class="btn"  type="submit" name="submit"  onclick="myFunction()"  id="hello" title="Upload the xls file here." ><i class="cus-control-eject-blue"></i>   Upload</button>
     <button class="btn" type="submit" name="submit1" formaction="read_ta.php" id="move1" title="Go to the TA list you just uploaded" ><i class="cus-user-go"></i>   Move to Form</button>
     </form>
     


	</div>
    
    
<div id="right_content">
	<p style="margin-left:100px;  font-weight:normal;  font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px; " class="text-info">Instructions:</p>
    <p class="text-info" style="margin-left:10px; line-height: 1; font: 12px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">  <br/>- Only xls file should be uploaded here for teaching assistant list. </p>
</div>
</div>

<div id="footer"><img  src="images/contactbanner.png" /></div>
<script src="js/bootstrap.js"></script>
</body>
</html>