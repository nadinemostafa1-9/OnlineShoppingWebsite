<?php

  abstract class User{
  protected $firstName;
  protected $lastName;
  protected $email;
  protected static $password;
  protected $type;
  protected $Rank;

  public function __construct($fName = null,$lName=null,$e=null, $p=null,$type=null ){
if($fName != null||$lName!=null||$e!=null|| $p!=null||$type!=null ){
    $this->firstName = $fName;
    $this->lastName = $lName;
    $this->email = $e;
    $this->type = $type;
    self::$password = $this->hashPwd($p);
}
  }
   public static function hashPwd($password){
    $salt = 'XyZzy12*_';
    $hash=hash('md5', $salt.$password);
    self::$password = $hash;
    return $hash;
  }
  public static function CheckLogin($email, $password){

  }
    public function CheckEmail(){}
    public function setUser(){}
    public static function CheckPassword($pass){}
    public static function update($fname,$lname,$email){}
    public static function updateAll($fname,$lname,$email,$pass,$new){}
    public function getRank(){}
    
}
