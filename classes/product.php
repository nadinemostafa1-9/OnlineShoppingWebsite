
<?php
require "cart.php";
class Product {
private $name;
private $id;
private $price;
private $keywords;
private $description;
private $img;
private $category;
private $inOffer;
private $outOfstock;
private $count;
public function __construct($id,$name,$category,$price,$count, $img,$keywords,$description){
  $this->id = $id;
  $this->name=$name;
  $this->price=$price;
  $this->count=$count;
  $this->img=$img;
  $this->keywords=$keywords;
  $this->description=$description;
  $this->category=$category;
}
public function getName(){
  return $this->name;
}
public function getPrice(){
  return $this->price;
}
public function getImage(){
  return $this->img;
}
public function getCategory(){
  return $this->category;
}
public function getCount(){
  return $this->count;
}
public function getKeywords(){
  return $this->keywords;
}
public function getDescription(){
  return $this->description;
}
public function getID(){
  return $this->id;
}
public function addToCart($cart,$quantity){
  return $cart->addProduct($this,$quantity);
}
public function removeFromCart($cart){
  return $cart->removeProduct($this);
}
public function setOutOfstock($out){
  $this->outOfstock=$out;
}
public function setPrice($price){
  $this->price=$price;
}
public function setDescription($description){
  $this->description=$description;
}
public function setName($name){
  $this->name=$name;
}
public function setID($id){
  $this->id=$id;
}
public function setKeywords($keywords){
  $this->keywords=$keywords;
}
public function setImage($image){
  $this->img=$image;
}
public function setCategory($category){
  $this->category=$category;
}


public function isProductOutOfStock(){
    return $this->outOfstock;
  }


public function setOffer($attenuation){
  $newprice=$this->price-$attenuation;
  $this->inOffer=true;
  return $newprice;
}
public function isProductinOffer(){
  return $this->inOffer;
}

}


