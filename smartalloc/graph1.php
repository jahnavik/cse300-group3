<?php
include "connect.php";
	$tbl_name="tas_applied";
	$query="SELECT * FROM $tbl_name";
	$result=mysql_query($query);
	$num=mysql_numrows($result);
//	echo $num;
//	echo  mysql_result($result,0,"course_name") ;
	if(isset($_POST['submit1']))
{			
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
		  while ($i < $num-1)
		  {
		  ?>
          ['<?php echo mysql_result($result,$i,"course_name") ?>', <?php echo mysql_result($result,$i,"ta_applied") ?> ],
		  <?php
		  $i++;
		  }
		  ?>
		  ['<?php echo mysql_result($result,$i,"course_name") ?>', <?php echo mysql_result($result,$i,"ta_applied") ?> ]
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
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
  </body>
</html>
<?php
}
?>