<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>smarTAlloc!</title>
<link href="css/style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />

<script language="javascript" type="text/javascript" src="datetimepicker.js">

</script>

<?php
if (isset($_POST['set'])){
if (isset($_POST['text1']))
{
 $var= $_POST['text1'] ;
 echo "$var";
}}
?>
</head>
<body>


<div id="header"><img src="images/banner-astrid.png" width="1342" height="156" /></div>

<form name="form1" method="post" action="deadline_view.php">
<p style="margin-top:20px"><b><center>Set deadline for filling Course Information</center></b> </p>
<p>&nbsp;</p>


<p>
 <center> <label for="date">date</label> <input id="demo1" name="text1" size="25"><a href="javascript:NewCal('demo1','ddmmmyyyy',true,24)"><img src="images/cal.gif" width="16" height="16" border="0" alt="Pick a date"></a></center></p>
 <center> <input type="submit" name="set">SET</input></center>  
 
 </form>

</body>
</html>



