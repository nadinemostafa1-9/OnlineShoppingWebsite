
<?php
include_once ("class-autoload.inc.php");
//rating product
if(isset($_POST['rate']))
{
  $php_rating=$_POST['star'];
  $cust = $_POST['cust'];
  $id = $_POST['id'];
  Controller::rating($php_rating,$cust,$id);
     echo '<script>alert("Thank you for your rating :)")
     window.location.replace("../details.php?id='.$id.'");
     </script>';
   }
if(isset($_POST['insert'])){

  Seller::insert($_POST['seller'],$_POST['product_title'],$_POST['category'],$_POST['product_price']
,$_POST['product_count'],$_POST['product_keywords'],$_POST['prod_desc'],$_FILES['product_img']['name'],
$_FILES['product_img']['tmp_name']);
echo "<script>alert('Product Inserted successfully')</script>";
         echo "<script>window.location.replace('../Seller.php')</script>";
}

//seller remove product
if(isset($_POST['remove'])){
Controller::sellerRemove($_POST['item_number'],$_POST['seller']);
echo "<script>alert('Product has been deleted successfully')</script>";
         echo "<script>window.location.replace('../Seller.php')</script>";
}

//display the seller's AllProducts
function displaySeller(){
  $stmt = Controller::getProducts(Session::get('seller_id'));
  $stmt->execute();
  if($stmt->fetch(PDO::FETCH_ASSOC) == false){
    echo '<p>--------------------<br><br>You have no products added<br><br>---------------</p>';
    return false;
  }
  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
    $product = new Product($row['id'],$row['name'],$row['category'],
   $row['price'],$row['count'],$row['image'],$row['keywords'],$row['description']);
   if($row['count'] != 0){
   displayProduct($product);
   removeButton($product);
   echo '</div></div>';
 }
  }

  return true;
}
function removeButton($product){
  echo '
  <div class="add-btn"  id = "card_form">
  <form method = "post" action ="includes/prodFun.php">
  <input type ="hidden" name = "item_number" value ='.$product->getID().'>
  <input type ="hidden" name = "seller" value ='.Session::get('seller_id').'>
  <button type = "submit" name = "remove" class="card-btn">Remove</button></form>

  </div>
';
}

 function displayProduct($product){
  echo '<div class = "col-md-3">
         <div class="card">
         <a href="details.php?id='.$product->getID().'">
         <img src="images/'.$product->getImage().'" class="card-img-top" alt="product"/>
         </a>
         <div class="card-body">
         <h3 class="card-title">' .$product->getName().'</h3>
         <p class="item-price"> '.$product->getPrice().' LE</p>';
         if(Session::get('seller_id')){
           echo '<p class="item-price"> available items: '.$product->getCount().' </p>';
         }
         echo '</div>';
}
//cart button
function displayCartButton($product){
  if(Session::get('customer_id') != false){
  echo ' <div class="add-btn" id = "card_form">
         <form method = "post" action ="includes/cartFun.php?action=add&id='.$product->getID().'"/>
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
         <form method = "post" action ="Login.php"/>
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
  $run = Controller::AllProducts();
  $run->execute();
  while ($row = $run->fetch(PDO::FETCH_ASSOC)){

    $product = new Product($row['id'],$row['name'],$row['category'],
   $row['price'],$row['count'],$row['image'],$row['keywords'],$row['description']);
   if($row['count'] != 0){
   displayProduct($product);
   displayCartButton($product);}

   }
return true;
}

function displayProductsByCategory($theValue){
 $prepare = Controller::category($theValue);
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
function displayRecommended($d){
  $arr = Customer::get_search_history_array(Session::get('customer_id'));
  $i = 0;
  if(count($arr) == 0)
  return false;
  while($i <count($arr)) {
    if($arr[$i] != " " && $arr[$i]!= NULL ){
    $product = Controller::getProductBy('id',$arr[$i]);
    if($product){
    if($product->getCount()!=0){
      echo '<div class="card-group card2">
        <div class="col-md-12">
          <div class="card">
            <a href="details.php?id='.$product->getID().'">
              <img src="images/'.$product->getImage().'" class="card-img-top" alt="...">
            </a>
            <div class="card-body">
              <h3 class="card-title"> ' .$product->getName().'</h3>
              <p class="item-price">'.$product->getPrice().' LE</p>
            </div>';
            if($d==0){
            displayCartButton($product);
            echo '</div>';}
            else{
              echo '</div> </div></div>';
            }
    }
  }
}
$i++;
}
  return true;
}
