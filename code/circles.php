 <!DOCTYPE html>
<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>
<html>
<head>
<title>Circles</title>
<link href="Site.css" rel="stylesheet">
<link href="*" rel="stylesheet" type="text/css">
</head>

<body>

<?php if ($_SESSION['user']>1000 && $_SESSION['user']<2000){include "adminHeader.php";}else{include "header.php";} ?>

<div id="main">
<h1>Map My Way</h1>

<div id="container">
<div style="float: left; width: 49%; padding: 20;">
<h2>Organization Members:<br></h2>

<form  action="searchedMembers.php" method="post">
<input name="search" type="text" placeholder="Search here by name or location" size="30">
<button type="submit">Search</button>
</form>
<br>

<?php
include("config.php");


// connect to the mysql server 
$con=mysqli_connect($server,$db_user,$db_pass,$database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM users");


echo "<table border='1'>
<tr>
<th>Name</th>
<th>From</th>
<th>To</th>
<th>Arrival Time</th>
<th>Departure Time</th>
<th>Vehicle</th>
<th>Email</th>
<th>Action</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	if($row['privacy']=='public'){
	if($row['username']!=$_SESSION['user']){
	if (!($row['username']>1000 && $row['username']<2000)){
	echo "<td>" . $row['firstName'] ." " . $row['lastName'] .  "</td>";
	echo "<td>" . $row['startLocation']."</td>";
	echo "<td>" . $row['endLocation'] .  "</td>";
	echo "<td>" . $row['startDate'] .  "</td>";
	echo "<td>" . $row['endDate'] .  "</td>";
	echo "<td>" . $row['vehicleType']  .  "</td>";

	$mail = $row['email'];
	echo "<td>" . "<a href='mailto:$mail' target='_top'>
	$mail</a>" . "</td>";
	$uid=$row['username'];
	echo "<td>" . "<a href='addCircle.php?id=$uid'>
	Add</a>";
	echo "</tr>";
	}
	}
	}
}
echo "</table>";
?>
</div>
<div style="width: 49%; float:right; padding: 20;">
<h2>My Circle:<br></h2>

<form  action="searchCircles.php" method="post">
<input name="searchFriend" type="text" placeholder="Search here by name or location" size="30">
<button type="submit">Search</button>
</form>
<br>

<?php
include("config.php");


// connect to the mysql server 
$con=mysqli_connect($server,$db_user,$db_pass,$database);

if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM mycircle");


echo "<table border='1' border-style: solid;
    border-width: 15px;>
<tr>
<th>Name</th>
<th>From</th>
<th>To</th>
<th>Arrival Time</th>
<th>Departure Time</th>
<th>Vehicle</th>
<th>Email</th>
<th>Action</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
	echo "<tr>";
	if($row['username']==$_SESSION['user']){
	echo "<td>" . $row['firstName'] ." " . $row['lastName'] .  "</td>";
	echo "<td>" . $row['startLocation']."</td>";
	echo "<td>" . $row['endLocation'] .  "</td>";
	echo "<td>" . $row['startDate'] .  "</td>";
	echo "<td>" . $row['endDate'] .  "</td>";

	echo "<td>" . $row['vehicleType']  .  "</td>";

	$mail = $row['email'];
	echo "<td>" . "<a href='mailto:$mail' target='_top'>
	$mail</a>" . "</td>";

	$uid=$row['friendname'];
	echo "<td>" . "<a href='deleteCircle.php?id=$uid'>
	Remove</a>";
}
	echo "</tr>";
}
echo "</table>";
?>
</div>
</div>

<?php include "Footer.php"; ?>

</div>

</body>
</html>
