<?php
//extend this class whenever you need the db
class db{
  private $host = "localhost";
  private $user = "proj";
  private $pwd = "zap";
  private $dbName = "eCommerce";

  public function connect(){
    $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//handle errors
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); //how to select the data and  fetch them from database
    return $pdo;

  }
}
