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
require_once('searchFn.php');
require_once('db.php');
$mdb=new db();
$mPDO=$mdb->connect();
$k=$_GET['k']; // getting the search keyword
searchStart($k,$mPDO);
?>
 </body>

</html>
