<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once 'config/config.php';
include_once 'includes/form_handlers/register_handler.php';
include_once 'includes/form_handlers/login_handler.php';


?>

<html>
<head>
	<title>YoHey</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<?php

	if(isset($_POST['register_button'])) {
		echo '
		<script>
	
		$(document).ready(function() {
			$("#first").hide();
			$("#second").show();
			});

		</script>
		';
	}

	?>

	<div class="wrapper">
		<div class="login_box">

			<div class="login_header">
				<h1><span class="two_letters">Yo</span><span class="three_letters">Hey</span></h1>
				Войдите или зарегистрируйтесь ниже.
			</div>
			
			<div id="first">
				<form class="form_login" action="register.php" method="POST">
					<input type="email" name="log_email" placeholder="Email Address" value="<?php
					if(isset($_SESSION['log_email'])) {
						echo $_SESSION['log_email'];
					}	
					?>" required>
					<br>
					<input type="password" name="log_password" placeholder="Password">
					<br>
					<input type="submit" name="login_button" value="Login">
					<br>
					<?php if(in_array("Неверный адрес электронной почты или пароль<br>", $error_array)) echo "Неверный адрес электронной почты или пароль<br>"; ?>
				</form>
				<div class="box_sigup">
					<p>Ещe нет аккаунта?</p>
					<a href="#" id="signup" class="signup">Зарегистрируйтесь</a>
				</div>
			</div>
			
			<div id="second">
				<form class="form_reg" action="register.php" method="POST">
					<input type="text" name="reg_fname" placeholder="First Name" value="<?php
					if(isset($_SESSION['reg_fname'])) {
						echo $_SESSION['reg_fname'];
					}	
					?>" required>
					<br>
					<?php if(in_array("Ваше имя должно быть от 2 до 25 символов<br>", $error_array)) echo "Ваше имя должно быть от 2 до 25 символов<br>"; ?>

					<input type="text" name="reg_lname" placeholder="Last Name" value="<?php
					if(isset($_SESSION['reg_lname'])) {
						echo $_SESSION['reg_lname'];
					}	
					?>" required>
					<br>
					<?php if(in_array("Ваша фамилия должна быть от 2 до 25 символов<br>", $error_array)) echo "Ваша фамилия должна быть от 2 до 25 символов<br>"; ?>

					<input type="email" name="reg_email" placeholder="Email" value="<?php
					if(isset($_SESSION['reg_email'])) {
						echo $_SESSION['reg_email'];
					}	
					?>" required>
					<br>
					<?php if(in_array("Адрес электронной почты уже занят<br>", $error_array)) echo "Адрес электронной почты уже занят<br>";
					else if(in_array("Неверный формат электронной почты<br>", $error_array)) echo "Неверный формат электронной почты<br>"; ?>

					<input type="password" name="reg_password" placeholder="Password" required>
					<br>
					<input type="password" name="reg_password2" placeholder="Confim Password" required>
					<br>
					<?php if(in_array("Ваши пароли не совпадают<br>", $error_array)) echo "Ваши пароли не совпадают<br>";
					else if(in_array("Ваш пароль может содержать только английские символы или цифры<br>", $error_array)) echo "Ваш пароль может содержать только английские символы или цифры<br>"; 
					else if(in_array("Ваш пароль должен быть от 5 до 30 символов<br>", $error_array)) echo "Ваш пароль должен быть от 5 до 30 символов<br>"; ?>

					<input type="submit" name="register_button" value="Register">
					<br>

					<?php if(in_array("<span style='color: #00b300;'>Ваша учетная запись была успешно создана.<br>Спасибо за регистрацию!</span>", $error_array)) echo "<span style='color: #00b300;'>Ваша учетная запись была успешно создана.<br>Спасибо за регистрацию!</span>";?>
				</form>
				<div class="box_sigin">
						<p>Уже есть аккаунт?</p>
						<a href="#" id="signin" class="signip">Войти</a>
				</div>	
			</div>
		</div>
	</div>

</body>
</html>