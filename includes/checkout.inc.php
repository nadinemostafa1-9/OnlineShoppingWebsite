<?php
include("cartFun.php");
require_once("class-autoload.inc.php");
 include('../classes/Customer.php');
include 'class-autoload.inc.php';
Session::init();
if(isset($_POST['cancel'])){
  header("Location: ../HOME.php");
  return;
}
else if(isset($_POST['checkout'])){
$order=new Order;
$order::InsertData($_POST['address'], $_POST['no'], $_POST['city'], $_POST['card'],$_POST['cu']);
header("Location: ../placeorder.php");
Customer::getRank();
}
 if(isset($_POST['place'])){
   Customer::setOrders();
      $cart=gettingCart(Session::get('customer_id'));
   updateCount(Session::get('customer_id'));
   removeCart(Session::get('customer_id'),$cart);
    echo '<script>alert("Your order has been placed successfully")
    window.location.replace("../HOME.php");
    </script>';
 }
