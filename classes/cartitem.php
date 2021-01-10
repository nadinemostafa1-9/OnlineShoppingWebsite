<?php
class CartItem{

private $product;
private $wantedAmount;
public function __construct($product = null,$amount = null){
  if($product != null || $amount != null){
    $this->product=$product;
    $this->$wantedAmount=$amount;
  }
}
public function getProduct(){
  return $this->product;
}
public function getQuantity(){
  return $this->wantedAmount;
}
public function setQuantity($q){
  $wantedAmount=$q;
}
public function setProduct($item){
  $product=$item;
}
public function increaseQuantity($amount=1){
  if($this->wantedAmount+$amount>$this->product->getCount()){
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
