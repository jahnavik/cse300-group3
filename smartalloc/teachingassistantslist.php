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
        <li><a href="am_home.html">Home</a></li>  
        <li class="active"><a href="am_teachingassistants.php">Teaching Assistants</a></li>  
        <li><a href="am_courseinfo.php">Course Info</a></li>  
        <li><a href="am_timetable.php">Time Table</a></li>  
        
    </ul>  
</div>  


<div id = "content_wrap">   
 <a style="margin-left:155px; font-size:16px; text-decoration:underline;" href="logout.php">Sign Out</a> 

<div id="middle_content">
	<style>
#search {
	
	float:right;
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
<form method="get" action="/search" id="search">
  <input name="q" type="text" size="40" placeholder="Search...." />
</form>
<button class="btn" type="submit"  id="save" ><i class="cus-add"></i>   Add Record</button>
<?php include("read_display.php"); ?>
	</div>
</div>
<div id="footer"><img  src="images/contactbanner.png" /></div>
<script src="js/bootstrap.js"></script>
</body>
</html>