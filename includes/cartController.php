<?php

include_once ('prodFun.php');

Session::init();
//pressing on removing button
if(isset($_POST["remove"]) && isset($_POST['item_number'])){
		 $cart=gettingCart(Session::get('customer_id'));

		removeItem($_POST['item_number'],$cart,Session::get('customer_id'));
			echo '<script>alert("The item has been removed")
			window.location.replace("../Cart.php");
			</script>';
		}

//pressing on add to cart button
if(isset($_POST["add_to_cart"]))
{
	$cart = $cart=gettingCart(Session::get('customer_id'));
	$f = 1;
	if($_POST['qty'] == NULL){
		echo '<script>alert("You have to specify the number of items")
		window.location.replace("../HOME.php");
		</script>';
	}else{
	updatingCart($_GET['id'],Session::get('customer_id'),$cart,$_POST['qty'],$f);}
	if($f){
	echo '<script>alert("The item has been successfully added")
				window.location.replace("../HOME.php");
	</script>';

}else {

	echo '<script>alert("This item has been already in cart")
	window.location.replace("../HOME.php");
	</script>';

}
}



function displayCart($cart){
$items=	$cart->getItems();
foreach ($items as $value) {
	$qty = $value->getQuantity();
	$product = $value->getProduct();
	if($product->getCount()!=0){
	echo '
	<div class=col-md-12>
 	<div class="card">
 		<a href="cardtest.html">
 			<img src="images/'.$product->getImage().'" alt="product">
 		</a>
 		<div class="card-body">
 		<h3 class="card-title">' .$product->getName().'</h3>
 		<p class="item-price">$'.$product->getPrice().'</p>
		<p class="item-price">quantity: '.$qty.'</p>
 		</div>
 		<div class="add-btn"  id = "card_form">
		<form method = "post" action ="includes/cartController.php">
		<input type ="hidden" name = "item_number" value ='.$product->getID().'>
 		<button type = "submit" name = "remove" class="card-btn">Remove</button></form>

 		</div>
 		</div>
  </div>
';
}
}
}
