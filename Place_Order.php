<?php
include 'classes/Order.php';
 include 'includes/cartFun.php' ;
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

  <!--page style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Place Order.css?<?php echo time();?>">
  <!--Navbar style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Header.css?<?php echo time();?>">

  <title>Place Order</title>
</head>
<body>

  <!--BOOTSTRAP -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

  <?php include ("Header.php"); ?>

  <form class="place-order" action="includes/checkout.inc.php" method="post">
    <div id="callout" class="callout">
      <div class="callout-header">Checkout</div>
      <span class="closebtn2" onclick="this.parentElement.style.display='none';">&times;</span>
      <div class="callout-container">
        <p class="check-info"><b>Delivery Addrress: </b></p>
        <?php $dataa=new Order;
    $data=$dataa->ReturnData();

     ?>
        <p name="" class="check-info"><?php echo $data['address'];?></p>
        <br>
        <p class="check-info"><b>Phone Number:  </b></p>
        <?php  $data=new Order;
$no=$data->ReturnData();
  ?>
        <p name="" class="check-info"><?php echo $no['phone_number'];?></p>
        <br>
        <p class="check-info"><b>Delivery Fees: </b></p>
        <?php $data=new Order;
$data=$data->placeorder();
  ?>
        <p name="" class="check-info"><?php echo $data['delivery'];?></p>
        <br>
        <p class="check-info"><b>Payment Method: </b></p>
        <?php  $data=new Order;
$data=$data->placeorder();
 ?>
        <p name="" class="check-info"> <?php echo $data['pay']; ?></p>
        <br>
        <p class="check-info"><b>Discount: </b></p>
        <?php  $data=new Order;
$data=$data->placeorder();
 ?>
        <p name="" class="check-info"><?php echo $data['dis']; ?></p>
        <br>
        <p class="check-info"><b>Total: </b></p>
        <?php  $data=new Order;
$data=$data->placeorder();
 ?>
        <p name="" class="check-info"><?php echo $data['total']; ?></p>
        <br>
        <div class="place">
          <button class="p-order" type = "submit" name = "place">Place Order</button>
        </div>
      </div>
    </div>
  </form>
<?php include("Footer.php")?>
</body>
</html>
