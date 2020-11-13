<?php
declare(strict_types = 1);
include 'includes/class-autoload.inc.php';
Session::init();
 ?>
<!DOCTYPE html>
 <html lang=en dir="ltr">
 <head>
<title>login</title>
<meta charset="utf-8">

 </head>
 <body>
<h1>LOG IN</h1>
<?php Session::getMsg(); ?>
<form action="includes/login.inc.php" method="POST">
  <p>
Email:
<input type="text" name="em">
</p>
<p>
Password:
<input type="password" name="pass">
</p>
<p>
<input type="submit" name="login" value="Log in">
<input type="submit" name="cancel" value="Cancel">
</form>

 </body>
