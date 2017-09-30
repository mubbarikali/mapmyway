 <!DOCTYPE html>
<?php
session_start();
session_destroy();
?> 
<html>
<head>
<title>Login</title>
<link href="Site.css" rel="stylesheet">
</head>

<body>
<div id="main">
<h1>Map My Way</h1>

<?php

// expire cookie
setcookie ("loggedin", "", time() - 3600);

echo "<h2>You are registered now.</h2>";
echo "<p><a href=index.html>Log In</a><p>";

?>
<?php include "Footer.php"; ?>
</div>

</body>
</html>
