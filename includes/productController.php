
<?php
include 'class-autoload.inc.php';
function getProductBy($bywhat,$theValue){
 $mPDO=new db();
  $q='SELECT * FROM `products` WHERE ' . $bywhat . ' = ' . $theValue;
  $prepare=$mPDO->connect()->prepare($q);
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
          <h3 class="card-title">' .$product->getName().'</h3>
          <p class="item-price"> $'.$product->getPrice().'</p>
          </div>


   ';
}
function displayProductsByCategory($theValue){
 $mPDO=new db();
  $q='SELECT * FROM `products` WHERE ' . 'category' . ' LIKE  ' . "'$theValue'";
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
  while($r=$prepare->fetch(PDO::FETCH_ASSOC)){
    $product=new Product($r['name'],$r['category'],
   $r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
   displayProduct($product);
   echo '<br></br>';
    }
  }
  function displayAllProducts(){
 $mPDO=new db();
  $get_product = "SELECT * FROM products ORDER BY RAND() LIMIT 30";
  $run = $mPDO->connect()->prepare($get_product);
  $run->execute();
  while ($row = $run->fetch(PDO::FETCH_ASSOC)) {

    $product = new Product($row['id'],$row['name'],$row['category'],
   $row['price'],$row['count'],$row['image'],$row['keywords'],$row['description']);

   displayProduct($product);
    echo ' <div class="add-btn" id = "card_form">
          <form method = "post" action ="includes/cartController.php?action=add&id='.$row['id'].'"/>
          QTY: <input type = "text" name = "qty" value = "1"/>
          <input type ="hidden" name = "item_number" value ='.$product->getID().'/>
          <input type ="hidden" name = "price" value ='.$product->getPrice().'/>
          <input type ="hidden" name = "name" value ='.$product->getName().'/>
            <input type ="hidden" name = "image" value ='.base64_encode($product->getImage()).'/>
            <button type = "submit" name="add_to_cart" class="card-btn">Add to Cart</button>
          </form>


          </div>
          </div>

        </div>

   ';
   }
return true;
}
