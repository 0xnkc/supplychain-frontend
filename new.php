<?php include('templates/_header.php'); ?>


<html>

<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-latest.min.js'></script>
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
                5000);
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
                5000);

        }
    </script>
</head>

<body>
    <div id="chart_div" style="width: 400px; height: 120px;"></div>
</body>

</html>


<?php include('templates/_footer.php'); ?> 