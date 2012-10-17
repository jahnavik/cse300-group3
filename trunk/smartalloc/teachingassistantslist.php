

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Assitants List</title>
<link rel="stylesheet" href="css/stylelist.css" type="text/css" media="screen" />
         <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>       
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
 
<form class="form-search">
  <div class="input-append">
    <input type="text" class="span2 search-query">
    <button type="submit" class="btn"><i class="cus-zoom"></i>   Search</button>
  </div>
  <div class="input-prepend">
    <button type="submit" class="btn"><i class="cus-zoom"></i>   Search</button>
    <input type="text" class="span2 search-query" placeholder="Enter here...">
  </div>
</form>

<?php include("read_display.php"); ?>
<button class="btn" type="submit"  id="save" ><i class="cus-add"></i>   Add</button>
<button class="btn" type="submit"  id="save" ><i class="cus-page-edit"></i>   Edit</button>
<button class="btn" type="submit"  id="save" ><i class="cus-table-save"></i>   Save</button>
<button class="btn" type="submit"  id="save" ><i class="cus-cross"></i>   Delete</button>



</div>
<script src="js/bootstrap.js"></script>
</body>
</html>



