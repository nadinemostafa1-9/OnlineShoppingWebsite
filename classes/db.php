<?php

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
  public function logindb($email,$password,$table){
    if($table == 'customers')
      $sql = "SELECT * FROM customers WHERE email=? AND password=?";
    else
      $sql = "SELECT * FROM sellers WHERE email=? AND password=?";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email, $password]);
    $allData = $stmt->fetch();
    return $allData;
  }

public function checkEmQuery($email,$table){
  if($table == 'customers')
    $sql = "SELECT * FROM customers WHERE email=?";
  else
    $sql = "SELECT * FROM sellers WHERE email=?";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$email]);
  $allData = $stmt->fetch();
  return $allData;
}
public function setUserQuery($firstName,$lastName,$email,$password,$type,$table){
  if($table == 'customers')
  $insert =$this->connect()->prepare("INSERT INTO customers (first_name,last_name,email,password,type)
  values(:first_name,:last_name,:email,:password,:type) ");
  else {
    $insert =$this->connect()->prepare("INSERT INTO sellers (first_name,last_name,email,password,type)
    values(:first_name,:last_name,:email,:password,:type) ");
  }
  $insert->bindParam(':first_name',$firstName);
  $insert->bindParam(':last_name',$lastName);
  $insert->bindParam(':email',$email);
  $insert->bindParam(':password',$password);
  $insert->bindParam(':type',$type);
         $insert->execute();
         Session::set('email', $email);
         Session::set('fname', $firstName);
         Session::set('lname', $lastName);
         Session::set('type', $type);
}
public function checkPassQuery($pass,$table,$id){
  if($table == 'customers')
  $sql = "SELECT * FROM customers WHERE password=? AND customer_id='$id' ";
  else
  $sql = "SELECT * FROM sellers WHERE password=? AND customer_id='$id' ";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$pass]);
  $allData = $stmt->fetch();
  return $allData;
}

public function updateQuery($fname,$lname,$email,$table,$id){
  if ($table == 'customers')
    $sql = "UPDATE customers SET first_name=?, last_name=?, email=? WHERE customer_id='$id' ";
    else
    $sql = "UPDATE sellers SET first_name=?, last_name=?, email=? WHERE customer_id='$id' ";

  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$fname,$lname,$email]);
    Session::set('email', $email);
    Session::set('fname',$fname);
    Session::set('lname',$lname);
}

public function updatepassQuery($new,$table,$id){
  if($table == 'customers')
    $sql = "UPDATE customers SET password=?  WHERE customer_id='$id' ";
  else
    $sql = "UPDATE sellers SET password=?  WHERE customer_id='$id' ";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$new]);
}
public function idQuery($id,$table){
  if($table == 'customers'){
    $sql ="SELECT * FROM customers WHERE  customer_id='$id'   ";
  }else {
    $sql = "SELECT * FROM sellers WHERE  customer_id='$id'   ";
  }
$stmt = $this->connect()->prepare($sql);
$stmt->execute();
$data = $stmt->fetch();
return $data;
}
public function orderQuery($id){
  $sql = "UPDATE customers SET orders=orders+1 WHERE customer_id='$id' ";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute();
  return true;
}
public function updateInfoQuery($id,$address,$phone,$city,$card,$currency){
  $sql = "UPDATE customers SET address=?, phone_number=? , city=?, card_number=?, currency=? WHERE customer_id='$id' ";
  $stmt = $this->connect()->prepare($sql);
  $stmt->execute([$address,$phone,$city,$card,$currency]);
  return true;
}
//update search $history
public function updateSearch($cust_id,$history,$table){
  if($table == 'customers')
    $q= 'UPDATE customers SET search_history=:id WHERE customer_id =:cust_id' ;
  else
      $q= 'UPDATE sellers SET search_history=:id WHERE customer_id =:cust_id' ;

  $insert =$this->connect()->prepare($q);
  $insert->bindParam(':id',$history);
  $insert->bindParam(':cust_id',$cust_id);
  $insert->execute();
}

}
