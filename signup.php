<?php
include("connection/connect.php");

if(isset($_POST['submit']))
{
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];	
	$password=$_POST['password'];
	$sql = "INSERT INTO signup(firstname,lastname,email,password) VALUES('$fname','$lname','$email','$password')";
	 $query=mysqli_query($db, $sql);
	if($query)
	{
		header('location:signup_success.php');
	}
}
 
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>signup</title>
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
					
					<li class="">
						<a href="about.php">About</a>
					</li>
					<?php
						if(empty($_SESSION["user_id"]))
							{
								echo '<li><a href="login.php">login</a></li>';
								echo '<li class="current"> <a href="signup.php">signup</a></li>';
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
							<center><h3>Sign up</h3></center>
					    <form action='' method='post'>
					    	<div>
						    	<span><label>FIRST-NAME</label></span>
						    	<span><input type="text" value="" name='fname'></span>
						    </div>
							<div>
						    	<span><label>LAST-NAME</label></span>
						    	<span><input type="text" value="" name='lname'></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value="" name='email'></span>
						    </div>
						    <div>
						     	<span><label>PASSWORD</label></span>
						    	<span><input type="text" value="" name='password'></span>
						    </div>
						    
						   <div>
						   		<span><input type="submit" name='submit' value="Submit"></span>
						  </div>
					    </form>
						
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