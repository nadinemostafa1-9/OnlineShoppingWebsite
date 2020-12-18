
<?php
class CartItem{

private $product;
private $wantedAmount;
public function __construct($product,$amount){
  $this->product=$product;
  $wantedAmount=$amount;
}
public function getProduct(){
  return $product;
}
public function getQuantity(){
  return $wantedAmount;
}
public function setQuantity($q){
  $wantedAmount=$q;
}
public function setProduct($item){
  $product=$item;
}
public function increaseQuantity($amount=1){
  if($this->wantedAmount+$amount>$this->Product->count){
    return 0;
  }
  else {
    $this->wantedAmount+=$amount;
    return 1;

  }
}
public function decreaseQuantity($amount=1){
  if($this->wantedAmount-$amount<1){
    return 0;
  }
  else {
    $this->wantedAmount-=$amount;
    return 1;

  }
}
}
