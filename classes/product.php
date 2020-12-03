
<?php

class Product {
public $name;
public $id;
public $price;
public $keywords;
public $description;
public $img;
public $category;
public $inOffer;
public $outOfstock;
public $count;
public function __construct($name,$category,$price,$count, $img,$keywords,$description){
  $this->name=$name;
  $this->price=$price;
  $this->count=$count;
  $this->img=$img;
  $this->keywords=$keywords;
  $this->description=$description;
  $this->category=$category;
}
public function setOutOfstock($out){
  $outOfstock=$out;
}


public function isProductOutOfStock(){
    return $outOfstock;
  }


public function setOffer($attenuation){
  $newprice=$price-$attenuation;
  $inOffer=true;
  return $newprice;
}
public function isProductinOffer(){
  return $inOffer;
}
}
