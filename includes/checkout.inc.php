<?php
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
 }
