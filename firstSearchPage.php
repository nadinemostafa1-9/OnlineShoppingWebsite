<!DOCTYPE html
<html> <head>
<title> search bar</title>

</head>

<body>
<center>

<h2>
search engine
</h2>
<form action='./search.php' method="get">
  <input type="text" name="k" size="50"/>
  <button type=" button">search</button>
</form>
</center>

 </body>

</html>

<?php
$dsn='mysql:host=localhost;dbname=products';
$user='root';
$pass='';
$options=array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES utf8',);
try{
$db=new PDO($dsn,$user,$pass,$options);
$db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
//$q="INSERT INTO search (title,description, keyword) VALUES ('product3')";
$q="SELECT * FROM `search` ";
//$db->exec($q);
}
catch (PDOException $e){
  echo 'failed' . $e->getMessage();
}
?>
