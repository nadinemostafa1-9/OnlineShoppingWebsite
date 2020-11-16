<?php

//this is the model to interact with the database
 class Customer extends db{
   private $firstName;
   private $lastName;
   private $email;
   private $password;

   // used when registering new customers
  public function __construct($fName=null,$lName=null,$e=null, $p=null){
    if($fName !== null || $lName !== null || $e !== null || $p !=null){
    $this->firstName = $fName;
    $this->lastName = $lName;
    $this->email = $e;
    $this->password = $this->hashPwd($p);
  }
  }

  //check correct login
 public static function getUser($email, $password){

    $instance = new self();
    $pass = $instance->hashPwd($password);
    $dbObj = new db();
    $sql = "SELECT * FROM customers WHERE email=? AND password=?";
    $stmt = $dbObj->connect()->prepare($sql);
    $stmt->execute([$email, $pass]);
    $allData = $stmt->fetch();

    if($allData == false){
      Session::set('error', "Incorrect Email or password");
      header("Location: ../login.php");
      return false;

    }else {
      Session::set('Email', $email);
      Session::set('fname', htmlentities($allData['first_name']));
      Session::set('lname', htmlentities($allData['last_name']));

      echo 'Hello ' . Session::get('fname')."\n";
      return true;
    }
  }

}
