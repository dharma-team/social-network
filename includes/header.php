<?php
include_once 'config/config.php';

if (isset($_SESSION['username'])) {
	$userLoggedIn = $_SESSION['username'];
	$user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
}
else {
	header("Location: register.php");
}

//var_dump($userLoggedIn);

?>

<html>
<head>
	<title>Welcome to YoHey</title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
	
	<div class="header_wrapper">
		<div class="top_bar">
			<div class="logo">
				<a href="index.php">YoHey</a>
			</div>

			<div class="search">
				<input type="text" name="q" placeholder="Search..." autocomplete="off">
			</div>

			<nav>
				<ul>
					<li><a href="#">Home</a></li>
					<li><a href="#">Messages</a></li>
					<li><a href="#">Setting</a></li>
				</ul>
			</nav>
		</div>
	</div>


	<div class="wrapper">