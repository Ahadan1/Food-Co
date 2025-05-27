<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>success signup </title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<div class="header">
		<div>
			<a href="index.php"><img src="images/logo.png" alt="Logo"></a>
		</div>
		
	</div>
	<div class="body">
		<div>
			<div class="header">
				<ul>
					<li>
						<a href="index.php">Home</a>
					</li>
					<li>
						<a href="recipes.php">Recipes</a>
					</li>
					<li>
						<a href="featured.php">Featured Recipes</a>
					</li>
					
					<li >
						<a href="about.php">About</a>
					</li>
				
					
				</ul>
			</div>
			<div class="body">
				<div id="content">
					<div>
						<div>
							<center><h4>Successfully Registered!</h4></center>
							<p>
								<center>Now you are the part of cooking website <a href="login.php">click here</a> to login.</center>
							</p>

							
						</div>
					</div>
				</div>
			</div>
		</div>
		<div>
			<div>
				<h3>Cooking Video</h3>
				<a href="videos.php"><img src="images/cooking-video.png" alt="Image"></a>
				<span>Vegetable &amp; Rice Topping</span>
			</div>
			<div>
				<h3>Featured Recipes</h3>
				<ul id="featured">
					<li>
						<a href="recipes.php"><img src="images/sandwich.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Ham Sandwich</a></h2>
							<span>by: Anna</span>
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/biscuit-and-coffee.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Biscuit &amp; Sandwich</a></h2>
							<span>by: Sarah</span>
						</div>
					</li>
					<li>
						<a href="recipes.php"><img src="images/pizza.jpg" alt="Image"></a>
						<div>
							<h2><a href="recipes.php">Delicious Pizza</a></h2>
							<span>by: Rico</span>
						</div>
					</li>
				</ul>
			</div>
			
			<div>
				<h3>Contact</h3>
				<div><a href="https://github.com/Ahadan1" target="_blank" id="github">Github - Muhammad Ahadan Fauzi</a></div>
				<div><a href="https://github.com/Dimas-GPU/" target="_blank" id="github">Github - Dimas Rafi Adhipramana</a></div>
			</div>
			<div style="display:<?php echo $none;?>;">
				<h3>Settings</h3>
				<a href="#"  ><?php echo $logout;?></a>
				
				 
			</div>
		</div>
	</div>
	<div class="footer">
		<div>
			<p>
				&copy;WAP Project 4ISA2 Kelompok 6 
			</p>
		</div>
	</div>
</body>
</html>