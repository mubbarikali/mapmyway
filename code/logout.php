 <!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['user']))
  unset($_SESSION['user']);
?>
<?php
session_destroy();
?> 
<html>
<head>
<title>Logout</title>
<link href="Site.css" rel="stylesheet">
</head>

<body>
<div id="main">
<h1>Map My Way</h1>

<?php

// expire cookie
setcookie ("loggedin", "", time() - 3600);

echo "<h2>You are now logged out.</h2>";
echo "<p><a href=index.html>Log In</a><p>";

?>
<?php include "Footer.php"; ?>
</div>
</body>
</html>
