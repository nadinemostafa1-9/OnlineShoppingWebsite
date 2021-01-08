<?php

 include ("includes/productController.php");

 Session::init();

 ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--BOOTSTRAP meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--BOOTSTRAP stylesheet-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <!--home style sheet-->
  <link rel="stylesheet" type="text/css" href="css/main.css?<?php echo time(); ?>">
  <!--navbar style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Header.css?<?php echo time(); ?>">

  <!--BOOTSTRAP-->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <title>Home Page</title>
</head>
<body>

  <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <?php include ("Header.php");
   ?>

  <!--------------------------------------------------------------------home page image slider using bootstrap------------------------------------------------>
  <div class="image_slider">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="https://www.plasticstoday.com/sites/cet.com/files/PTI-ecommerce-AdobeStock_207963206.jpg" alt="First slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://cdn.shopify.com/s/files/1/0898/4708/articles/global-ecommerce-marketplace.png?v=1538348244" alt="Second slide">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="https://v5c5v6u7.stackpathcdn.com/wp-content/uploads/2018/10/global-ecommerce.jpg" alt="Third slide">
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
  <!-------------------------------------------------------------------------------------------------------------------------------------------------------------->

  <div class="card-group">

     <?php displayAllProducts() ?>

  </div>


  <?php
  if(Session::logged()){
  $arr = Customer::get_search_history_array(Session::get('customer_id'));

  if(count($arr)!=1){
   ?>
  <!--------------------------recommended products section-------------------------------->
  <div class="recommended">
    <h2>Recommended for You</h2>
  </div>
  <!--------------------------------------------------------------------------------------->

 <div class="cards-center">
  <div class="total">
    <?php displayRecommended(0); ?>


  </div>
</div>
<?php } }?>
  <div class="footer">
    <br>
    <p>Shoppera is an online store where you can get anything you imagine. While using Shoppera, you agree to have read and accepted our terms of use, cookie and privacy policy.</p>
    <br>
    <p>All rights reserved.</p>
  </div>

</body>
</html>
