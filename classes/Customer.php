<?php
require_once ("db.php");

//this is the model to interact with the database
 class Customer extends User{
 
   // used when registering new customers
  public function __construct($fName,$lName,$e, $p,$type){
    parent::__construct($fName,$lName,$e, $p,$type );
  }
  
  //check correct login
 public static function CheckLogin($email, $password){
    $pass = parent::hashPwd($password);
    $dbObj = new db();
    $sql = "SELECT * FROM customers WHERE email=? AND password=?";
    $stmt = $dbObj->connect()->prepare($sql);
    $stmt->execute([$email, $pass]);
    $allData = $stmt->fetch();

    if($allData == false){
      return false;

    }else {
      Session::set('email', $email);
      Session::set('fname', htmlentities($allData['first_name']));
      Session::set('lname', htmlentities($allData['last_name']));
      Session::set('type', $allData['type']);
      Session::set('customer_id', htmlentities($allData['customer_id']));

      return true;
    }
 }
  public function CheckEmail(){
      $sql = "SELECT * FROM customers WHERE email=?";
       $dbObj = new db();
      $stmt = $dbObj->connect()->prepare($sql);
      $stmt->execute([$this->email]);
      $allData = $stmt->fetchAll();
      if($allData==false){
        return true; }
        else {
         
            return false;
        }
      }
      public function setUser(){
        $dbObj = new db();
        $insert =$dbObj->connect()->prepare("INSERT INTO customers (first_name,last_name,email,password)
        values(:first_name,:last_name,:email,:password) ");
        $insert->bindParam(':first_name',$this->firstName);
        $insert->bindParam(':last_name',$this->lastName);
        $insert->bindParam(':email',$this->email);
        $insert->bindParam(':password',self::$password);
               $insert->execute();
       Session::set('email', $this->email);
               Session::set('fname', $this->firstName);
               Session::set('lname', $this->lastName);
               Session::set('type', $this->type);
               $stmt = $dbObj->connect()->prepare("SELECT * FROM customers WHERE email=?");
               $stmt->execute([$this->email]);
               $r= $stmt->fetch();
               if($r){
               Session::set('customer_id', $r['customer_id']);
               return true;}
               else {
                 return false;
               }
        }
  
  public static function setHistorySearch($id,$cust_id){
          $count=0;$history=" ";
          $dbObj = new db();
          $qry='SELECT `search_history` FROM `customers` WHERE customer_id = ' . $cust_id;
          $sel =$dbObj->connect()->prepare($qry);
          $sel->execute();
          $r=$sel->fetch();
         if($r){
            $re= explode(",",$r['search_history']);
            foreach (array_reverse($re) as $value) {
              if($value!=$id)
              {

                $history =$history.$value.",";
                $count=$count + 1;
              }
              if($count == 3)
              break;
            }

        }

         $history =$history.$id;
          $q= 'UPDATE customers SET search_history=:id WHERE customer_id =:cust_id' ;
          $insert =$dbObj->connect()->prepare($q);
          $insert->bindParam(':id',$history);
          $insert->bindParam(':cust_id',$cust_id);
          $insert->execute();
        }

public static function get_search_history_array($cust_id){
  $dbObj = new db();
  $qry='SELECT `search_history` FROM `customers` WHERE customer_id = ' . $cust_id;
  $sel =$dbObj->connect()->prepare($qry);
  $sel->execute();
  $r=$sel->fetch();
  if($r){
     $re= explode(",",$r['search_history']);
   }
   return $re;
}
  

}
