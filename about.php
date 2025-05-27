<?php
include('connection/connect.php');

 session_start(); //session started by unique user_id
  
error_reporting(0);                                                                      //for printing the  text
  $sql = "SELECT * FROM signup where user_id='".$_SESSION["user_id"]."'";
  $result = mysqli_query($db, $sql);
  $row = mysqli_fetch_array($result);
  $name=$row['firstname'];

  if($_SESSION["user_id"]==0)
  {
	  $none='none';
  }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>About - Cooking Recipe </title>
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
						<a href="featured.php">Recipe of Month</a>
					</li>
					
					<li class="current">
						<a href="about.php">About</a>
					</li>
					<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li><a href="login.php">login</a></li>';
								echo '<li><a href="signup.php">signup</a></li>';
							}
						else
							{		
									$logout= '<form action="login.php" method="post" >
									<input type="submit" id="logout" name="logout" value="logout" style="width:100px;color:#000;border:none;padding:5px;font-size:15px;"  ></form>';
							}

						?>
					
				</ul>
			</div>
			<div class="body">
				<div id="content">
					<div>
						<div>
							<h4>What is Food&Co?</h4>
							<p>
								it's our (group 6) Web Application Project for 4ISA2 which is a requirement for us to be able to take the final exam (MT).
							</p>
							<h4>Our history</h4>
							<p>
								When we were assigned to make this project, we were given a choice to make it about anything we want. We chose to make it about food recipes because we thought it would be fun and interesting to make.
							</p>
							<h4>How can I contact you if I have a complaint and contact response times</h4>
							<p>
								You can contact us by submitting a service ticket at: https://github.com/Ahadan1/ or https://github.com/Dimas-GPU/
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