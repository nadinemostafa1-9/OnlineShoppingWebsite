<?php
include("prodFun.php");
require_once("class-autoload.inc.php");

 Session::init();

if(isset($_POST['checkout'])){
$order=new Order;
$order::InsertData($_POST['address'], $_POST['no'], $_POST['city'], $_POST['card'],$_POST['cu']);
header("Location: ../Place_Order.php");
return;
}
 if(isset($_POST['place'])){
   Customer::setOrders();
   $cart=Controller::gettingCart(Session::get('customer_id'));
   Controller::updateCount(Session::get('customer_id'));
   Controller::removeCart(Session::get('customer_id'),$cart);
    echo '<script>alert("Your order has been placed successfully")
    window.location.replace("../HOME.php");
    </script>';
 }
