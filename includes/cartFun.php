<?php
include('C:\MAMP\htdocs\e commerce proj/includes/productController.php');

function updatingCart($id,$cust_id,$cart,$amount){
	$cart_items=$cart->getItems();
	$f=1;
	foreach (	$cart_items as $value) {
		if($value->getProduct()->getID()==$id){
			$f=0;
		}
	}
	if($f){
		$mPDO=new db();
			$stmt = $mPDO->connect()->prepare("INSERT INTO cart(product_id,customer_id,quantity) VALUES
			(:product_id,:customer_id,:quantity)");
		  $stmt->bindParam(':product_id',$id);
		  $stmt->bindParam(':customer_id',$cust_id);
		  $stmt->bindParam(':quantity',$amount);
			$stmt->execute();
			$product=getProductBy('id',$id);
			$cart->addProduct($product,1);
			return true;
	}else {
			return false;
	}

}
//items in cart
 function gettingCart($customer_id){
	$mPDO=new db();
  $cart=new Cart();
	 $q='SELECT * FROM `cart` WHERE customer_id = ' . $customer_id;
	 $prepare=$mPDO->connect();
	 $prepare=$prepare->prepare($q);
	 $prepare->execute();
	while($r=$prepare->fetch()){
    if($r['product_id']){
		$product=getProductBy('id',$r['product_id']);
    if($product)
		$cart->addProduct($product,$r['quantity']);
  }
	}
	return $cart;
}

//removeItem
function removeItem($id,$cart, $cust_id){
   $product=getProductBy('id',$id);
	 $mPDO=new db();
	 $q='DELETE FROM cart WHERE product_id = ' . $id .' AND customer_id = ' . $cust_id;
	 $prepare=$mPDO->connect()->prepare($q);
	 $prepare->execute();
  if($product){
    $cart->removeProduct($product);
	return true;}
	else {
		return false;
	}
}
