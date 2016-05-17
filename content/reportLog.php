<!DOCTYPE html>
<html>
  <head>
    <title>HackHaltonApp</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../css/main.css">
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="main.html" class="navbar-brand">Cleanville</a>
        </div>

        <div id="bs-example-navbar-collapse-1" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="https://api.mapbox.com/styles/v1/lyoung13/cio7rma8w000uaem5vozr0cpq.html?title=true&access_token=pk.eyJ1IjoibHlvdW5nMTMiLCJhIjoiY2lvN2kwY2RuMDJtN3Y2a3FpMDJmbjJwMCJ9.xTVVYqeCCUvxyHZL4Mg95g#10.807636259822484/43.42384240055699/-79.78643647702651/0">Heatmap</a></li>
            <li><a href="reportLog.php">View Request Log</a></li>
            <li><a href="#">Account Settings</a></li>
            <li><a href="#">Sign Out</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <h1>Report Log</h1>
    <ul class="list-group">

        <li class="list-group-item alert alert-success"><strong>Completed</strong></li>

        <?php
            $conn = new mysqli('127.0.0.1', 'root', 'root', 'oakville');
            $sql1 = "SELECT Name, Description, Xcoordinate, Ycoordinate, Type, Status FROM Requests WHERE Status = 'complete'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result1)) {
                    echo "Name: " . $row["Name"]. "  " . $row["Description"]. " " . $row["Xcoordinate"]. " ". $row["Ycoordinate"]." " . $row["Type"]. " ". $row["Status"]. "<br>";
                }
            }
            else {
                echo "0 results";
            }
        ?>

        <li class="list-group-item alert alert-warning"><strong>In Progress</strong></li>

        <?php
            $conn = new mysqli('127.0.0.1', 'root', 'root', 'oakville');
            $sql2 = "SELECT Name, Description, Xcoordinate, Ycoordinate, Type, Status FROM Requests WHERE Status = 'in progress'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result2)) {
                    echo "Name: " . $row["Name"]. "  " . $row["Description"]. " " . $row["Xcoordinate"]. " ". $row["Ycoordinate"]." " . $row["Type"]. " ". $row["Status"]. "<br>";
                }
            }
            else {
                echo "0 results";
            }
      ?>

      <li class="list-group-item alert alert-danger"><strong>Queued</strong></li>
      <?php
        $conn = new mysqli('127.0.0.1', 'root', 'root', 'oakville');
        $sql3 = "SELECT Name, Description, Xcoordinate, Ycoordinate, Type, Status FROM Requests WHERE Status = 'queued'";
        $result3 = mysqli_query($conn, $sql3);

        if (mysqli_num_rows($result3) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result3)) {
                echo "Name: " . $row["Name"].  $row["Description"]. " " . $row["Xcoordinate"]. " ". $row["Ycoordinate"]." " . $row["Type"]. " ". $row["Status"]. "<br>";
            }
        }
        else {
            echo "0 results";
        }
      ?>
    </ul>
  </body>
</html>
