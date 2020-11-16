<?php
/***
 * Seller class
 * 
 * This class contains all details of seller account
 * This class encapsulates all seller information
 * 
 */
class seller{
    //Properties
    private $firstName;
    private $lastName;
    private $brand;
    private $sellerId;
    private $email;
    private $password;
    private $stock;
    private $rank;
    //Constructor
    public function __construct($fname, $lname, $bname, $em, $pass){
        $this->firstName = $fname;
        $this->lastName = $lname;
        $this->brand = $bname;
        $this->email = $em;
        $this->password = $pass;  
    }
    //Validate login
    public static function login($email, $password){
        $db = new db();
        $sql = "SELECT * FROM sellers WHERE email = ? AND password = ?";
        $stmt = $db->connect()->prepare($sql);
        $stmt->execute([$email, $password]);
        $data = $stmt->fetch();
    
        if($data == false){
          Session::set('error', "Incorrect Email or password");
          header("Location: ../login.php");
          return false;
    
        }else {
          Session::set('Email', $email);
          Session::set('fname', htmlentities($data['first_name']));
          Session::set('lname', htmlentities($data['last_name']));
    
          echo 'Hello ' . Session::get('fname')."\n";
          return true;
        }
      }
    //Getters
    public function getStock($id){
        $sql = "SELECT SellerStock FROM sellers WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getRank($id){
        $sql = "SELECT SellerRank FROM sellers WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    //Setters
    //THESE METHODS SHOULD BE USED BY ADMIN ONLY
    //Need checking
    public function setStock($id, $stk){
        $sql = "UPDATE users SET SellerStock = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stk, $id]);
    }
    public function setRank($id, $rnk){
        $sql = "UPDATE users SET SellerRank = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$rnk, $id]);
    }
}
