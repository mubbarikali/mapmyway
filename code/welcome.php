 <!DOCTYPE html>
<?php
session_start();
// store session data
$_SESSION['user']=$ausername=$_POST['username'];
if(!(isset($_SESSION['user'])))
  echo "index.html";
?>

<html>
<head>
<title>Home</title>
<link href="Site.css" rel="stylesheet">

</head>

<body>
<div id="main">
<h1>Map My Way</h1>

<?php
ob_start();

include("config.php");


$con = mysql_connect($server, $db_user, $db_pass);
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

$db_selected = mysql_select_db($database, $con);

if (!$db_selected)
  {
  die ("Can\'t use test_db : " . mysql_error());
  }


$ausername=$_POST['username'];
$aPassword=$_POST['password'];

$match = "select username from $table where username = '$ausername' 
and password = '$aPassword'"; 

$result = mysql_query($match) 
or die ("Could not match data because ".mysql_error());

$num_rows = mysql_num_rows($result); 

if ($ausername=="" || $aPassword =="")
{echo "You must fill both fields!";
}else{
	
	if ($num_rows <= 0) { 
	echo "Sorry, wrong username or password.<br>"; 
	echo "<a href=index.html>Try again</a>"."<br>";
	echo "<a href=register.php>Sign Up</a>"."<br>";
	 
	exit; 
	} else { 
	
	setcookie("loggedin", "TRUE", time()+(3600 * 24));
	setcookie("$ausername", "$aPassword");
	echo "<h2>Welcome $ausername, You are logged in now!</h2>"; 
	echo "<p>Click here to proceed: <a href=maps.php>Go</p>";
	if ($_SESSION['user']>1000 && $_SESSION['user']<2000){header("location:home.php");}else{header("location:maps.php");}
		 
	}
}
?>

</div>



</body>
</html>
