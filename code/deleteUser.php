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
$uid = $_GET['id'];

$sql="DELETE FROM users
WHERE username='$uid'";

if (!mysqli_query($con,$sql)) {
 echo "<b>User could not deleted.";
}else{
header("location:users.php");
}

mysqli_close($con);
?> 

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
$uid = $_GET['id'];

$sql="DELETE FROM myCircle
WHERE username='$uid'";

if (!mysqli_query($con,$sql)) {
 echo "<b>User could not deleted.";
}else{
header("location:users.php");
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
$uid = $_GET['id'];

$sql="DELETE FROM myCircle
WHERE friendname='$uid'";

if (!mysqli_query($con,$sql)) {
 echo "<b>User could not deleted.";
}else{
header("location:users.php");
}

mysqli_close($con);
?> 
