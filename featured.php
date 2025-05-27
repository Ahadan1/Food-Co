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
	<title>Recipy of month</title>
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
					<li class="current">
							<a href="featured.php">Recipe of Month</a>
					</li>
					
					<li>
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
							<h3>EASY LOW SUGAR WINE JELLY</h3>
							<p>
								This Easy Low Sugar Wine Jelly recipe takes just minutes, and its mellow, not-too-sweet flavor enhances everything from cheese and crackers to turkey sandwiches.  Make some for yourself, then post the recipe on the fridge, you’re going to want to make it for every party you throw, and for every party you’re invited to, from here on in.
							
							</p>
							<a href="index.php"><img src="images/chicken-mushroom.jpg" alt="Image"></a>
							<p>
								<br>I infused my first batch of wine jelly with cardamom pods, and I have to admit it was a last minute decision after I poured a bottle of Merlot into my big cast iron pot ~ it just looked a little naked.   The cardamom adds a little extra layer of mystery to the flavor and really complements the wine.  You can use as few as 10 or as many as you like for a stronger flavor.  You can strain them out, or even leave them in, just be sure to crack them first to release the little seeds.
							</p>
							<p>
								<br>
								EASY LOW SUGAR WINE JELLY
Posted on September 15, 2017
Pin
Stumble
Share
Yum
Tweet
+1
This Easy Low Sugar Wine Jelly recipe takes just minutes, and its mellow, not-too-sweet flavor enhances everything from cheese and crackers to turkey sandwiches.  Make some for yourself, then post the recipe on the fridge, you’re going to want to make it for every party you throw, and for every party you’re invited to, from here on in.




Have you ever had wine jelly?  I didn’t even know this stuff existed until I stopped to sample some at our farmers market.  What a fabulous idea, and it couldn’t be easier (really! Check out my short video, below)  I’m excited to share this with you because we love cheese plate nights in our house, and this gives us a whole new flavor and texture to play with.
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
			<h3>Blog</h3>
				<ul id="blog">
					<li>
						<a href="blog.html">placeholder text buat blog.html/blog.php</a>
						<span class="date">May 1, by Noone</span>
					</li>
					<li>
						<a href="blog.html">placeholder text buat blog.html/blog.php</a>
						<span class="date">May 4, else but</span>
					</li>
					<li>
						<a href="blog.html">placeholder text buat blog.html/blog.php</a>
						<span class="date">May 31, me</span>
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