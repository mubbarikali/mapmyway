
<?php
include("config.php"); 


$con=mysqli_connect($server,$db_user,$db_pass,$database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$startLocation = "";
$endLocation = "";

$startLocation = mysqli_real_escape_string($con, $_POST['startLocation']);
$endLocation = mysqli_real_escape_string($con, $_POST['endLocation']);

echo "$startLocation";



$sql="UPDATE travelinfo SET startLocation='$startLocation', endLocation='$endLocation'";

if (!mysqli_query($con,$sql)) {
 echo "<b>This username has already takken. Please try another";
}else{
echo "<b>Congratulation! You are registered now.</b>";

}

mysqli_close($con);
?> 
