<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>


<?php
include("config.php");


// connect to the mysql server 
$con=mysqli_connect($server,$db_user,$db_pass,$database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users");
$uid = $_GET['id'];

while($row = mysqli_fetch_array($result)) {
	if($row['username']==$uid){
	$rusername=$_SESSION['user'];
	$rfriendname=$row['username'];
	$rfirstName=$row['firstName'];
	$rlastName=$row['lastName'];
	$rstartLocation=$row['startLocation'];
	$rendLocation=$row['endLocation'];
	$rstartDate=$row['startDate'];
	$rendDate=$row['endDate'];
	$rvehicleType=$row['vehicleType'];
	$remail=$row['email'];
	}
}

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

$sql="INSERT INTO myCircle (username, friendname, firstName, lastName, startLocation, endLocation, startDate, endDate, vehicleType, email)
VALUES ('$rusername', '$rfriendname', '$rfirstName', '$rlastName', '$rstartLocation', '$rendLocation', '$rstartDate', '$rendDate', '$rvehicleType', '$remail')";


if (!mysqli_query($con,$sql)) {
header("location:circles.php");
}else{
header("location:circles.php");
}

mysqli_close($con);
?> 
