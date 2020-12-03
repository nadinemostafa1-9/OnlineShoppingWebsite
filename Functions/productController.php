
<?php
require 'product.php';
  function connecting(){
  require_once('db.php');
  $mdb=new db();
  $mPDO=$mdb->connect();
return $mPDO;
}
function getProductBy($bywhat,$theValue){
  $mPDO=connecting();
  $q='SELECT * FROM `products` WHERE ' . $bywhat . ' = ' . $theValue;
  $prepare=$mPDO->prepare($q);
  $prepare->execute();
  $r=$prepare->fetch(PDO::FETCH_ASSOC);
  if($r){
 $product=new Product($r['name'],$r['category'],
$r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
return $product;
}
}
 function displayProduct($product){
  echo '<tr><td><img height="100" width="100" src="data:image/jpg;base64,'.base64_encode($product->img).'"/></td</tr>';
  echo '<br></br>';
    echo $product->name . ' ';
    echo $product->price . '$';
    echo '<br></br>';
}
function displayProductsByCategory($bywhat){
  $mPDO=connecting();
  $q='SELECT * FROM `products`';
  $prepare=$mPDO->prepare($q);
  $prepare->execute();
  while($r=$prepare->fetch(PDO::FETCH_ASSOC)){
    $product=new Product($r['name'],$r['category'],
   $r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
   displayProduct($product);
   echo '<br></br>';
    }
  }
