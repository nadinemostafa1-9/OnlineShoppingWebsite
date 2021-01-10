<?php
include 'includes/class-autoload.inc.php';
Session::init();
if(!Session::logged()){
  die("You are not logged in");
}

 ?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><!--for icons--->
<link rel="stylesheet" type="text/css"href="css/customer(profile).css?<?php echo time();?>">
<link rel="stylesheet" type="text/css"href="css/Seller Header.css?<?php echo time();?>">


	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/signup.js"></script>
<title>seller profile</title>
</head>
  <body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <?php include ("Seller_Header.php") ?>
  <!----- image---->
 <div class="text-center">
  <img src="images/ava.jpg" class="rounded" alt="avatar"></div>
 <!------- rank--->
 <?php $seller = new Seller();
  $rank = $seller->updateRank();
 ?>
   <div class="card">Rank:<?php echo $rank ?>
   </div>
   <!------form---->
 <div class="container">
     <h2>My Information</h2>
     <?php
     Session::getMsg();
     ?>
    <form class="form-horizontal" action="includes/seller.profile.inc.php" method="post">
    <div class="form-group">
         <label for="Firstname"><b>First name</b></label>
      <input class="in"type="text" placeholder="Enter Firstname" name="first_name" value="<?php echo Session::get('fname'); ?>" required>
        <label for="Lasttname"><b>Last name</b></label>
      <input class="in"type="text" placeholder="Enter Lastname" name="last_name" value="<?php echo Session::get('lname'); ?>" required>
      <label class="in" for="email"><b>Email</b></label>
   <input class="in"type="email" placeholder="Enter Email" name = "email" value="<?php echo Session::get('email'); ?>" required>
    </div><!-----for change password---->
    <!--------- button edit------>
     <button type="button" class=" editchange all" data-toggle="collapse" data-target="#dem">Edit</button>
       <div id="dem" class="collapse">
        <p class="changepass">Change Password?</p>
     <button type="button" class="ch all" data-toggle="collapse" data-target="#demo">Change</button>
      <div id="demo" class="collapse">
      <div class="form-group">
      <label for="password"><b>Old Password</b></label>
      <input class="in" type="password"  name="password" >
      <label for="new"><b>New Password</b></label>
      <input class="in" type="password" id="password" name="new" >
      <label for="psw"><b>Confirm Password</b></label>
       <input class="in" type="password"  id="confirm_password" name="psw" >
      </div>
     </div>
    <!-----for buttons--->
    <div class="tocenter">
     <button type="submit" class="chan all"  name="save">Submit</button>
    <button type="submit" class="chancancel all" name="cancel">Cancel</button>

   </div>

    </div>
    </form>
 </div>
  </body>
</html>
