<?php include 'PHP_source.php'>
<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart)
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          //PHP database calls go here
          ['Time', 'Value']
          <?php 
            while($row = mysqli_fetch_array($result)) {
              echo ",['" . $row['Time'] . "," . $row['Value'];
            }
          ?>
          
        ]);

        var options = {
          title: 'Sensor Data'
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