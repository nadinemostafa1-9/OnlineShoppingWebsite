<?php
require "cartItem.php";
class Cart{

private  $items=array();
public function __construct($Items){
  $this->items = $Items;
}
public function getItems(){
  return $this->items;
}
public function setItems($items){
  $this->items=$items;
}
public function addProduct($product,$amount){
$f=0;
  foreach ($this->items as $item) {
    if($item->getProduct()->getID()==$product->getID())
    {
      $cartItem=$item;
      $f=1;
    }
  }
  if(!$f){
  $cartItem=new CartItem($product,0);
$this->items[$product->getID()]=$cartItem;
}
$cartItem->increaseQuantity($amount);
return $cartItem;
}
public function getTotalQuantity(){
  $sum=0;
  foreach($this->$items as $item){
  $sum+=$item->getQuantity();
  }
  return $sum;
}
public function getTotalSum(){
  $sum=0;
  foreach($this->items as $item){
    $sum+=$item->getQuantity()*$item->getProduct()->getPrice();
  }
  return $sum;
}
public function removeProduct($product){
  unset($this->items[$product->getID()]);
return true;
}
  public function removeAllProducts(){
$this->items= [];

}
}
