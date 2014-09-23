<?php
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
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
	<script type="text/javascript" src="fancybox/jquery.fancybox-1.3.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox-1.3.4.css" media="screen" />
    <script type="text/javascript" src="fancybox/video.js"></script>

</head>
<body>

	<div id="header"><img src="images/banner.png" width="1342" height="156" /></div>
    <a class="video" style="top: 1em; 	z-index:50; margin-left: 1240px; position: absolute;" title="smarTAlloc! Teaser" href=" http://www.youtube.com/watch?v=XcmHoPGqz8k?fs=1&amp;autoplay=1"><img src="images/twitter.gif" alt="" /></a>
    
    <div id = "content_wrap">
    	<div id="left_content">
        
        	 <div id="wrapper">
             <div class="slider-wrapper theme-default">
                <div id="slider" class="nivoSlider">
                  <img src="images/initiate.jpg" data-thumb="images/initiate.jpg" alt="" title="Start the process..."  />
                  <img src="images/work.jpg" data-thumb="images/work.jpg" alt="" title="Be a smart worker..." />
                  <img src="images/coments.jpg" data-thumb="images/coments.jpg" alt=""  title="Post everything..."  />
              
            	</div>
           	</div>
			</div>
       </div>
        
        
        
        <div id= "right_content"  style=" font: 15px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif; min-width: 90px;">
        	<div class="boxed" >
				<div id="h1" >  Sign in to your account at</br>
  					<b>IIIT Delhi</b>
                    </br></br></br>
                </div>

			    <form  action="login.php" method="post">
   					<fieldset id="inputs">
        				<input id="username" name="email" type="text" placeholder="Username" autofocus required>   
        				<input id="password" name="password" type="password" placeholder="Password" required>
    				</fieldset>
                     <div id=err style=" width: 300px; height: 10px; align : left; color: #C00; font-weight:normal;  line-height: 1; font: 14px/1.5em Verdana, Geneva, Arial, Helvetica, sans-serif;  ">
            
     	
			<?php	if ($err==1)
				{
					echo '<p id="invalid"  summary="datapass">';
					echo "<strong> Invalid username/password. Try Again!</strong> </p>";
				}
				
				
				if ($err==2)
				{
					echo '<p id="invalid"  summary="datapass"></p>';
					echo "Please enter Username or Password.";
				}
			?>    

            </div>
 
    				<fieldset id="actions">
        				<input  type="submit" id="submit" value="Sign in">
                        <input style="  cursor: pointer;   float: left; margin-left: 20px;" type="checkbox" name="vehicle" value="staysigned">
        				<label >&nbsp; Stay signed in</label>  
                	</fieldset>
               </form>
                 
<a style="text-decoration:underline; float: left; margin-left: 50px;" href="loginacess.html"></br>Can't access your account?</a>
           

	</div>
   </div>
</div>


<div id="footer"><img  src="images/contactbanner.png" /></div>
	
<!--<script type="text/javascript" src="scripts/jquery-1.7.1.min.js"></script>-->
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