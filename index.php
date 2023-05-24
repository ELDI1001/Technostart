<?php
session_start();
	include("connection.php");
	include("functions.php");
	$user_data = check_login($connection);
	
	//Get user_name
	if ($user_data['user_name'] == "kingzaiz1") {
		$u_name = "kingzaiz1";
	}
	else {
		$u_name = $user_data['user_name'];	
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Teknostart Login</title>
	<script type = 'text/javascript'src="https://cdn.plot.ly/plotly-latest.min.js"></script>
	
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
		width: 100%;
		margin: auto;	
	}
	
	#button {
	
		padding: 10px;
		width: 250px;
		color: white;
		border-radius: 5px;
		background-color: firebrick;
		border: none #aaa;
		font-size: 20px;
		width: 20%;
			
	}
	
	#box{
	
		margin: auto;
		width: 90%;
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
	<h1 style="color:lightgrey"><center>Overview for group <span> <?php echo $u_name;?></span></center></h1>
	<br>
	<center><input id="button" type="submit" value="LOGOUT", onclick="location.href='logout.php';"></center><br><br>
	<div id = 'Power Input'></div>
	<div id = 'Charge'></div>
	<div id = 'Battery Temperature'></div>
	<div id = 'Battery Voltage'></div>
	<div id = 'Battery Current'></div>
	<div id = 'IO Voltage'></div>
	<div id = 'IO Current'></div>
	<div id = 'Temperature'></div>
	
	<!--Import the plotting functions -->
	<script src = "plotting.js"></script>
	<script type="text/javascript" >
		var group= '<?php echo $u_name; ?>';
		main(group);
	</script>
	
	</div>	
</body>
</html>
