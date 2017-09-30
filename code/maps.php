 <!DOCTYPE html>
<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>
<html>
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
<title>Maps</title>
<link href="Site.css" rel="stylesheet">


    <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script>
var geocoder;
var map;
function initialize() {
  geocoder = new google.maps.Geocoder();
  var latlng = new google.maps.LatLng(33.732017, 73.090224);
  var mapOptions = {
    zoom: 12,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP

  }
  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);

}

function codeAddress() {
  var address = document.getElementById('address').value;
  geocoder.geocode( { 'address': address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      map.setCenter(results[0].geometry.location);
      var marker = new google.maps.Marker({
          map: map,
          position: results[0].geometry.location
      });
    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}


google.maps.event.addDomListener(window, 'load', initialize);

</script>

<script>
      function calculateRoute(startLocation, endLocation) {
        var myOptions = {
          zoom: 10,
          center: new google.maps.LatLng(33.732017, 73.090224),
          mapTypeId: google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map-canvas"), myOptions);

 
        var directionsService = new google.maps.DirectionsService();
        var directionsRequest = {
          origin: startLocation,
          destination: endLocation,
          travelMode: google.maps.DirectionsTravelMode.DRIVING,
          unitSystem: google.maps.UnitSystem.METRIC
        };
        directionsService.route(
          directionsRequest,
          function(response, status)
          {
            if (status == google.maps.DirectionsStatus.OK)
            {
              new google.maps.DirectionsRenderer({
                map: mapObject,
                directions: response
              });
            }
            else
              $("#error").append("Unable to retrieve your route, Try Again.<br />");
          }
        );
      }
 
	$(document).ready(function() {
	
		$("#calculate-route").submit(function(event) {
		event.preventDefault();
		calculateRoute($("#startLocation").val(), $("#endLocation").val());
		
		});
	
	});
    </script>

</head>

<body>


<?php if ($_SESSION['user']>1000 && $_SESSION['user']<2000){include "adminHeader.php";}else{include "header.php";} ?>


<div id="main">
<h1>Map My Way</h1>

<h2>      <input id="address" type="textbox">
      <input type="button" value="Search" onClick="codeAddress()">
 
<br></h2>


<div id="container">

<div id="colum1">
    <div id="map-canvas" style="width:650px;height:400px;"></div>

</div>



<div id="colum2">
	<h3>Route:</h3>
	<form id="calculate-route" name="calculate-route" method="get" action="maps.php">
	
	Start Location: <input type="text" id="startLocation" name="startLocation" required="required" >
	<br><br>
	End Location: <input type="text" id="endLocation" name="endLocation" required="required" >
	<br><br>
	
	<input type="submit" value="Submit">
	
	<hr>
	</form>

<?php
include("config.php");


// connect to the mysql server 
$con=mysqli_connect($server,$db_user,$db_pass,$database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users");

while($row = mysqli_fetch_array($result)) {
	if ($row['username']==$_SESSION['user']){

$startLocation = $row['startLocation'];
$endLocation = $row['endLocation'];
$startDate = $row['startDate'];
$endDate = $row['endDate'];
$travelFrequency = $row['travelFrequency'];
	
	}
}

?>



<?php
ob_start();

// define variables and set to empty values
?>


<h3>Travel Info:</h3>
<form action="updateTravelPlan.php" method="post">
Starting Location: <input type="text" name="startLocation" value="<?php echo $startLocation;?>">
<br><br>
Ending Location: <input type="text" name="endLocation" value="<?php echo $endLocation;?>">
<br><br>
Arrival Time: <input type="text" name="startDate" placeholder="DD/MM/YY" value="<?php echo $startDate;?>">
<br><br>
Departure Time: <input type="text" name="endDate" placeholder="DD/MM/YY" value="<?php echo $endDate;?>">
<br><br>
Travel Frequency: <input type="text" placeholder="Daily/Weekly/Monthly/Yearly/Other" 
 name="travelFrequency" value="<?php echo $travelFrequency;?>">
<br><br>

<input type="submit" name="submit" value="Save">
</form>

                
</div>
</div>
<?php include "Footer.php"; ?>

</div>





</body>
</html>
