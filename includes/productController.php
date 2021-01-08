
<?php
include ("class-autoload.inc.php");
//rating product
if(isset($_POST['submit_rating']))
{
   $php_rating=$_POST['phprating'];
   $cust = $_POST['cust'];
   $id = $_POST['id'];
     $mPDO=new db();
     $stmt = $mPDO->connect()->prepare("SELECT id FROM star_rating WHERE customer_id='$cust' AND id ='$id'");
     $stmt->execute();
     $r=$stmt->fetch(PDO::FETCH_ASSOC);

     if($r){
       $stmt = $mPDO->connect()->prepare("UPDATE star_rating SET rating = ? WHERE customer_id = '$cust'");
       $stmt->execute([$php_rating]);
     }
     else{
     $stmt = $mPDO->connect()->prepare("INSERT INTO star_rating (customer_id,id,rating)VALUES
     (:customer_id,:id,:rating)");

     $stmt->bindParam(':id',$id);
      $stmt->bindParam(':customer_id',$cust);
     $stmt->bindParam(':rating',$php_rating);
     $stmt->execute();
   }
}

function getProductBy($bywhat,$theValue){
  $mPDO=new db();
  $q='SELECT * FROM `products` WHERE ' . $bywhat . ' = ' . $theValue;
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
  $r=$prepare->fetch(PDO::FETCH_ASSOC);
  if($r){
 $product=new Product($r['id'],$r['name'],$r['category'],
$r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
return $product;
}
else{
  return false;
}
}
function updateProducts($theValue,$quantity){
  $mPDO=new db();
  $q="UPDATE products SET count=count-$quantity WHERE id='$theValue'";
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
}
 function displayProduct($product){
  echo '<div class = "col-md-3">
         <div class="card">
         <a href="details.php?id='.$product->getID().'">
         <img src="data:image/jpg;base64,'.base64_encode($product->getImage()).'" class="card-img-top" alt="product"/>
         </a>
         <div class="card-body">
         <h3 class="card-title">' .$product->getName().'</h3>
         <p class="item-price"> '.$product->getPrice().' LE</p>
         </div>';



}
//cart button
function displayCartButton($product){
  if(Session::get('customer_id') != false){
  echo ' <div class="add-btn" id = "card_form">
         <form method = "post" action ="includes/cartController.php?action=add&id='.$product->getID().'"/>
          <input class="card-btn2" placeholder="Number of items" type="number" id="quantity" name="qty" min="1" max =
          '.$product->getCount().'>
         <input type ="hidden" name = "item_number" value ='.$product->getID().'/>
         <input type ="hidden" name = "price" value ='.$product->getPrice().'/>
         <input type ="hidden" name = "name" value ='.$product->getName().'/>
           <input type ="hidden" name = "image" value ='.base64_encode($product->getImage()).'/>
           <button type = "submit" name="add_to_cart" class="card-btn">Add to Cart</button>
         </form>
         </div>
         </div></div>';
}else {
  echo ' <div class="add-btn" id = "card_form">
         <form method = "post" action ="login.php"/>
          <input class="card-btn2" placeholder="Number of items" type="number" id="quantity" name="qty" min="1" max =
          '.$product->getCount().'>
         <input type ="hidden" name = "item_number" value ='.$product->getID().'/>
         <input type ="hidden" name = "price" value ='.$product->getPrice().'/>
         <input type ="hidden" name = "name" value ='.$product->getName().'/>
           <input type ="hidden" name = "image" value ='.base64_encode($product->getImage()).'/>
           <button type = "submit" name="add_to_cart" class="card-btn">Add to Cart</button>
         </form>
         </div>
         </div></div>';
}

}

//Display all products in the main page
function displayAllProducts(){
 $mPDO=new db();
  $get_product = "SELECT * FROM products ORDER BY RAND() LIMIT 30";
  $run = $mPDO->connect()->prepare($get_product);
  $run->execute();
  while ($row = $run->fetch(PDO::FETCH_ASSOC)) {

    $product = new Product($row['id'],$row['name'],$row['category'],
   $row['price'],$row['count'],$row['image'],$row['keywords'],$row['description']);
   if($row['count'] != 0){
   displayProduct($product);
   displayCartButton($product);}

   }
return true;
}

function displayProductsByCategory($theValue){
 $mPDO=new db();
  $q='SELECT * FROM `products` WHERE ' . 'category' . ' LIKE  ' . "'$theValue'";
  $prepare=$mPDO->connect()->prepare($q);
  $prepare->execute();
  while($r=$prepare->fetch(PDO::FETCH_ASSOC)){
    $product=new Product($r['id'],$r['name'],$r['category'],
   $r['price'],$r['count'],$r['image'],$r['keywords'],$r['description']);
   if($r['count'] != 0){
   displayProduct($product);
   displayCartButton($product);}

   }
return true;
  }

//recommended products
function displayRecommended(){
  $cust = new Customer();
  $re = $cust->get_search_history_array(Session::get('customer_id'));
  foreach ($re as $r) {
    $product = getProductBy('id',$r);
    if($product){
    if($product->getCount()!=0){
      echo '<div class="card-group card2">
        <div class="col-md-12">
          <div class="card">
            <a href="cardtest.html">
              <img src="data:image/jpg;base64,'.base64_encode($product->getImage()).'" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h3 class="card-title"> ' .$product->getName().'</h3>
              <p class="item-price">'.$product->getPrice().' LE</p>
            </div>';
            displayCartButton($product);
            echo '</div>';
    }
  }
}
  return true;
}
