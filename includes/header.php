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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
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
					<li><a href="#"><i class="fas fa-home"></i></a></li>
					<li><a href="#"><i class="fas fa-envelope"></i></a></li>
					<li><a href="#"><i class="fas fa-cog"></a></i></li>
					<li><a href="/social-network/includes/handlers/logout.php"><i class="fas fa-sign-out-alt"></i></a></li>
				</ul>
			</nav>
		</div>
	</div>


	<div class="wrapper">