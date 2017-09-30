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

$password = mysqli_real_escape_string($con, $_POST['password']);
$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$cellNo = mysqli_real_escape_string($con, $_POST['cellNo']);
$driver = mysqli_real_escape_string($con, $_POST['driver']);
$licenseNo = mysqli_real_escape_string($con, $_POST['licenseNo']);
$cnicNo = mysqli_real_escape_string($con, $_POST['cnicNo']);
$address = mysqli_real_escape_string($con, $_POST['address']);
$gender = mysqli_real_escape_string($con, $_POST['gender']);
$privacy = mysqli_real_escape_string($con, $_POST['privacy']);

$startLocation = mysqli_real_escape_string($con, $_POST['startLocation']);
$endLocation = mysqli_real_escape_string($con, $_POST['endLocation']);
$startDate = mysqli_real_escape_string($con, $_POST['startDate']);
$endDate = mysqli_real_escape_string($con, $_POST['endDate']);
$travelFrequency = mysqli_real_escape_string($con, $_POST['travelFrequency']);

$vehicleType = mysqli_real_escape_string($con, $_POST['vehicleType']);
$fuelSystem = mysqli_real_escape_string($con, $_POST['fuelSystem']);



$sql="UPDATE users SET password='$password', firstName='$firstName', lastName='$lastName', email='$email', cellNo='$cellNo', driver='$driver', licenseNo='$licenseNo', cnicNo='$cnicNo', address='$address', gender='$gender', privacy='$privacy', startLocation='$startLocation', endLocation='$endLocation', startDate='$startDate', endDate='$endDate', travelFrequency='$travelFrequency', vehicleType='$vehicleType', fuelSystem='$fuelSystem' WHERE username='$userName'";


if (!mysqli_query($con,$sql)) {
 echo "<b>This username has already takken. Please try another";
}else{
  header("location:profile.php");
}

mysqli_close($con);
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

$firstName = mysqli_real_escape_string($con, $_POST['firstName']);
$lastName = mysqli_real_escape_string($con, $_POST['lastName']);
$email = mysqli_real_escape_string($con, $_POST['email']);

$startLocation = mysqli_real_escape_string($con, $_POST['startLocation']);
$endLocation = mysqli_real_escape_string($con, $_POST['endLocation']);
$startDate = mysqli_real_escape_string($con, $_POST['startDate']);
$endDate = mysqli_real_escape_string($con, $_POST['endDate']);

$vehicleType = mysqli_real_escape_string($con, $_POST['vehicleType']);



$sql="UPDATE users SET password='$password', firstName='$firstName', lastName='$lastName', email='$email', cellNo='$cellNo', driver='$driver', licenseNo='$licenseNo', cnicNo='$cnicNo', address='$address', gender='$gender', privacy='$privacy', startLocation='$startLocation', endLocation='$endLocation', startDate='$startDate', endDate='$endDate', travelFrequency='$travelFrequency', vehicleType='$vehicleType', fuelSystem='$fuelSystem' WHERE username='$userName'";


if (!mysqli_query($con,$sql)) {
 echo "<b>This username has already takken. Please try another";
}else{
  header("location:profile.php");
}

mysqli_close($con);
?> 
