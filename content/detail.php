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
    <form method ="POST"><div id="mapholder"></div>
      <h4>2. Select Type of Issue</h4>
      <div class="col-1-2">
        <label>
          <input type="radio" name="q1" value="garbage"><span class="glyphicon glyphicon-trash"></span>
        </label>
        <label>
          <input type="radio" name="q2" value="foresty"><span class="glyphicon glyphicon-tree-conifer"></span>
        </label>
        <label>
          <input type="radio" name="q3" value="work operations"><span class="glyphicon glyphicon-road"></span>
        </label>
        <label>
          <input type="radio" name="q4" value="fire"><span class="glyphicon glyphicon-question-sign"></span>
        </label>
      </div>
      <label for="problem_description">Briefly describe the problem:</label>

      <br>
    <textarea id="problem_description" name="problem_description" rows="5" cols="30" maxlength="50" placeholder="Type here..."></textarea><br>
          <input type="submit" name= "submit" value="Send" class="btn btn-success">
    </form>

    <script src="http://maps.google.com/maps/api/js?sensor=false"></script>
	<script src="../scripts/map.js"></script>


       <?php

            if(isset($_POST['q1'])) {
                 $type = $_POST['q1'];
            }

            else  if(isset($_POST['q2'])) {
                 $type = $_POST['q2'];
            }

            if(isset($_POST['q3'])) {
                 $type = $_POST['q3'];
            }

             if(isset($_POST['q4'])) {
                 $type = $_POST['q4'];
            }

            if(isset($_POST['submit'])) {

                 // figure it out
                 $name = "Tomo";

                 $description= $_POST['problem_description'];

                 // Fix after adding Lawrence's code
                 $xCoordinate = $_POST['xcoordinate'];
                 $yCoordinate = $_POST['ycoordinate'];

                 $conn = new mysqli('127.0.0.1', 'root', 'root', 'oakville') OR DIE ('Unable to connect to database');
                 $sq= "INSERT INTO Requests (Name,Description,Xcoordinate,Ycoordinate,Type)
                        VALUES('$name','$description','$xCoordinate','$yCoordinate','$type')";

                 mysqli_query($conn,$sq);
                 echo "Request added";
                 $url = "http://localhost/hackhaltonupdated/content/summary.html";
                 redirect($url);

            }

            function redirect($url){

                $string = '<script type="text/javascript">';
                $string .= 'window.location = "' . $url . '"';
                $string .= '</script>';

                echo $string;
            }

          ?>

  </body>
</html>
