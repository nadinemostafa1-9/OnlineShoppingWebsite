
<?php
include ("class-autoload.inc.php");

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
else
return false;
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
         <p class="item-price"> $'.$product->getPrice().'</p>
         </div>';
         if(Session::get('customer_id') == false){
           echo ' </div>
          </div>';

         }

}
//cart button
function displayCartButton($product){
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
   if(Session::get('customer_id') !== false){
   displayCartButton($product);}
}
   }
return true;
  }

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
   if(Session::get('customer_id') !== false){
   displayCartButton($product);}
}
   }
return true;
}
function productdetails($product){
$image=$product->getImage();
$Name=$product->getName();
$price=$product->getPrice();
$description= $product-> getDescription();
$category=$product->getCategory();

echo '  <div class="details">
<input type ="hidden" name = "image" value ='.base64_encode($image).'/>
         <input type ="hidden" name = "name" value ='.$Name.'/>
           <input type ="hidden" name = "price" value ='.$price.'/>
            <input type ="hidden" name = "description" value ='.$category.'/>  
            <input type ="hidden" name = "description" value ='.($description).'/>  
            

 </div>


';

}

