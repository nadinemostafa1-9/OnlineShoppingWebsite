<?php
//this is the model to interact with the database

require_once ("db.php");

 class Customer extends User{

   // used when registering new customers
  public function __construct($fName,$lName,$e, $p,$type){
    parent::__construct($fName,$lName,$e, $p,$type );
  }

  //check correct login
 public static function CheckLogin($email, $password){

    $pass = parent::hashPwd($password);
    $db = new db();
    $allData = $db->logindb($email, $pass, 'customers');

    if($allData == false){
      return false;
    }else {
      Session::set('email', $email);
      Session::set('fname', htmlentities($allData['first_name']));
      Session::set('lname', htmlentities($allData['last_name']));
      Session::set('type', $allData['type']);
      Session::set('customer_id', $allData['customer_id']);
      return true;
    }
 }

  public function CheckEmail(){
    $db = new db();
    $allData = $db->checkEmQuery($this->email,'customers');
      if($allData==false){
        return true; }
        else {
            return false;
        }
      }
      public function setUser(){
        $dbObj = new db();
        $dbObj->setUserQuery($this->firstName,$this->lastName,
        $this->email,self::$password,$this->type,'customers');
        $r = $dbObj->checkEmQuery($this->email,'customers');
               if($r){
               Session::set('customer_id', $r['customer_id']);
               return true;}
               else {
                 return false;
               }
        }

        public static function CheckPassword($pass){
              $id=Session::get('customer_id');
              $pass = parent::hashPwd($pass);
              $dbO = new db();
              $allData = $dbO->checkPassQuery($pass,'customers',$id);
              if($allData == false){
                return false;
            }else {
              return true;
            }
}
        public static function update($fname,$lname,$email){
        $id=Session::get('customer_id');
        $db = new db();
        $allData = $db->checkEmQuery($email,'customers');
        if($allData==true && $allData['customer_id']!==$id){
       return false;
     }
        else{
          $db->updateQuery($fname,$lname,$email,'customers',$id);
          return true;
        }
      }

      public static function updateAll($fname,$lname,$email,$pass,$new){
           $id=Session::get('customer_id');
            if(Customer::CheckPassword($pass)){
              $dbO = new db();
              $dbO->updateQuery($fname,$lname,$email,'customers',$id);
              $new = parent::hashPwd($new);
              $dbO->updatepassQuery($new,'customers',$id);
                return true;
              }else {
                return false;
              }

                  }
        public static function setOrders(){
          $id=Session::get('customer_id');
          $sql = "UPDATE customers SET orders=orders+1 WHERE customer_id='$id' ";
          $dbO = new db();
          $stmt = $dbO->connect()->prepare($sql);
          $stmt->execute();
        }
        public static function getRank(){
          $id=Session::get('customer_id');
          $sql = "SELECT * FROM customers WHERE  customer_id='$id'   ";
          $dbO = new db();
          $stmt = $dbO->connect()->prepare($sql);
          $stmt->execute();
          $orders = $stmt->fetch();
          $order=$orders['orders'];
          if($order>=5)
          $Rank='bronze';
           else if($order>=10)
          $Rank='silver';
          else if($order>=15)
         $Rank='gold'; Session::set('rank',$Rank);
        return $Rank;
      }
}
