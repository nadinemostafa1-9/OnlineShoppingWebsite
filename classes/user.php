<?php
//this is the model to interact with the database
class user extends db{
  private $first_name;
  private $last_name;
  private $email;
  private $password;
  private $gender;

  public function getUser($first_name, $last_name){
    $sql = "SELECT * FROM users WHERE first_name=? AND last_name=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$first_name, $last_name]);
  }

public function setUser(/*parameters to insert*/){
      $sql = "INSERT INTO users () VALUES ()";
      $stmt = $this->connect()->prepare($sql);
    $stmt->execute([/*array of hte parameters */]);

  }
}
