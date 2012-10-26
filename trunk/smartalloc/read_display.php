<?php
    // Make a MySQL Connection
    mysql_connect("localhost", "root", "test123") or die(mysql_error());
    mysql_select_db("smartalloc") or die(mysql_error());

    // Get all the data from the "årgang" table
    $result = mysql_query("SELECT * FROM ta_list") 
    or die(mysql_error());  
$i=0;
    echo '<table id="pattern-style-a" summary="Datapass">
<thead>
    <tr>
        <th scope="col">S no.</th> 
        <th scope="col">TA Name</th> 
        <th scope="col">Programme</th> 
        <th scope="col">Batch</th> 
        <th scope="col">Email</th> 
		<th scope="col">Contact</th>
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
        echo "<tr"  . "><td>"; 
        echo $row['id'];
        echo "</td><td>"; 
        echo $row['name'];
        echo "</td><td>"; 
        echo $row['programme'];
        echo "</td><td>"; 
        echo $row['batch'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>"; 
		echo $row['contact'];
        echo "</td></tr>"; 
		
    } 

    echo "</tbody></table>";
?>