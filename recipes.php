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
	<title >Recipes </title>
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
					<li class="current">
						<a href="recipes.php"> Recipes</a>
					</li>
					<li>
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
						<ul>
	<?php					
		    $sql = "SELECT * FROM recipes ORDER BY rid DESC";
			$result = mysqli_query($db, $sql);
		while($row = mysqli_fetch_array($result))
				{
						$rid =  $row['rid'];
						$rimage =  $row['rimage'];
						$rname =  $row['resname'];
						$rtext =  $row['rtext'];
					
				echo		'<li>';
				echo				"<a href=fullrecipy.php?DISC=".$row['rid']."><img  style='width:150px;
	                         height:180px;
							 margin-top:5px;
							 margin-left:5px; 
							 border-radius:5px;
							' src='admin/img/".$row['rimage']."' ></a>";
				echo				'<div>';
				echo					"<h3><a href=fullrecipy.php?DISC=".$row['rid'].">$rname</a></h3>";
				echo					"<p>
										$rtext
									</p>";
				echo				'</div>';
				echo			'</li>';
				}		
			?>							
						</ul>
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