<?php
require_once ("db.php");
/***
 * Seller class
 *
 * This class contains all details of seller account
 * This class encapsulates all seller information
 *
 */
class Seller /*extends User*/{
    //Properties             //Names in Database
    private $brand;        //brand_name
    private $stock;      //stock
    private $rank;      //rank
    //Constructor
    public function __construct($fname, $lname, $em, $pass, $type){
        parent::__construct($fname, $lname, $em, $pass, $type);
        $this->stock = 0;
        $this->rank = 0;
    }
    //Checking Correct login
    public static function CheckLogin($email, $password){
       $pass = parent::hashPwd($password);
       $dbObj = new db();
       $sql = "SELECT * FROM sellers WHERE email=? AND password=?";
       $stmt = $dbObj->connect()->prepare($sql);
       $stmt->execute([$email, $password]);
       $data = $stmt->fetch();

       if($data == false){
           Session::set('error', "Incorrect Email or password");
           header("Location: ../login.php");
           return false;
       }
       else{
         Session::set('email', $email);
         Session::set('fname', htmlentities($data['first_name']));
         Session::set('lname', htmlentities($data['last_name']));
         Session::set('type', $data['type']);
         Session::set('seller_id', htmlentities($data['seller_id']));

         return true;
       }
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
    public function updatePwd($new_pwd, $id){
        $check_sql = "SELECT password FROM sellers WHERE SellerId = ?";
        $sql = "UPDATE sellers SET password = ? WHERE seller_id = ?";
        $pwd = parent::hashPwd($new_pwd);
        $stmt_check = $this->connect()->prepare($check_sql);
        if($stmt_check->execute([$this->sellerId])){
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$pwd, $this->sellerId])
        }
    }
    //Seller stock methods
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
    public function getRank($id){
        $sql = "SELECT SellerRank FROM sellers WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function setRank($id, $rnk){
        $sql = "UPDATE users SET SellerRank = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$rnk, $id]);
    }
}
