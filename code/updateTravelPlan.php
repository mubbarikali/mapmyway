<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>

<?php
include("config.php"); 


$con=mysqli_connect($server,$db_user,$db_pass,$database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

// escape variables for security
$userName = $_SESSION['user'];

$startLocation = mysqli_real_escape_string($con, $_POST['startLocation']);
$endLocation = mysqli_real_escape_string($con, $_POST['endLocation']);
$startDate = mysqli_real_escape_string($con, $_POST['startDate']);
$endDate = mysqli_real_escape_string($con, $_POST['endDate']);
$travelFrequency = mysqli_real_escape_string($con, $_POST['travelFrequency']);


$sql="UPDATE users SET startLocation='$startLocation', endLocation='$endLocation', startDate='$startDate', endDate='$endDate', travelFrequency='$travelFrequency' WHERE username='$userName'";

if (!mysqli_query($con,$sql)) {
 echo "<b>This username has already takken. Please try another";
}else{
  header("location:maps.php");
}

mysqli_close($con);
?> 
