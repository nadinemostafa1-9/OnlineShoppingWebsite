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
  protected function hashPwd($password){
    $salt = 'XyZzy12*_';
    $hash=hash('md5', $salt.$password);
    $this->password = $hash;
    return $hash;
  }

  //check correct login
 public static function CheckLogin($email, $password){

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
  public function CheckEmail(){
      $sql = "SELECT * FROM customers WHERE email=?";
      $stmt = $this->connect()->prepare($sql);
      $stmt->execute([$this->email]);
      $allData = $stmt->fetchAll();
      if($allData==false){
        return true; }
        else {
            Session::set('error',"This email is already used");
            header("Location: ../signup.php");
            return;
        }
      }
      public function setUser(){

        $insert =$this->connect()->prepare("INSERT INTO customers (first_name,last_name,email,password)
        values(:first_name,:last_name,:email,:password) ");
        $insert->bindParam(':first_name',$this->firstName);
        $insert->bindParam(':last_name',$this->lastName);
        $insert->bindParam(':email',$this->email);
        $insert->bindParam(':password',$this->password);
               $insert->execute();
        }

  

}
