<?php
include 'includes/class-autoload.inc.php';
Session::init();
if(!Session::logged()){
  die("You are not logged in");
}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<!--BOOTSTRAP meta-->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--BOOTSTRAP stylesheet-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--Page style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Add Product.css?<?php echo time();?>">
  <!--Header style sheet-->
  <link rel="stylesheet" href="css/Seller Header.css?<?php echo time();?>">
  <!--Page title-->
	<title>Add Product</title>
</head>
<body>
  <!--BOOTSTRAP -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <!--page script-->
  <script src="js/Add Product.js"></script>

 <?include ("Seller_Header.php")?>

<form class="add-product" action="includes/prodFun.php" method="post"enctype="multipart/form-data">
  <div class="form-title">
    <h1><svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 0 16 21">
       <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V11a.5.5 0 0 0 1 0V9.5H10a.5.5 0 0 0 0-1H8.5V7z"/>
       </svg>Add Product</h1>
  </div>
  <!-----------------------------------Product title-------------------------------->
  <h3 class="form-label">Title</h3>
  <input class="form-input" type="text" name="product_title">

  <!-----------------------------------Product category-------------------------------->
  <h3 class="form-label">Category</h3>
  <select  class="category-sel" name="category" id="category">
    <option value="women-clothes" selected="selected">Women Clothes</option>
    <option value="Men Clothes" selected="selected">Men Clothes</option>
    <option value="Makeup" selected="selected">Makeup</option>
    <option value="accessories" selected="selected">Accessories</option>
    <option value="toys" selected="selected">Toys</option>
    <option value="baby-care" selected="selected">Baby Care</option>
    <option value="electronics" selected="selected">Electronics</option>
    <option value="home and office" selected="selected">Home and Office</option>
  </select>

  <!-----------------------------------Product image-------------------------------->
  <h3 class="form-label">Insert Image</h3>
  <div class="product-image">
      <input type="file" name="product_img" class="form-control" required/>
  </div>

  <!-----------------------------------Product price-------------------------------->
  <h3 class="form-label">Price</h3>
  <input class="form-input" type="text" name="product_price">

  <!-----------------------------------Number of items in stock-------------------------------->
   <h3 class="form-label">Number of items</h3>
   <input class="quantity" type="number" id="quantity" name="product_count" min="1">

  <!-----------------------------------Product keywords-------------------------------->
  <h3 class="form-label">Keywords</h3>
  <input class="form-input" type="text" name="product_keywords">

  <!-----------------------------------Product description-------------------------------->
  <h3 class="form-label">Description</h3>
  <textarea class="product-description" type="text" name="prod_desc"></textarea>

  <!-----------------------------------Form buttons-------------------------------->
  <input type="hidden" name="seller" value="<?=Session::get('seller_id')?>"/>
  <div class="form-btns">
    <button type="submit" name="insert" class="add-btn">Add Product</button>
    <button type="reset" class="cancel-btn">Cancel</button>
  </div>
</form>
<?php include("Footer.php")?>
</body>
</html>
