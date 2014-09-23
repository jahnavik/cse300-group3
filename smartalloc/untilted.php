<?php
include "config.php";
$per_page = 3; 

//getting number of rows and calculating no of pages
$sql = "select * from ta_list";
$rsd = mysql_query($sql);
$count = mysql_num_rows($rsd);
$pages = ceil($count/$per_page)
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teaching Assitants List</title>
		<link rel="stylesheet" href="css/stylelist.css" type="text/css" media="screen" />
        <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=Oswald' type='text/css' />
        <link rel="stylesheet" href="cus-icons.css" type="text/css"  />
    	<link rel="stylesheet" href="css/bootstrap.css" type="text/css"  />
 		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script> 
        
		<script type="text/javascript">
	
	$(document).ready(function(){
		
	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};
	

   //Default Starting Page Results
   
	$("#pagination li:first").css({'color' : '#FF0084'}).css({'border' : 'none'});
	
	Display_Load();
	
	$("#content").load("untilted.php?page=1", Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){
			
		Display_Load();
		
		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'color' : '#0063DC'});
		
		$(this)
		.css({'color' : '#FF0084'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;
		
		
		$("#content").load("untilted.php?page=" + pageNum, Hide_Load());
	});
	
	
});
	</script>
    <style>
a
{
text-decoration:none;
color:#B2b2b2;

}

a:hover
{

color:#DF3D82;
text-decoration:underline;

}
#loading {
	 
width: 100%; 
position: absolute;
}

#pagination
{
text-align:center;
margin-left:600px;

}
#pagination li{	
list-style: none; 
float: left; 
margin-right: 16px; 
padding:5px; 
border:solid 1px #dddddd;
color:#0063DC; 
}
#pagination li:hover
{ 
color:#FF0084; 
cursor: pointer; 
}


</style>
      
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
  <input name="q" type="text" size="40" placeholder="Search..." />
</form>


 <div class="alert  alert-info" style=" font-weight:normal; margin-left:20px; width:800px; line-height: 1; font: 20px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
   <button type="button" class="close" title="This page contains the list of this semester's teaching assistants. "><i class="cus-information"></i></button>
 	Teaching Assistants for the current semester: 
	</div>



<div id="middle_contenttable">
<?php

$per_page = 3; 

if($_GET)
{
$page=$_GET['page'];
}
else
{
	$page=1;
}
$start = ($page-1)*$per_page;

$query="SELECT * FROM ta_list order by id limit $start, $per_page";
$result=mysql_query($query);
$num=mysql_numrows($result);
//echo $num;
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
    
	
<div id="loading" ></div>
	<div id="content" ></div>
    <table width="800px">
	<tr><Td>
			<ul id="pagination">
				<?php
				//Show page links
				
				for($i=1; $i<=$pages; $i++)
				{
					echo '<li id="'.$i.'">'.$i.'</li>';
				}
				?>
	</ul>	
	</Td></tr></table>

<div id="footer"><img  src="images/contactbanner.png" /></div>

<script src="js/bootstrap.js"></script>
</body>
</html>