<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once 'config.php';

$fname 			= ""; //First name
$lname 			= ""; //Last Name
$email 			= ""; //Email
$email2 		= ""; //Email 2
$password 		= ""; //Password
$date 			= ""; //Sign up date
$error_array 	= ""; //Error messages

if(isset($_POST['register_button'])){
	//Registration form values

	//First Name
	$fname = strip_tags($_POST['reg_fname']); //Remove html tags
	$fname = str_replace(' ', '', $fname); //Remove spaces
	$fname = ucfirst(strtolower($fname)); //Uppercase first letter

	//Last Name
	$lname = strip_tags($_POST['reg_lname']); //Remove html tags
	$lname = str_replace(' ', '', $lname); //Remove spaces
	$lname = ucfirst(strtolower($lname)); //Uppercase first letter

	//Email
	$email = strip_tags($_POST['reg_email']); //Remove html tags
	$email = str_replace(' ', '', $email); //Remove spaces
	$email = ucfirst(strtolower($email)); //Uppercase first letter

	//Email 2
	$email2 = strip_tags($_POST['reg_email2']); //Remove html tags
	$email2 = str_replace(' ', '', $email2); //Remove spaces
	$email2 = ucfirst(strtolower($email2)); //Uppercase first letter

	//Password
	$password = strip_tags($_POST['reg_password']); //Remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //Remove html tags

	$date = date("Y-m-d"); //Current date

	if($email == $email2) {
		//Check if email is in valid format
		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

			//Check if email already exists
			$e_check = mysqli_query($mysqli, "SELECT email FROM users WHERE email='$email'");

			//Count the number of rows returned
			$num_rows = mysqli_num_rows($e_check);

			if($num_rows > 0) {
				echo "Email already in use";
			}
		} else {
			echo "Invalid format";
		}
	}else{
		echo "Emails don't match";
	}

}

?>

<html>
<head>
	<title>Welcome Social Network</title>
</head>
<body>
	<form action="register.php" method="POST">
		<input type="text" name="reg_fname" placeholder="First Name" required>
		<br>
		<input type="text" name="reg_lname" placeholder="Last Name" required>
		<br>
		<input type="email" name="reg_email" placeholder="Email" required>
		<br>
		<input type="email" name="reg_email2" placeholder="Confim Email" required>
		<br>
		<input type="password" name="reg_password" placeholder="Password" required>
		<br>
		<input type="password" name="reg_password2" placeholder="Confim Password" required>
		<br>
		<input type="submit" name="register_button" value="Register">
	</form>
</body>
</html>