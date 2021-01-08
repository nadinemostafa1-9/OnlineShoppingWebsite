<?php
include_once ('productController.php');

function getProductBy($bywhat,$theValue){
  $mPDO=new db();
  $q='SELECT * FROM `products` WHERE ' . $bywhat . ' = ' . $theValue;
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
  $r=$prepare->fetch(PDO::FETCH_ASSOC);
  if($r){
 $product=new Product($r['id'],$r['name'],$r['category'],
$r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
return $product;
}
else{
  return false;
}
}

function updateProducts($theValue,$quantity){
  $mPDO=new db();
  $q="UPDATE products SET count=count-$quantity WHERE id='$theValue'";
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
}

function AllProducts(){
	$mPDO=new db();
   $get_product = "SELECT * FROM products ORDER BY RAND() LIMIT 30";
   $run = $mPDO->connect()->prepare($get_product);
  return $run;

}
function SellerProducts($id){
    $dbObj = new db();
    $sql = "SELECT * FROM products WHERE sellerID = ?";
    $stmt = $dbObj->connect()->prepare($sql);
    return $stmt;
}
function category($theValue){
	$mPDO=new db();
   $q='SELECT * FROM `products` WHERE ' . 'category' . ' LIKE  ' . "'$theValue'";
   $prepare=$mPDO->connect()->prepare($q);
	 return $prepare;
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
 function updatingCart($id,$cust_id,$cart,$amount,&$f){
	$cart_items=$cart->getItems();
	foreach ($cart_items as $value) {
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
  if($product){
    $cart->removeProduct($product);
	return $cart;}
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
//rating
function rating($php_rating,$cust,$id){
	$mPDO=new db();
	$stmt = $mPDO->connect()->prepare("SELECT id FROM star_rating WHERE customer_id='$cust' AND id ='$id'");
	$stmt->execute();
	$r=$stmt->fetch(PDO::FETCH_ASSOC);

	if($r){
		$stmt = $mPDO->connect()->prepare("UPDATE star_rating SET rating = ? WHERE customer_id = '$cust'");
		$stmt->execute([$php_rating]);
	}
	else{
	$stmt = $mPDO->connect()->prepare("INSERT INTO star_rating (customer_id,id,rating)VALUES
	(:customer_id,:id,:rating)");

	$stmt->bindParam(':id',$id);
	 $stmt->bindParam(':customer_id',$cust);
	$stmt->bindParam(':rating',$php_rating);
	$stmt->execute();
}
	return true;
}
