<?php
require "productController.php";
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
 function updatingCart($cart,$id,$cust_id,&$f){
	$cart_items=$cart->getItems();
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
  $stmt->bindParam(':quantity',$_POST['qty']);
	$stmt->execute();
	$product=getProductBy('id',$id);
	$cart->addProduct($product,1);
}
return $cart;
}


function removeCart($cust_id,$cart){
  $mPDO=new db();
  $q='DELETE  FROM `cart` WHERE customer_id = ' . $cust_id;
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
   $cart->removeAllProducts();
 return $cart;
}
 function removeItem($id,$cart, $cust_id){
   $product=getProductBy('id',$id);
	 $mPDO=new db();
	 $q='DELETE FROM `cart` WHERE product_id = ' . $id .' AND customer_id = ' . $cust_id;
	 $prepare=$mPDO->connect()->prepare($q);
	 $prepare->execute();
  if($product)
    $cart->removeProduct($product);
	return $cart;
}
//update count in database
function updateCount($customer_id){
	$mPDO=new db();
  $cart=new Cart();
	 $q='SELECT * FROM `cart` WHERE customer_id = ' . $customer_id;
	 $prepare=$mPDO->connect();
	 $prepare=$prepare->prepare($q);
	 $prepare->execute();
	while($r=$prepare->fetch()){
    if($r['product_id'])
	$product=updateProducts($r['product_id'],$r['quantity']);
}
}
