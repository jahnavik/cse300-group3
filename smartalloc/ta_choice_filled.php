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

 


<?php

$ta_email= $_SESSION['email_ses'];
include "connect.php";
?>

   <div class="alert  alert-info" style=" font-weight:normal; margin-left: 5px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
  <button type="button" class="close"  title="This page contains the list of all courses which are available in the current semester and you are free to apply for them.   "><i class="cus-information"></i></button>

<?php
echo"Your filled choices:";
echo "</div>";
$result2 = mysql_query("SELECT * FROM ta_list where email='$ta_email'");


		
			$row2=mysql_fetch_assoc($result2);
			$choice1=$row2['choice1'];
			$choice2=$row2['choice2'];
			$choice3=$row2['choice3'];


?>
<div id="middle_contenttable">
<table id="hor-zebra" summary="Employee Pay Sheet">
<th>1st Preference</th>
<th>2nd Preference</th>
<th>3rd Preference</th>
</tr>
<tr>
<td><?php echo $choice1; ?></td>
<td><?php echo $choice2; ?></td>

<td><?php echo $choice3; ?></td>
</tr>
</table>
<form action="ta_firstyear_courses.php" method="POST">

<input type="submit" class = "btn" style = "float: left; margin-left:300px; margin-top: 30px;" name="submit" value="Reset Your Choices">
<input type="submit" class = "btn" style = "float: left; margin-left:300px; margin-top: 30px;" formaction="move_to_form.php" name="submit1" value="Move to Form">

</form>
</div>
</body>
</html>