<?php
include "connect.php";
	$tbl_name="course_list";
	$query="SELECT * FROM $tbl_name";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
//	echo $num;
//	echo  mysql_result($result,0,"c_no") ;
			
	$i=0;
?>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Courses', 'TAs Applied'],
		   <?php
		   if($num==0)
		  { ?>
		    ['No Updates',0]
		  		  <?php
		  }
		  else
		  {
		  ?>
		  <?php 
		  while ($i < $num-1)
		  {
		  ?>
          ['<?php echo mysql_result($result,$i,"c_name") ?>', <?php echo mysql_result($result,$i,"tas_applied") ?> ],
		  <?php
		  $i++;
		  }

		  ?>
		  ['<?php echo mysql_result($result,$i,"c_name") ?>', <?php echo mysql_result($result,$i,"tas_applied") ?> ]
<?php
}
?>
        ]);

        var options = {
          title: 'TAs Applied for each Course'
        };

        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  </head>
  <body>
    <div id="chart_div" style="width: 1048px; height: 333px;"></div>
  </body>
</html>
