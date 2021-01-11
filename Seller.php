<?php
include ("includes/prodFun.php");
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

   <link rel="stylesheet" href="css/Seller.css?<?php echo time();?>">
   <link rel="stylesheet" href="css/Seller Header.css?<?php echo time();?>">


	<title>Seller Page</title>
</head>
<body>
  <!--BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>



    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <?php include("Seller_Header.php")?>
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
<?php displaySeller(); ?>

  </div>

  <?php include ("Footer.php")?>

</body>
</html>
