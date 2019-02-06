<?php

// $fname 			= ""; //First name
// $lname 			= ""; //Last Name
// $email 			= ""; //Email
// $email2 		= ""; //Email 2
// $password  		= ""; //Password
// $password2  	= ""; //Password2
// $date 			= ""; //Sign up date
// $error_array 	= array(); //Error messages

// if(isset($_POST['register_button'])){
// 	//Registration form values

// 	//First Name
// 	$fname = strip_tags($_POST['reg_fname']); //Remove html tags
// 	$fname = str_replace(' ', '', $fname); //Remove spaces
// 	$fname = ucfirst(strtolower($fname)); //Uppercase first letter
// 	$_SESSION['reg_fname'] = $fname; //Stores first name into session variable

// 	//Last Name
// 	$lname = strip_tags($_POST['reg_lname']); //Remove html tags
// 	$lname = str_replace(' ', '', $lname); //Remove spaces
// 	$lname = ucfirst(strtolower($lname)); //Uppercase first letter
// 	$_SESSION['reg_lname'] = $lname; //Stores last name into session variable

// 	//Email
// 	$email = strip_tags($_POST['reg_email']); //Remove html tags
// 	$email = str_replace(' ', '', $email); //Remove spaces
// 	$email = ucfirst(strtolower($email)); //Uppercase first letter
// 	$_SESSION['reg_email'] = $email; //Stores email into session variable

// 	//Email 2
// 	$email2 = strip_tags($_POST['reg_email2']); //Remove html tags
// 	$email2 = str_replace(' ', '', $email2); //Remove spaces
// 	$email2 = ucfirst(strtolower($email2)); //Uppercase first letter
// 	$_SESSION['reg_email2'] = $email2; //Stores email2 into session variable

// 	//Password
// 	$password = strip_tags($_POST['reg_password']); //Remove html tags
// 	$password2 = strip_tags($_POST['reg_password2']); //Remove html tags

// 	$date = date("Y-m-d"); //Current date

// 	if($email == $email2) {
// 		//Check if email is in valid format
// 		if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
// 			$email = filter_var($email, FILTER_VALIDATE_EMAIL);

// 			//Check if email already exists
// 			$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

// 			//Count the number of rows returned
// 			$num_rows = mysqli_num_rows($e_check);

// 			if($num_rows > 0) {
// 				array_push($error_array, "Email already in use<br>");
// 			}
// 		} else {
// 			array_push($error_array, "Invalid email format<br>");
// 		}
// 	}else{
// 		array_push($error_array, "Emails don't match<br>");
// 	}

// 	if(strlen($fname) > 25 || strlen($fname) < 2) {
// 		array_push($error_array, "Your first name must be between 2 and 25 characters<br>");
// 	}

// 	if(strlen($lname) > 25 || strlen($lname) < 2) {
// 		array_push($error_array, "Your last name must be between 2 and 25 characters<br>");
// 	}

// 	if($password != $password2) {
// 		array_push($error_array, "Your passwords do not match<br>");
// 	}
// 	else {
// 		if(!preg_match("|^[aA-zZ0-9]|", $password)) {
// 			array_push($error_array, "Your password can only contain english characters or numbers<br>");
// 		}
// 	}

// 	if(strlen($password > 30 || strlen($password) < 5)) {
// 		array_push($error_array, "Your password must be between 5 and 30 characters<br>");
// 	}

// 	if(empty($error_array)) {
// 		$password = password_hash($password, PASSWORD_DEFAULT); //Encrypt password before sending to database

// 		//Generate username by concatenating first name and last name
// 		$username = strtolower($fname . "_" . $lname);
// 		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

// 		$i = 0;
// 		//if username exists and number to username
// 		while(mysqli_num_rows($check_username_query) != 0) {
// 			$i++; //Add 1 to i
// 			$username = $username . "_" . $i;
// 			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
// 		}

// 		//Profile picture assignment
// 		$rand = rand(1, 2); //Random number between 1 and 2

