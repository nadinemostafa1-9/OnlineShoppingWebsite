
<?php
require "cartItem.php";
class Cart{

private  $items=[];

public function getItems(){
  return $items;
}
public function setItems($items){
  $this->items=$items;
}
public function addProduct($product,$amount){
$f=0;
  foreach ($this->items as $item) {
    if($item->getProduct()->id==$product->id)
    {
      $cartItem=$item;
      $f=1;
    }
  }
  if(!$f){
  $cartItem=new CartItem($product,0);
$this->items[$product->id]=$cartItem;
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
    $sum+=$item->getQuantity()*$item->getProduct()->price;
  }
  return $sum;
}
public function removeProduct($product){
  unset($this->items[$product->id]);

}
}
