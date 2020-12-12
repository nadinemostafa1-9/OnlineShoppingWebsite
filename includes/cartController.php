<?php
include 'includes/class-autoload.inc.php';

Session::init();
if(isset($_POST["add_to_cart"]))
{
	$mPDO=new db();
	$stmt = $mPDO->connect()->prepare("INSERT INTO cart (id,customer_id,quantity) VALUES
	(:id,:customer_id,:quantity)");
	$stmt->execute(array(
		":id" => $_POST['item_number'],
    ":customer_id" => Session::get('customer_id'),
		":quantity" =>$_POST['qty']
  ));
	header("Location: HOME.php");
	return;
}
