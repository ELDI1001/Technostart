<?php
session_start();

	include("connection.php");
	include("functions.php");

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		//Something was posted
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];	
		
		

		//Here you can add more constraints on the username
		if (!empty($user_name) && !empty($password)){
			
			//Read from database
			$query_login = "select * from login where user_name = '$user_name' limit 1";
			$result = mysqli_query($connection, $query_login);
			if($result && mysqli_num_rows($result) > 0) {
				$user_data = mysqli_fetch_assoc($result);
				if($user_data['password'] == $password) {
					$_SESSION['user_id'] = $user_data['user_id'];				
					header("Location: index.php");
					die;
				}
			}
			echo "WRONG USERNAME OR PASSWORD";
		}
		else {
			echo "USERNAME CAN NOT BE BLANK";		
		}
	}	
?>

<html>
<head>
	<title>Login</title>
</head>
<body>

	<style type="text/css">
	
	.video-container{
		width: 100vw;
		height: 100vh;
	}
	
	iframe {
		position: absolute;
		top: 50%;
		left: 50%;
		width: 10ovw;
		height: 100vh;
		transform: translate(-50%, -50%);
	}
	#text{
		
		height: 50px;
		border-radius: 5px;
		padding: 4px;
		border: solid thin #aaa;
		border-color: black;
		width: 100%;
		margin: auto;	
	}
	
	#button {
	
		padding: 10px;
		width: 250px;
		color: white;
		border-radius: 5px;
		background-color: peru;
		border: none #aaa;
		font-size: 20px;
		width: 100%;
			
	}
	
	#box{
	
		margin: auto;
		width: 300px;
		position: absolute;
		left: 50%;
		top: 50%;
		transform: translate(-50%, -50%);
	}
	
	@media (min-aspect-ratio: 16/9) {
		.video-container iframe {
			height: 56.25vw;
		}
	}
	
	@media (max-aspect-ratio: 16/9) {
		.video-container iframe {
			width: 177.78vh;
		}
	}
		
	</style>
	
	<div class="video-container">
		<iframe width=100% height=100%
			src="https://www.youtube.com/watch?v=NxuJWImTKTY?controls=0&autoplay=1&showinfo=0&mute=1&playsinline=1&loop=1" frameborder = 0
			allowfullscreen>
		</iframe>
	</div>
	
	
	<div id="box">
		<form method="post">
			<div style="font-size: 35px;margin: 10px;color:darkgrey;text-align: center; border-color: black;border-radius: 5px">PLEASE LOGIN</div><br>
			<input id="text" type="text" name="user_name" placeholder="Username"><br><br>
			<input id="text" type="password" name="password" placeholder="Password"><br><br>
					
			<input id="button" type="submit" value="LOGIN"><br><br>
			
			
			<a href="signup.php" style="color: white" >Signup here! </a><br><br>
		
		</form>	
	
	</div>
	
</body>
</html>
