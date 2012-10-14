<?php
session_start();
$_SESSION["name"] = "Admin";
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Upload Your File!</title>
</head>
<body>

<form action="upload_file.php" method="post"
enctype="multipart/form-data">
<label for="file">Choose File:</label><!--The enctype attribute of the <form> tag specifies which content-type to use when submitting the form. "multipart/form-data" is used when a form requires binary data, like the contents of a file, to be uploaded-->
<input type="file" name="file" id="file" /> <!--The type="file" attribute of the <input> tag specifies that the input should be processed as a file. For example, when viewed in a browser, there will be a browse-button next to the input field-->
<br />
<input type="submit" name="submit" value="Upload" />
</form>

</body>
</html>
