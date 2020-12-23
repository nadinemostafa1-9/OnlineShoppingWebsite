<?php
require "classes/session.php";
Session::init();
 ?>
<html> <head>
<title> search bar</title>

</head>

<body>
<center>

<h2>
search engine
</h2>
<form action='./secondSearchPage.php' method="get">
  <input type="text" name="k" size="50"/>
  <button type=" button">search</button>
</form>
</center>
<?php
//require_once('classes/product.php');
require_once('includes/cartController.php');
$cust_id=Session::get('customer_id');
$cart=gettingCart($cust_id);
updatingCart($cart,$_GET['id'],$cust_id);
displayCart($cart);
//$c=removeItem(1,$cart,$cust_id);
//displayCart($c);

 ?>

 </body>

</html>
