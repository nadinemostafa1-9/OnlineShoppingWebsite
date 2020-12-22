<?php
require_once ("db.php");
require_once ("User.php");
/***
 * Seller class
 *
 * This class contains all details of seller account
 * This class encapsulates all seller information
 *
 */
class Seller extends User{
    //Properties
    private $rank;
    //Constructor
    public function __construct($fname, $lname, $em, $pass, $type){
        parent::__construct($fname, $lname, $em, $pass, $type);
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
    //Check if password is correct or not
    public static function CheckPassword($pass){
          $id = Session::get('seller_id');
          $sql = "SELECT * FROM customers WHERE password=? AND seller_id='$id' ";
          $dbO = new db();
          $pass = parent::hashPwd($pass);
          $stmt = $dbO->connect()->prepare($sql);
          $stmt->execute([$pass]);
          $allData = $stmt->fetch();
          if($allData == false)
            return false;
          else
            return true;
    }
    public static function updateInfo($fname, $lname, $email){
        $id = Session::get('seller_id');
        $sql = "SELECT * FROM sellers WHERE email=? ";
        $dbO = new db();
        $stmt = $dbO->connect()->prepare($sql);
        $stmt->execute([$email]);
        $allData = $stmt->fetch();
        if($allData==true && $allData['seller_id']!==$id)
            return false;
        else
        {
            $sql = "UPDATE sellers SET first_name=?, last_name=?, email=? WHERE seller_id='$id' ";
            $stmt = $dbO->connect()->prepare($sql);
            $stmt->execute([$fname, $lname, $email]);

            Session::set('email', $email);
            Session::set('fname', $fname);
            Session::set('lname', $lname);
            return true;
        }
    }
    public static function updateAll($fname, $lname, $email, $pass, $new){
        $id=Session::get('seller_id');
        if(Customer::CheckPassword($pass)){
            $sql = "UPDATE sellers SET first_name=?, last_name=?, email=?, password=?  WHERE seller_id='$id' ";
            $new = parent::hashPwd($new);
            $dbO = new db();
            $stmt = $dbO->connect()->prepare($sql);
            $stmt->execute([$fname, $lname, $email, $new]);
            Session::set('email', $email);
            Session::set('fname', $fname);
            Session::set('lname', $lname);
            return true;
        }
    else
        return false;

    }
    //Seller rank methods
    public function getRank(){
        return $this->rank;
    }
    public function setRank($rnk){
        $this->rank=$rnk;
    }
    public function updateRank($rnk){
        $id = Session::get('seller_id');
        $sql = "UPDATE users SET seller_rank = ? WHERE seller_id = ?";
        $dbO = new db();
        $stmt = $dbO->connect()->prepare($sql);
        $stmt->execute([$rnk, $id]);
        $allData = $stmt->fetch();
        if($allData==true && $allData['seller_id']!==$id)
            return false;
        else
        {
            $sql = "UPDATE sellers SET rank=? WHERE seller_id='$id' ";
            $stmt = $dbO->connect()->prepare($sql);
            $stmt->execute([$rnk]);
            return true;
        }
    }
}
