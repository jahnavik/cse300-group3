<?php
include "connect.php";
session_start();
if(!isset($_SESSION['email_ses']))
{
	header("Location: index.php");
}
else if(isset($_SESSION['email_ses']))
{
	$current_session=$_SESSION['email_ses'];
	if($current_session!='astrid@iiitd.ac.in')
	{
		header("Location: unauthorized.html");
	}		
}

    // Get all the data from the "årgang" table
    $result = mysql_query("SELECT * FROM course_list") 
    or die(mysql_error());  
$i=0;
    echo '<table id="hor-zebra" summary="Datapass">
<thead>
    <tr>
        <th scope="col">#</th> 
        <th scope="col">Course No.</th> 
        <th scope="col">Course Name</th> 
        <th scope="col">Instructor(s)</th> 
		<th scope="col">Enrol Size</th> 
        <th scope="col">TAs Reqd.</th> 
		<th scope="col">Email</th> 
		<th scope="col">Contact</th>
		<th scope="col">Actions</th>

    </tr>
</thead>
<tbody>';


 while($row = mysql_fetch_array( $result )) {
        if( $i % 2 == 0 ) {
            $class = " class='odd'";
        } else {
            $class = "";
        }
	
        // Print out the contents of each row into a table
        echo "<tr"  ."><td>"; 
        echo $row['id'];
        echo "</td><td>"; 
        echo $row['c_no'];
        echo "</td><td>"; 
        echo $row['c_name'];
        echo "</td><td>"; 
        echo $row['instructor'];
        echo "</td><td>";
		echo $row['enrol_size'];
        echo "</td><td>";
        echo $row['ta_reqd'];
        echo "</td><td>";        
		echo $row['email'];
        echo "</td><td>"; 
		echo $row['contact'];
		echo "</td><td>";
		echo "<a href=\"admin_course_modify.php?id=". $row['id'] ."\"><img src='images/actions-edit.png'/></a>";
		echo "                 ";
		echo "<a href=\"admin_course_delete.php?id=". $row['id'] ."\"><img src='images/actions-delete.png'/></a> <br>"; 
		echo "</td></tr>"; 
													
    } 

    echo "</tbody></table>";
?>