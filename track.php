<?php include('templates/_header.php'); ?>


<!DOCTYPE html>
<html>
  <head>
    <style>
      #map {
        width: 100%;
        height: 700px;
        background-color: #FFFFF;
      }
    </style>
  </head>
  <body>
    <h3>Tracking ID:27673git config --global user.email</h3>
    <br>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
    <!--The div element for the map -->
    <div id="map"></div>

<div class="outer" style="margin: 0 auto; width: 100px;">
    <div id="container-speed" class="chart-container"></div>
   
</div>
    <script>
// Initialize and add the map..
function initMap() {
  // The location of Uluru
  var uluru = {lat: 13.128851, lng: 77.5750407};
  // The map, centered at Uluru
  var map = new google.maps.Map(
      document.getElementById('map'), {zoom: 15, center: uluru});
  // The marker, positioned at Uluru
  var icon = {
    url: "plugins/images/delivery-truck.png", // url
    scaledSize: new google.maps.Size(25, 25), // scaled size
    origin: new google.maps.Point(0,0), // origin
    anchor: new google.maps.Point(0, 0) // anchor
};
  var marker = new google.maps.Marker({position: uluru, map: map,icon: icon ,zoom: 10 });
}
    </script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>

<script src="https://code.highcharts.com/modules/solid-gauge.js"></script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAlI4CzgEkZkgobD13qJ8DngUlRBXB2Qsk&callback=initMap">
    </script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temperature', 50],
          ['Humidity', 40],
        ]);

        var options = {
          width: 400, height: 120,
          redFrom: 90, redTo: 100,
          yellowFrom:75, yellowTo: 90,
          minorTicks: 5
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

        chart.draw(data, options);

        setInterval(function() {
          data.setValue(0, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 13000);
        setInterval(function() {
          data.setValue(1, 1, 40 + Math.round(60 * Math.random()));
          chart.draw(data, options);
        }, 5000);
        setInterval(function() {
          data.setValue(2, 1, 60 + Math.round(20 * Math.random()));
          chart.draw(data, options);
        }, 26000);
      }
    </script>
  </body>
</html>



<?php include('templates/_footer.php');?>  