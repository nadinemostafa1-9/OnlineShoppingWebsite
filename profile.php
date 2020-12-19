<?php
include 'includes/class-autoload.inc.php';
Session::init();
 ?>
 <html>
 <head>
<h1>Profile</h1>
 </head>
 <body>
   <?php
    Session::getMsg();
    ?>
   <form action="includes/profile.inc.php" method="POST">
     <p>
   <label for="first_name"><b>First name</b></label>
   <input type="text" name="first_name" value="<?php echo Session::get('fname'); ?>" required>
<br>
   <label for="last_name"><b>Last name</b></label>
   <input type="text" name="last_name" value="<?php echo Session::get('lname'); ?>" required>
<br>
  <label for="email"><b>Email</b></label>
  <input type="email" name="email" value="<?php echo Session::get('Email'); ?>" required>
<h3>Change Password:</h3>
  <label><b>Old Password</b></label>
   <input type="password"  name="password"  minlength="8" value="" placeholder="" title="Must contain at least one character and one number">
<br>
  <label ><b>New Password</b></label>
  <input type="password"  name="new" placeholder="">
<br>
<button type="submit" value="Save Changes"  name="save">Save Changes</button>
<button type="submut" value="Cancel" name="cancel">Cancel</button>
<br>


 </form>

 </body>
