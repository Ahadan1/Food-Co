<?php
include("../connection/connect.php");
error_reporting(0);
session_start();

if(isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($db, $_POST['user_name']);
    $password = $_POST['password'];
    
    if(!empty($_POST["submit"])) {
        $loginquery = "SELECT * FROM admin_users WHERE username=?";
        $stmt = mysqli_prepare($db, $loginquery);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result);
        
        if($row && password_verify($password, $row['password'])) {
            $_SESSION["admin_id"] = $row['id'];
            $_SESSION["is_admin"] = true;
            header("location:dashboard.php");
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
    <title>Admin Login</title>
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="assets/styles.css" rel="stylesheet" media="screen">
     <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
  </head>
  <body id="login">
    <div class="container">
      <form class="form-signin" action='' method='post'>
        <h2 class="form-signin-heading">Admin Login</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="user_name" required>
        <input type="password" class="input-block-level" placeholder="Password" name="password" required>
        <label class="checkbox">
          <input type="checkbox" value="remember-me"> Remember me
        </label>
        <input name='submit' class="btn btn-large btn-primary" type="submit" value='Sign in'>
        <center><?php echo '<div style="color:red;">'.$message.'</div>'; ?></center>
      </form>
    </div> <!-- /container -->
    <script src="vendors/jquery-1.9.1.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>