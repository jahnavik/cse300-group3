<?php
    // Make a MySQL Connection
    mysql_connect("localhost", "root", "test123") or die(mysql_error());
    mysql_select_db("smartalloc") or die(mysql_error());

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
		<th scope="col">Enrollment Size</th> 
        <th scope="col">TAs Required</th> 
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
		echo "<a href=\"modify_c.php?id=". $row['id'] ."\"><img src='images/actions-edit.png'/></a>";
		echo "                 ";
		echo "<a href=\"delete_c.php?id=". $row['id'] ."\"><img src='images/actions-delete.png'/></a> <br>"; 
		echo "</td></tr>"; 
													
    } 

    echo "</tbody></table>";
?>