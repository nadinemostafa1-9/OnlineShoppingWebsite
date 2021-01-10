<?php
include 'includes/class-autoload.inc.php';
Session::init();
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>About - us</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/About-us.css?<?php echo time();?>">
    <link rel="stylesheet" href="css/Header.css?<?php echo time();?>">
    <?php if(Session::get('seller_id')){?>
    <link rel="stylesheet" href="css/Seller Header.css?<?php echo time();?>"><?php } ?>


</head>

<body>


    <!-- home
    ================================================== -->
    <main class="s-home s-home--slides">



        <div class="home-slider">
            <div class="home-slider-img" style="background-image: url(images/slide-01.jpg);"></div>
        </div>
        <div class="home-content">
              <!--BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <?php if(Session::get('seller_id')){
    include ("Seller_Header.php");}
    else {
      include ("Header.php");
    }
     ?>
            <div class="row home-content__main">

                <div class="col-eight home-content__text pull-right">
                    <h3>Welcome to Shoppera</h3>

                    <h1>
                    Our history
                    </h1>

                    <p>
                      Shoppera, an online retail company in Egypt.
                      It was established in 2020 with a vision and goal to become a one-stop shop (one-stop shop)<br> for retail in Egypt with the application of best practices.
                      <br>Delivery service is available all over Egypt.<br>
                      Shoppera gives you the largest range of products competitive price.<br>
                      Experiment shopping easy to use.
                    </p>


                </div>  <!-- end home-content__text -->

                <div class="col-four home-content__counter">
                    <h3>Launching In</h3>

                    <div class="home-content__clock">
                        <div class="top">
                            <div class="time days">
                                19
                                <span>Day</span>
                            </div>
                        </div>
                        <div class="time Months">
                            1
                            <span>Jan</span>
                        </div>
                        <div class="time year">
                            2021
                            <span>Year</span>
                        </div>

                    </div>  <!-- end home-content__clock -->
                </div>  <!-- end home-content__counter -->

                  <?php include ("Footer.php")?>
            </div>  <!-- end home-content__main -->


            <div class="row home-copyright">
                <span>Copyright Count 2020</span>
            </div> <!-- end home-copyright -->



    </main> <!-- end s-home -->

</body>

</html>
