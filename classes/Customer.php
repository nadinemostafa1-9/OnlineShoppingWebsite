<?php
//this is the model to interact with the database
require "User.php";
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
       $dbO = new db();
       $dbO->orderQuery($id);
     }

     public function getRank(){
       $id=Session::get('customer_id');
       $dbObj = new db();
       $orders = $dbObj->idQuery($id,'customers');
       $order=$orders['orders'];
       $this->Rank='None';
       if($order>=5)
       $this->Rank='bronze';
        if($order>=10)
       $this->Rank='silver';
        if($order>=15)
      $this->Rank='gold';
     return $this->Rank;
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
