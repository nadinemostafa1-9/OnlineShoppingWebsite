<?php
include 'class-autoload.inc.php';

Session::init();
if(isset($_POST["add_to_cart"]))
{
	$mPDO=new db();
	$stmt = $mPDO->connect()->prepare("INSERT INTO cart (product_id,customer_id,quantity) VALUES
	(:product_id,:customer_id,:quantity)");
	$stmt->execute(array(
		":product_id" => $_GET['id'],
    ":customer_id" => Session::get('customer_id'),
		":quantity" =>$_POST['qty']
  ));
	header("Location: ../HOME.php");
	return;
}
