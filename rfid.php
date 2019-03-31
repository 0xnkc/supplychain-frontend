<?php include('templates/_header.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <style>
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

    <script src="https://www.gstatic.com/firebasejs/5.9.2/firebase.js"></script>
    <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyDWyLEYpnbiQvn-bqW8ko4cDTZrZCxpqmM",
            authDomain: "rfid-scm-123.firebaseapp.com",
            databaseURL: "https://rfid-scm-123.firebaseio.com",
            projectId: "rfid-scm-123",
            storageBucket: "rfid-scm-123.appspot.com",
            messagingSenderId: "1056606093093"
        };
        firebase.initializeApp(config);




        var database = firebase.database();
        database.ref().once('value', function(snapshot) {
            var chSnapshot = snapshot.child("exporterdata");
            if (chSnapshot.exists()) {
                var content = '';
                chSnapshot.forEach(function(data) {
                    var val = data.val();
                    content += '<tr>';
                    content += '<td>' + val.id + '</td>';
                    content += '<td>' + val.text + '</td>';
                    content += '<td>' + val.timestamp + '</td>';
                    content += '</tr>';
                });
                $('#ex-table').append(content);
            }
        });
        //var database = firebase.database();
        database.ref().once('value', function(snapshot) {
            var chSnapshot = snapshot.child("data");
            if (chSnapshot.exists()) {
                var content = '';
                chSnapshot.forEach(function(data) {
                    var val = data.val();
                    content += '<tr>';
                    content += '<td>' + val.id + '</td>';
                    content += '<td>' + val.text + '</td>';
                    content += '<td>' + val.timestamp + '</td>';
                    content += '</tr>';
                });
                $('#im-table').append(content);
            }
        });
        //var database = firebase.database();
        database.ref().once('value', function(snapshot) {
            var chSnapshot = snapshot.child("processordata");
            if (chSnapshot.exists()) {
                var content = '';
                chSnapshot.forEach(function(data) {
                    var val = data.val();
                    content += '<tr>';
                    content += '<td>' + val.id + '</td>';
                    content += '<td>' + val.text + '</td>';
                    content += '<td>' + val.timestamp + '</td>';
                    content += '</tr>';
                });
                $('#pr-table').append(content);
            }
        });
    </script>

<body>
    <div class="container">
        <h2>Exporter Data</h2>
        <p>RFID Data </p>
        <table class="table table-hover" id="ex-table">
            <thead>
                <tr id="tr">
                    <th>ID</th>
                    <th>RFID Tag Data</th>
                    <th>TimeStamp</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="container">
        <h2>Importer Data</h2>
        <p>RFID Data </p>
        <table class="table table-hover" id="im-table">
            <thead>
                <tr id="tr">
                    <th>ID</th>
                    <th>RFID Tag Data</th>
                    <th>TimeStamp</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="container">
        <h2>Processor Data</h2>
        <p>RFID Data </p>
        <table class="table table-hover" id="pr-table">
            <thead>
                <tr id="tr">
                    <th>ID</th>
                    <th>RFID Tag Data</th>
                    <th>TimeStamp</th>
                </tr>
            </thead>
        </table>
    </div>
</body>

</html>
<?php include('templates/_footer.php');
