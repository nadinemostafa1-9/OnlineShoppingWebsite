<?php

  abstract class User{
  protected $firstName;
  protected $lastName;
  protected $email;
  protected static $password;
  protected $type;

  public function __construct($fName,$lName,$e, $p,$type ){

    $this->firstName = $fName;
    $this->lastName = $lName;
    $this->email = $e;
    $this->type = $type;
    self::$password = $this->hashPwd($p);

  }
   public static function hashPwd($password){
    $salt = 'XyZzy12*_';
    $hash=hash('md5', $salt.$password);
    self::$password = $hash;
    return $hash;
  }
}
