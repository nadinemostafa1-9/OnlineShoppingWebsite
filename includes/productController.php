
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
   echo '<div class = "col-md-3 col-sm-6">
          <div class="card">
          <a href="cardtest.php">
          <img src="data:image/jpg;base64,'.base64_encode($product->getImage()).'" class="card-img-top" alt="product"/>
          </a>
          <div class="card-body">
          <p class="card-text">' .$product->getName().'</p>
          <p class="item-price"> $'.$product->getPrice().'</p>
          </div>
          <div class="add-btn">
            <button href="#" class="card-btn">Add to Cart</button>
          </div>
          </div>

        </div>

   ';
}
function displayProductsByCategory($theValue){
  $mPDO=connecting();
  $q='SELECT * FROM `products` WHERE ' . 'category' . ' LIKE  ' . "'$theValue'";
  $prepare=$mPDO->prepare($q);
  $prepare->execute();
  while($r=$prepare->fetch(PDO::FETCH_ASSOC)){
    $product=new Product($r['name'],$r['category'],
   $r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
   displayProduct($product);
   echo '<br></br>';
    }
  }
  function displayAllProducts(){
  $mPDO=connecting();
  $get_product = "SELECT * FROM products ORDER BY RAND() LIMIT 30";
  $run = $mPDO->prepare($get_product);
  $run->execute();
  while ($row = $run->fetch(PDO::FETCH_ASSOC)) {

    $product = new Product($row['id'],$row['name'],$row['category'],
   $row['price'],$row['count'],$row['image'],$row['keywords'],$row['description']);
//Remember to add ID as GET....
   displayProduct($product);
   }
return true;
}
