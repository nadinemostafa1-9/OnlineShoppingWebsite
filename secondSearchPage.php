<?php

 include ("includes/productController.php");
 require_once('Functions/searchFn.php');
 require_once('classes/db.php');
 require "classes/Customer.php";
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

  <link rel="stylesheet" type="text/css" href="css/main.css? <?php echo time(); ?>">


	<title>Home Page</title>
</head>
<body>
  <!--BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


  <!--------------------------------------------------------------------home page image slider using bootstrap------------------------------------------------>
  <?php include ("header.php");
   ?>
<?php
$k=$_GET['k']; // getting the search keyword
echo '<div class="card-group">';
$product_id_history=searchStart($k);
echo '</div>';
$cust_id=Session::get('customer_id');
if($product_id_history!=NULL && $cust_id!=false)
{
Customer::setHistorySearch($product_id_history,$cust_id);
}
?>
</body>

</html>
