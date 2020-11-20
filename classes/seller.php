<?php
/***
 * Seller class
 * 
 * This class contains all details of seller account
 * This class encapsulates all seller information
 * 
 */
class seller extends db{
    //Properties                //Names in Database
    private $sellerId;         //seller_id
    private $firstName;       //first_name
    private $lastName;       //last_name
    private $brand;         //brand_name
    private $email;        //email
    private $password;    //password
    private $stock;      //stock
    private $rank;      //rank
    //Functions used here
    private function hashPwd($password){
        $salt = 'XyZzy12*_';
        $hash = hash('md5', $salt.$password);
        $this->password = $hash;
        return $hash;
    }
    //Constructor
    public function __construct($fname, $lname, $bname, $em, $pass){
        $this->firstName = $fname;
        $this->lastName = $lname;
        $this->brand = $bname;
        $this->email = $em;
        $this->password = $this->hashPwd($pass); 
        $this->stock = 0;
        $this->rank = 0;
    }
    //Add new seller to database
    public function addSeller(){
        $sql = "INSERT INTO sellers (first_name, last_name, brand_name, email, password)
                values(:first_name, :last_name, :brand_name, :email, :password)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->bindParam(':first_name', $this->firstName);
        $stmt->bindParam(':last_name', $this->lastName);
        $stmt->bindParam(':brand_name', $this->brand);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', $this->password);
        $stmt->execute();
    }
    //Getting seller from database to login
    public static function getSeller($email, $password){
        $instance = new self();
        $pass = $instance->hashPwd($password);
        $dbObj = new db();
        $sql = "SELECT * FROM sellers WHERE email = ? AND password = ?";
        $stmt = $dbObj->connect()->prepare($sql);
        $stmt->execute([$email, $password]);
        $data = $stmt->fetch();
    
        if($data == false){
          Session::set('error', "Incorrect Email or password");
          header("Location: ../login.php");
          return false;
        }
        else {
          Session::set('Email', $email);
          Session::set('fname', htmlentities($data['first_name']));
          Session::set('lname', htmlentities($data['last_name']));
    
          echo 'Hello ' . Session::get('fname')."\n";
          return true;
        }
    }
    //Check if email is used or not for sign up
    public function checkEmail(){
        $sql = "SELECT * FROM sellers WHERE email = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$this->email]);
        $data = $stmt->fetchAll();
        if($data==false){
          return true; 
        }
        else {
              Session::set('error',"This email is already used");
              header("Location: ../signup.php");
              return;
        }
    }
    //Seller update profile methods
    public function updateFirstName($name, $id){
        $sql = "UPDATE sellers SET first_name = ? WHERE seller_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $this->sellerId]);
    }
    public function updateLastName($name, $id){
        $sql = "UPDATE sellers SET last_name = ? WHERE seller_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $this->sellerId]);
    }
    public function updateBrandName($name, $id){
        $sql = "UPDATE sellers SET brand_name = ? WHERE seller_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$name, $this->sellerId]);
    }
    //still editing, hashing?! -----------------------------------------
    public function updatePwd($new_pwd, $id){
        $sql = "UPDATE sellers SET password = ? WHERE seller_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$new_pwd, $this->sellerId]);
    }
    //Seller stock methods
    //still editing
    public function getStock($id){
        $sql = "SELECT SellerStock FROM sellers WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function setStock($id, $stk){
        $sql = "UPDATE users SET SellerStock = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stk, $id]);
    }
    //Seller rank methods
    //still editing
    public function getRank($id){
        $sql = "SELECT SellerRank FROM sellers WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }

}
