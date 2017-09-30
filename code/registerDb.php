<?php
include("config.php"); 
include("register.php"); 


$con=mysqli_connect($server,$db_user,$db_pass,$database);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if ($_POST['userName']!=""){
// escape variables for security
$userName = mysqli_real_escape_string($con, $_POST['userName']);
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




$sql="INSERT INTO users (userName, password, firstName, lastName, email, cellNo, driver, licenseNo, cnicNo, address, gender, privacy)
VALUES ('$userName', '$password', '$firstName', '$lastName', '$email', '$cellNo', '$driver', '$licenseNo', '$cnicNo', '$address', '$gender', '$privacy')";

if (!mysqli_query($con,$sql)) {
 echo "<b>This username has already takken. Please try another";
}else{
echo "<b>Congratulation! You are registered now.</b>";
  header("location:login.php");


}
}

mysqli_close($con);
?> 