// 		if($rand == 1) {
// 			$profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";
// 		}
// 		else if($rand == 2) {
// 			$profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png"; 
// 		}

// 		$query = mysqli_query($con, "INSERT INTO users (first_name, last_name, username, email, password, signup_date, profile_pic, num_posts, num_likes, user_closed, friend_array) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

// 		// echo mysqli_error($con);
// 		// var_dump($query);

// 		array_push($error_array, "<span style='color: #00b300;'>Your account has been successfully created.<br>
// 			Thank you for registering!</span>");
// 	}

// }


$fname 			= ""; //First name
$lname 			= ""; //Last Name
$email 			= ""; //Email
$password  		= ""; //Password
$password2  	= ""; //Password2
$date 			= ""; //Sign up date
$error_array 	= array(); //Error messages

if(isset($_POST['register_button'])){
	//Registration form values

	$fname = mysqli_real_escape_string($con, $_POST['reg_fname']);
	$lname = mysqli_real_escape_string($con, $_POST['reg_lname']);
	$email = mysqli_real_escape_string($con, $_POST['reg_email']);    
    $password = mysqli_real_escape_string($con, $_POST['reg_password']);
    $password2 = mysqli_real_escape_string($con, $_POST['reg_password2']);   
    //$query = "INSERT INTO users(username, password) VALUES('$username', '$password')"; 

	$date = date("Y-m-d"); //Current date

	//Check if email is in valid format
	if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$email = filter_var($email, FILTER_VALIDATE_EMAIL);

		//Check if email already exists
		$e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$email'");

		//Count the number of rows returned
		$num_rows = mysqli_num_rows($e_check);

		if($num_rows > 0) {
			array_push($error_array, "Адрес электронной почты уже занят<br>");
		}
	}else {
		array_push($error_array, "Неверный формат электронной почты<br>");
	}

	if(strlen($fname) > 25 || strlen($fname) < 2) {
		array_push($error_array, "Ваше имя должно быть от 2 до 25 символов<br>");
	}

	if(strlen($lname) > 25 || strlen($lname) < 2) {
		array_push($error_array, "Ваша фамилия должна быть от 2 до 25 символов<br>");
	}

	if($password != $password2) {
		array_push($error_array, "Ваши пароли не совпадают<br>");
	}
	else {
		if(!preg_match("|^[aA-zZ0-9]|", $password)) {
			array_push($error_array, "Ваш пароль может содержать только английские символы или цифры<br>");
		}
	}

	if(strlen($password > 30 || strlen($password) < 5)) {
		array_push($error_array, "Ваш пароль должен быть от 5 до 30 символов<br>");
	}

	if(empty($error_array)) {
		$password = password_hash($password, PASSWORD_DEFAULT); //Encrypt password before sending to database

		//Generate username by concatenating first name and last name
		$username = strtolower($fname . "_" . $lname);
		$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");

		$i = 0;
		//if username exists and number to username
		while(mysqli_num_rows($check_username_query) != 0) {
			$i++; //Add 1 to i
			$username = $username . "_" . $i;
			$check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
		}

		//Profile picture assignment
		$rand = rand(1, 2); //Random number between 1 and 2

		if($rand == 1) {
			$profile_pic = "assets/images/profile_pics/defaults/head_belize_hole.png";
		}
		else if($rand == 2) {
			$profile_pic = "assets/images/profile_pics/defaults/head_green_sea.png"; 
		}

		$query = mysqli_query($con, "INSERT INTO users (first_name, last_name, username, email, password, signup_date, profile_pic, num_posts, num_likes, user_closed, friend_array) VALUES ('$fname', '$lname', '$username', '$email', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");

		// echo mysqli_error($con);
		// var_dump($query);

		array_push($error_array, "<span style='color: #00b300;'>Ваша учетная запись была успешно создана.<br>Спасибо за регистрацию!</span>");
	}

}

?>