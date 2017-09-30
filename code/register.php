<!doctype html>
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
<link href="site.css" rel="stylesheet" type="text/css">
<title>Sign Up</title>

</head>

<body>


<?php
ob_start();


// define variables and set to empty values
$firstNameErr = $lastNameErr = $userNameErr = $passwordErr = $emailErr = $genderErr =$privacyErr = $cellNoErr = $driverErr = $licenseNoErr = $cnicNoErr = "";
$firstName = $lastName = $userName = $password = $email = $gender = $privacy = $address = $cellNo = $driver = $licenseNo =$cnicNo = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (empty($_POST["firstName"])) {
	$firstNameErr = "First Name is required";
	} else {
	$firstName = test_input($_POST["firstName"]);
	// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$firstName)) {
		$firstNameErr = "Only letters and white space allowed";
		}
	}
	if (empty($_POST["lastName"])) {
	$lastNameErr = "Last Name is required";
	} else {
	$lastName = test_input($_POST["lastName"]);
	// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$lastName)) {
		$lastNameErr = "Only letters and white space allowed";
		}
	}


	if (empty($_POST["userName"])) {
	$userNameErr = "User Name is required";
	}else{
	$userName = test_input($_POST["userName"]);		
		}

	if (empty($_POST["password"])) {
	$passwordErr = "Password is required";
	}else{
	$password = test_input($_POST["password"]);
		}

	if (empty($_POST["email"])) {
	$emailErr = "Email is required";
	} else {
	$email = test_input($_POST["email"]);
	// check if e-mail address syntax is valid
	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email)) {
	$emailErr = "Invalid email format";
	}
	}
	
	if (empty($_POST["cellNo"])) {
	$cellNo = "";
	} else {
	$cellNo = test_input($_POST["cellNo"]);
	}

	if (empty($_POST["driver"])) {
	$driverErr = "Driver status is required";
	} else {
	$driver = test_input($_POST["driver"]);
	}
	
	if (empty($_POST["licenseNo"])) {
	$licenseNo = "";
	} else {
	$licenseNo = test_input($_POST["licenseNo"]);
	}

	if (empty($_POST["cnicNo"])) {
	$cnicNo = "";
	} else {
	$cnicNo = test_input($_POST["cnicNo"]);
	}
	
	if (empty($_POST["address"])) {
	$address = "";
	} else {
	$address = test_input($_POST["address"]);
	}
	
	if (empty($_POST["gender"])) {
	$genderErr = "Gender is required";
	} else {
	$gender = test_input($_POST["gender"]);
	}

	if (empty($_POST["privacy"])) {
	$privacyErr = "Privacy category is required";
	} else {
	$privacy = test_input($_POST["privacy"]);
	}

	}

function test_input($data) {
$data = trim($data);
$data = stripslashes($data);
$data = htmlspecialchars($data);
return $data;
echo "You are registered now";
}
?>

<div id="main">


<h1>Map My Way</h1>
<h2>Sign Up</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
First Name: <input type="text" name="firstName" value="<?php echo $firstName;?>">
<span class="error">* <?php echo $firstNameErr;?></span>
<br><br>
Last Name: <input type="text" name="lastName" value="<?php echo $lastName;?>">
<span class="error">* <?php echo $lastNameErr;?></span>
<br><br>
Username: <input type="text" name="userName" value="<?php echo $userName;?>">
<span class="error">* <?php echo $userNameErr;?></span>
<br><br>
Password: <input type="password" name="password" value="<?php echo $password;?>">
<span class="error">* <?php echo $passwordErr;?></span>
<br><br>
E-mail: <input type="text" name="email" value="<?php echo $email;?>">
<span class="error">* <?php echo $emailErr;?></span>
<br><br>
Cell No: <input type="text" name="cellNo" value="<?php echo $cellNo;?>">
<span class="error"><?php echo $cellNoErr;?></span>
<br><br>
Driving Status:
<input type="radio" name="driver" <?php if (isset($driver) && $driver=="No") echo "checked";?>  value="No">No
<input type="radio" name="driver" <?php if (isset($driver) && $driver=="Yes") echo "checked";?>  value="Yes">Yes
<span class="error">* <?php echo $driverErr;?></span>
<br><br>
License No: <input type="text" name="licenseNo" value="<?php echo $licenseNo;?>">
<span class="error"><?php echo $licenseNoErr;?></span>
<br><br>
CNIC No: <input type="text" name="cnicNo" value="<?php echo $cnicNo;?>">
<span class="error"><?php echo $cnicNoErr;?></span>
<br><br>
Address: <textarea name="address" rows="1" cols="30"><?php echo $address;?></textarea>
<br><br>
Gender:
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?>  value="female">Female
<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?>  value="male">Male
<span class="error">* <?php echo $genderErr;?></span>
<br><br>
Privacy:
<input type="radio" name="privacy" <?php if (isset($privacy) && $privacy=="private") echo "checked";?>  value="private">Private
<input type="radio" name="privacy" <?php if (isset($privacy) && $privacy=="public") echo "checked";?>  value="public">Public
<span class="error">* <?php echo $privacyErr;?></span>
<br><br>


<input type="submit" name="submit" value="Submit">
</form>

<?php include "Footer.php"; ?>
        </div>

</body>
</html>
