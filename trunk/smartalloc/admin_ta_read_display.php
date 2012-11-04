<?php
    // Make a MySQL Connection
    mysql_connect("localhost", "root", "test123") or die(mysql_error());
    mysql_select_db("smartalloc") or die(mysql_error());

    // Get all the data from the "årgang" table
    $result = mysql_query("SELECT * FROM ta_list") 
    or die(mysql_error());  
$i=0;
    echo '<table id="hor-zebra" summary="Datapass">
<thead>
    <tr>
        <th scope="col">#</th> 
        <th scope="col">Name</th> 
        <th scope="col">Programme</th> 
        <th scope="col">Batch</th> 
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
        echo $row['name'];
        echo "</td><td>"; 
        echo $row['programme'];
        echo "</td><td>"; 
        echo $row['batch'];
        echo "</td><td>";
        echo $row['email'];
        echo "</td><td>"; 
		echo $row['contact'];
		echo "</td><td>";
		echo "<a href=\"admin_ta_modify.php?id=". $row['id'] ."\"><img src='images/actions-edit.png'/></a>";
		echo "                 ";
		echo "<a href=\"admin_ta_delete.php?id=". $row['id'] ."\"><img src='images/actions-delete.png'/></a> <br>"; 
		echo "</td></tr>"; 
													
    } 

    echo "</tbody></table>";
?>