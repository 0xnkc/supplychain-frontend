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
    <h3>Tracking ID:XXXXXXXX</h3>
    <br>
    <h5>Food storage temperature:XX</h5>
   <h5>Food storage humidity:XX</h5>
    <!--The div element for the map -->
    <div id="map"></div>


    <script>
// Initialize and add the map
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
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?sensor=true&callback=initMap">
    </script>
  </body>
</html>



<?php include('templates/_footer.php');?>  