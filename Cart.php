<?php

 include ("includes/cartController.php");
 if(!Session::logged()){
   die("You are not logged in");
 }
 ?>
<!DOCTYPE html>
    <html lang="en">
        <head>
             <meta charset="utf-8">
             <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
             <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
             <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
             <link rel="stylesheet" href="css/Cart.css? <?php echo time(); ?>"/>
             <link rel="stylesheet" href="css/Header.css? <?php echo time(); ?>"/>

        </head>
        <body>

  <!--BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
    <?php include ("Header.php");
    ?>



  <div class="invoice">
  <div class="title">
    <h2 class="itemprice"><svg width="40px" height="40px" viewBox="0 1 16 16" class="bi bi-cart-check-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM4 14a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm7 0a1 1 0 1 1 2 0 1 1 0 0 1-2 0zm.354-7.646a.5.5 0 0 0-.708-.708L8 8.293 6.854 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
       </svg>My Cart</h2>
  </div>
  <hr>
  <?php $cust_id=Session::get('customer_id');
  $cart=gettingCart($cust_id); ?>
<div class="card-group">
  <?php
displayCart($cart);
 ?>
    </div>
  <hr>
  <div>
    <div class="itemprice">
      <?php $cust_id=Session::get('customer_id');
      $cart=gettingCart($cust_id);
      $sum = $cart->getTotalSum();
      if($sum != 0){
      echo 'Total = '.$sum;
    }else {
        echo 'There is no items in the cart';
      } ?>
    </div>
  </div>
  <?php if($sum != 0){ ?>
                  <div class="add-btn2">
                  <a href="Shipping_Information.php">
                   <button href="#" class="card-btn">Complete the order</button></a>
                   <a href="HOME.php">
                   <button href="#" class="carde-btn">Cancel</button></a>
                  </div>
                  <br>
                  <?php } ?>

  </div>
		<?php include ("Footer.php")?>
        </body>
    </html>
