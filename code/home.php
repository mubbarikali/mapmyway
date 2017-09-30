 <!DOCTYPE html>
<?php
session_start();
// store session data
if(!(isset($_SESSION['user'])))
  header("location:index.html");
?>
<html>
<head>
<title>Home</title>
<link href="Site.css" rel="stylesheet">
<link href="*" rel="stylesheet" type="text/css">
</head>

<body>

<?php include "adminHeader.php"; ?>

<div id="main">
<h1>Welcome Admin!</h1>
<h2>ID: <?php echo $_SESSION['user']?></h2>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php include "Footer.php"; ?>
</div>


</div>

</body>
</html>
