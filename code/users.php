 <!DOCTYPE html>
<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>
<html>
<head>
<title>Users</title>
<link href="Site.css" rel="stylesheet">
<link href="*" rel="stylesheet" type="text/css">
</head>

<body>

<?php if ($_SESSION['user']>1000 && $_SESSION['user']<2000){include "adminHeader.php";}else{include "header.php";} ?>

<div id="main">
<h1>Map My Way</h1>

<h2>Users Info:<br></h2>
<form  action="searchedUsers.php" method="post">
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
<th>Starting Location</th>
<th>Ending Location</th>
<th>Email</th>
<th>Action</th>

</tr>";

while($row = mysqli_fetch_array($result)) {
	if($row['username']!=$_SESSION['user']){

	echo "<tr>";
	echo "<td>" . $row['firstName'] ." " . $row['lastName'] .  "</td>";
	echo "<td>" . $row['startLocation'] ."</td>";
	echo "<td>" . $row['endLocation'] .  "</td>";

	$mail = $row['email'];
	echo "<td>" . "<a href='mailto:$mail' target='_top'>
	$mail</a>" . "</td>";
	$uid=$row['username'];
	echo "<td>" . "<a href='deleteUser.php?id=$uid'>
	Remove</a>";
	echo "</tr>";

	}
}
echo "</table>";
?>

<?php include "Footer.php"; ?>

</div>

</body>
</html>
