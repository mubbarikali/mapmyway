<!doctype html>
<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>
<html>
<head>
<link href="site.css" rel="stylesheet" type="text/css">
<title>Profile</title>

</head>

<body>
<?php include "adminHeader.php"; ?>

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
$firstName = $row['firstName'];
$lastName = $row['lastName'];
$userName = $row['username'];
$password = $row['password'];
$email = $row['email'];
$gender = $row['gender'];
$privacy = $row['privacy'];
$address = $row['address'];
$cellNo = $row['cellNo'];
$driver = $row['driver'];
$licenseNo = $row['licenseNo'];
$cnicNo = $row['cnicNo'];

$startLocation = $row['startLocation'];
$endLocation = $row['endLocation'];
$startDate = $row['startDate'];
$endDate = $row['endDate'];
$travelFrequency = $row['travelFrequency'];

$vehicleType = $row['vehicleType'];
$fuelSystem = $row['fuelSystem'];
	
	
	}
}

?>

<div id="main">

<h1>Map My Way</h1>
<h2>Personal Info:</h2>
<form action="updateProfile.php" method="post">
First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
<br><br>
Last Name: <input type="text" name="lastName"  value="<?php echo $lastName;?>">
<br><br>
Password: <input type="password" name="password" value="<?php echo $password;?>">
<br><br>
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<br><br>
Cell No: <input type="text" name="cellNo" value="<?php echo $cellNo;?>">
<br>
<br>
CNIC No: <input type="text" name="cnicNo" value="<?php echo $cnicNo;?>">
<br><br>
Address: <textarea name="address" rows="1" cols="30"><?php echo $address;?></textarea>
<br><br>
Gender:
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
<br><br>
Privacy:
<input type="radio" name="privacy" <?php if (isset($privacy) && $privacy=="private") echo "checked";?>  value="private">Private
<input type="radio" name="privacy" <?php if (isset($privacy) && $privacy=="public") echo "checked";?>  value="public">Public
<br>

<input type="submit" name="submit" value="Update">
</form>
<?php include "Footer.php"; ?>
        </div>
</body>
</html>
