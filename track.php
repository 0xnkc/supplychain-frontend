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

        hr.blue {
            border: 10px solid #1E99F2;
            border-radius: 5px;
        }
    </style>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['gauge']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Label', 'Value'],
                ['Temperature', 0],
                ['Humidity', 0]
            ]);

            var options = {
                width: 400,
                height: 120,
                redFrom: 50,
                redTo: 100,
                yellowFrom: 35,
                yellowTo: 50,
                greenFrom: 0,
                greenTo: 35,
                minorTicks: 5
            };

            var chart = new google.visualization.Gauge(document.getElementById('chart_div'));

            chart.draw(data, options);

            setInterval(function() {
                    $.ajax({
                        url: 'https://api.thingspeak.com/channels/705714/feed/last.json?api_key=DDEBXSI2M5QLZ0KD',
                        dataType: "json",
                        success: function(daaa) {

                            var a = Number(daaa.field3);

                            data.setValue(0, 1, a);
                            chart.draw(data, options);
                        }
                    });
                },
                1000);
            setInterval(function() {
                    $.ajax({
                        url: 'https://api.thingspeak.com/channels/705714/feed/last.json?api_key=DDEBXSI2M5QLZ0KD',
                        dataType: "json",
                        success: function(daaa) {

                            var b = Number(daaa.field4);

                            data.setValue(1, 1, b);
                            chart.draw(data, options);
                        }
                    });
                },
                1000);

        }
    </script>
    <script>
        // Initialize and add the map..
        function initMap() {
            // The location of Uluru
            $.ajax({
                url: 'https://api.thingspeak.com/channels/705714/feed/last.json?api_key=DDEBXSI2M5QLZ0KD',
                dataType: "json",
                success: function(data) {

                    var a = Number(data.field1);
                    var b = Number(data.field2);
                    //alert(data.field1);
                    var uluru = {
                        lat: a,
                        lng: b
                    };
                    // The map, centered at Uluru
                    var map = new google.maps.Map(
                        document.getElementById('map'), {
                            zoom: 18,
                            center: uluru
                        });
                    // The marker, positioned at Uluru
                    var icon = {
                        url: "plugins/images/delivery-truck.png", // url
                        scaledSize: new google.maps.Size(25, 25), // scaled size
                        origin: new google.maps.Point(0, 0), // origin
                        anchor: new google.maps.Point(0, 0) // anchor
                    };
                    var marker = new google.maps.Marker({
                        position: uluru,
                        map: map,
                        icon: icon,
                        zoom: 10
                    });

                }
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?sensor=true&callback=initMap">
    </script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>

</head>

<body>
    <div align="center">
        <h1> Current Logistics Temperature, Humidity and live tracking</h1>
        <div id="chart_div" style="width: 500px; height: 120px;"></div>

        <hr class="blue">
        <!--The div element for the map -->
        <div id="map"></div>
    </div>
</body>

</html>



<?php include('templates/_footer.php'); ?> 