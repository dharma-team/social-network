<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once 'includes/header.php';

?>
	
	<div class="side_left">
		<nav>
			<a href="#">New</a>
			<a href="#">Profile</a>
			<a href="#">Friends</a>
			<a href="#">Chat</a>
			<a href="#">Music</a>
			<a href="#">Community</a>
		</nav>
		<!-- <h1>Hello <php echo $user['first_name'] . " " . $user['last_name'];?></h1> -->

		<div class="main_column">
			<p>This is a profile page!</p>
		</div>	
	</div>

	<div class="side_right">
		<div class="user_details">
			<a href=""> <img src="<?php echo $user['profile_pic']; ?>"> </a>
			
			<div class="user_details_left_right">
				<a href="#">
					<?php echo $user['first_name'] . " " . $user['last_name'];?>
				</a>
				<br>
				<?php echo "Post: " . $user['num_posts']. "<br>";
				echo "Likes: " . $user ['num_likes'];
				?>
			</div>	
		</div>
	</div>	


</div>
</body>
</html>
