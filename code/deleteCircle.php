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

$sql="DELETE FROM mycircle
WHERE friendname='$uid'";

if (!mysqli_query($con,$sql)) {
 echo "<b>Record could not deleted.";
}else{
header("location:circles.php");
}

mysqli_close($con);
?> 
