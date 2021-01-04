
<?php

require "classes/session.php";
Session::init();

?>
<!DOCTYPE html>
<html> <head>

<title>search bar-search</title>

</head>

<body>


<h2>
search engine
</h2>
<form action='./secondSearchPage.php' method="get">
  <input type="text" name="k" size="50" value='<?php echo $_GET['k']?>'/>
<button type=" button">search</button>
</form>
<hr/>
<?php
require_once('Functions/searchFn.php');
require_once('classes/db.php');
require "classes/Customer.php";
require "includes/productController.php";
$mdb=new db();
$mPDO=$mdb->connect();
$k=$_GET['k']; // getting the search keyword
$product_id_history= NULL;$i=0;
$Search_array=searchStart($k,$mPDO,$product_id_history);
while(count($Search_array)!=0 && $i!=count($Search_array)){
  displayProduct($Search_array[$i]);
  displayCartButton($Search_array[$i]);
  $i++;
}

$cust_id=Session::get('customer_id');
if($product_id_history!=NULL && $cust_id!=false)
{
  Customer::setHistorySearch($product_id_history,$cust_id);
}

?>
 </body>

</html>
