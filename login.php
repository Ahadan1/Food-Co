<?php
include("connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit'])) {
	$username = mysqli_real_escape_string($db, $_POST['user_name']);
	$password = mysqli_real_escape_string($db, $_POST['password']);
	
	if(!empty($_POST["submit"])) {
		// First check if it's an admin login
		$adminQuery = "SELECT * FROM admin_users WHERE username='$username' AND password='$password'";
		$adminResult = mysqli_query($db, $adminQuery);
		$adminRow = mysqli_fetch_array($adminResult);
		
		if(is_array($adminRow)) {
			$_SESSION["admin_id"] = $adminRow['id'];
			$_SESSION["is_admin"] = true;
			header("location:admin/dashboard.php");
			exit();
		}
		
		// If not admin, check regular user login
		$loginquery = "SELECT * FROM signup WHERE email='$username' && password='$password'";
		$result = mysqli_query($db, $loginquery);
		$row = mysqli_fetch_array($result);
		
		if(is_array($row)) {
			$_SESSION["user_id"] = $row['user_id'];
			$_SESSION["is_admin"] = false;
			header("location:index.php");
			exit();
		} else {
			$message = "Invalid Username or Password!";
		}
	}
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <!-- Bootstrap -->
    <link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="admin/assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="admin/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">

      <form class="form-signin" action='' method='post'>
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Email or Username" name="user_name" required>
        <input type="password" class="input-block-level" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
		
        <input name='submit' class="btn btn-large btn-primary" type="submit" value='Sign in'>
		<center ><?php echo  '<div style="color:red;"> '.$message.'</div>';?></center>
      </form>

    </div> <!-- /container -->
    <script src="admin/vendors/jquery-1.9.1.min.js"></script>
    <script src="admin/bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>