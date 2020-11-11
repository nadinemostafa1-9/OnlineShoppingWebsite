<?php
//this is the model to interact with the database
 class Customer extends db{

  public function getUser($email, $password){
    $sql = "SELECT * FROM customers WHERE email=? AND password=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$email, $password]);
    $allData = $stmt->fetchAll();
    if($allData == false){
      Session::set('error', "Incorrect Email or password");
      header("Location: ../login.php");
      return false;
    }
    foreach($allData as $name){
      echo 'Hello' . $name['first_name']."\n";
      return true;
    }
  }
  public static function checkLengthLogin($oneData, $secondData){
    if(strlen($oneData) < 1 || strlen($secondData) < 1){
      Session::set('error',"All fields are required");
      header("Location: ../login.php");
      return false;
    }
    return true;
  }
  public static function checkValidEmLogin($email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        Session::set('error',"Email must have an at-sign (@)");
        header("Location: ../login.php");
        return;
  }
}

public function setUser($first_name, $last_name, $email, $password, $gender){

  }
}
