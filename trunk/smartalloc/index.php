<?
$err=0;
if (isset($_GET['err']))
{
$err=$_GET['err'];	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>smarTAlloc!</title>
	<link rel="stylesheet" href="css/styleloginscreen.css" type="text/css" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
   
</head>

<body>

	<div id="header"><img src="images/banner.png" width="1342" height="156" /></div>
	
    <div id = "content_wrap">
		<div id="left_content">
        
        	 <div id="wrapper">
             <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                  <img src="images/initiate.jpg" data-thumb="images/initiate.jpg" alt="" title="Start the process..."  />
                  <img src="images/work.jpg" data-thumb="images/work.jpg" alt="" title="Be a smart worker..." /></a>
                  <img src="images/coments.jpg" data-thumb="images/coments.jpg" alt=""  title="Post everything..."  />
                  <img src="images/pages.jpg" data-thumb="images/pages.jpg" alt="" title="No more paper work..." />
            	</div>
           	</div>
			</div>
        
        </div>
        
        
        
        <div id= "right_content">
        	<div class="boxed">
				<div id="h1">  Sign in to your account at</br>
  					<b>IIIT Delhi</b>
                </div>

			<form id="hm" action="login.php" method="post">
			<label>Username:</label>
			<input id="email" name="email" type="text" title="Enter your email address here"/> <br/>
			<label>Password:</label>
			<input id="pass" name="password"  type="password" title="Enter password here"/>
			<input id="check" type="checkbox" name="vehicle" value="staysigned">
			<label id="stay" >Stay signed in</label>
			<button id="submit" type="submit"  >Sign in</button>
              
			</form>

			<div id=tp>
				<div align="center"> <a href="loginacess.html" style="text-decoration:underline; font-weight:normal;color:#0063DC; font-size:13px; " >Can't access your account?</a> </div>
			</div>
            
            <?
				if ($err==1)
				{
					echo '<p id="invalid"  summary="datapass"></p>';
					echo "Invalid username/password. Try Again!";
				}
			?>
		</div>
    
        </div>
	</div>


<div id="footer"><img  src="images/contactbanner.png" /></div>
	
    	
<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="js/jquery.nivo.slider.js"></script>
    <script type="text/javascript">
    $(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
</body>
</html>


<?php

//@diti session_start();
if (isset($_COOKIE['email']) && isset($_COOKIE['password'])) {
    

   // $_SESSION['email']=$_COOKIE['email'];
        header('Location: am_home.php');
    }
    

?>