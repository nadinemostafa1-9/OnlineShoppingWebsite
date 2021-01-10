<?php
include 'includes/class-autoload.inc.php';
Session::init();
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><!--for icons--->
<link rel="stylesheet" type="text/css"href="css/problem.css?<?php echo time();?>">
<?php if(Session::get('seller_id')){?>
<link rel="stylesheet" href="css/Seller Header.css?<?php echo time();?>"><?php } ?>
<link rel="stylesheet" type="text/css"href="css/Header.css?<?php echo time();?>">

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<title>report a problem</title>
</head>
  <body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <?php
    if(Session::get('seller_id')){
      include ("Seller_Header.php");
    }else {
      include ("Header.php");
    }
   ?>

   <!------form---->
 <div class="container">
    <form class="form-horizontal k" action="includes/prob.inc.php" method="post">
         <h2 class="hh">Report a problem</h2>
    <div class="form-group">
      <label class="emaildesign" for="email"><b>Email</b></label>

   <div class="inpu"><input class="form-control" name = "email" type="email" placeholder="Enter Email"  required></div>
    </div><!-----write problem---->
    <div class="form-group">
  <label for="problem" class="prob">Write your problem:</label>
 <div class ="d"> <textarea class="form-control"  name "prob" rows="5" id="comment"></textarea></div>
</div>
    <!--------- button edit------>
 <div class="buttonsdesign">
   <button type="submit" class="sub " name = "report" data-toggle="collapse" data-target="#demo" required>Submit</button>

  <button type="reset" class="can">Cancel</button>
<div id="demo" class="collapse">
      <div class="alert alert-success">
  <strong>Success!</strong> Your problem is sent thanks for sharing us
</div>      </div>

     </div>

  </div>
    </form>
 </div>

  </body>
</html>
