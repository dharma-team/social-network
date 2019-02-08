<?php
ini_set('display_errors',1);
error_reporting(E_ALL);

include_once 'includes/header.php';
include_once 'includes/classes/User.php';
include_once 'includes/classes/Post.php';
//session_destroy();

if(isset($_POST['post'])){
	$post = new Post($con, $userLoggedIn);
	$post->submitPost($_POST['post_text'], 'none');
	//var_dump($post->submitPost($_POST['post_text']));
}

?>
	
	<div class="side_left">
		<nav>
			<a href="#">New</a>
			<a href="<?php echo $userLoggedIn; ?>">Profile</a>
			<a href="#">Friends</a>
			<a href="#">Chat</a>
			<a href="#">Music</a>
			<a href="#">Community</a>
		</nav>
		<!-- <h1>Hello <php echo $user['first_name'] . " " . $user['last_name'];?></h1> -->

		<div class="main_column">
			<form class="post_form" action="index.php" method="POST">
				<textarea name="post_text"id="post_text" placeholder="Есть что сказать?"></textarea>
				<input type="submit" name="post" id="post_button" value="Post">
			</form>	
		</div>	

	<div class="post_box">
	<?php 
		$post = new Post($con, $userLoggedIn);
		$post->loadPostsFriends();
	?>
	</div>
	</div>

	<div class="side_right">
		<div class="user_details">
			<a href="<?php echo $userLoggedIn; ?>"> <img src="<?php echo $user['profile_pic']; ?>"> </a>
			
			<div class="user_details_left_right">
				<a href="<?php echo $userLoggedIn; ?>">
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
