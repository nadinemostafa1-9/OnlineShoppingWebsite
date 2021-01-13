<?php
declare(strict_types = 1);
include 'includes/class-autoload.inc.php';
Session::init();
 ?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet"href="css/login.css? <?php echo time();?>"type="text/css"/>
  <link rel="stylesheet"href="css/Header.css? <?php echo time();?>"type="text/css"/><!----stylefooter----->
  <style>
</style>
</head>
<body>
<div>
<form  action="includes/login.inc.php"class="container" method="post">
<h1>Login</h1>
<hr>
 <?php Session::getMsg(); ?>
<label for="email"><b>Email</b></label>
<input type="text"  name="em" required>
<label for="psw"><b>Password</b></label>
<input type="password"  name="pass" required>
<button type="submit" name="login" class="btn">Login</button>
<p>Don't have an account? <a href="signup.php">Sign up</a></p>
</form>
</div>
<div class="logal"><a class="logallogo"href="#">Shoppera</a></div>

</body>
</html>
