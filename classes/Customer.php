<?php
//this is the model to interact with the database

require_once ("db.php");

 class Customer extends User{

   // used when registering new customers
  public function __construct($fName = null,$lName=null,$e=null, $p=null,$type=null){
    if($fName != null||$lName!=null||$e!=null|| $p!=null||$type!=null ){
    parent::__construct($fName,$lName,$e, $p,$type );
  }
  }

  //check correct login
 public static function CheckLogin($email, $password){

    $pass = parent::hashPwd($password);
    $db = new db();
    $allData = $db->logindb(htmlentities($email), htmlentities($pass), 'customers');

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
        $data = $db->checkEmQuery($this->email,'sellers');
        if($data == false){
          return true;} }
        else {
            return false;
        }
      }
      public function setUser(){
        $dbObj = new db();
        $dbObj->setUserQuery($this->firstName,$this->lastName,
        $this->email,self::$password,$this->type,'customers');
        $r = $dbObj->checkEmQuery($this->email,'customers');
               if($r == false){
                  return false;
              }
               else {
                 return true;

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
        $allData = $db->checkEmQuery(htmlentities($email),'customers');
        if($allData==true && $allData['customer_id']!==$id){

       return false;
     }
        else{
          $db->updateQuery(htmlentities($fname),htmlentities($lname),htmlentities($email),'customers',$id);
          return true;
        }
      }

      public static function updateAll($fname,$lname,$email,$pass,$new){
           $id=Session::get('customer_id');
            if(Customer::CheckPassword($pass)){
              $dbO = new db();
              $dbO->updateQuery(htmlentities($fname),htmlentities($lname),htmlentities($email),'customers',$id);
              $new = parent::hashPwd(htmlentities($new));
              $dbO->updatepassQuery(htmlentities($new),'customers',$id);
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
          $count=0;$history="";
          $dbObj = new db();
          $r = $dbObj->idQuery($cust_id,'customers');
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
         $dbObj->updateSearch($cust_id,$history,'customers');

        }

public static function get_search_history_array($cust_id){
  $dbObj = new db();
    $r = $dbObj->idQuery($cust_id,'customers');
  if($r){
     $re= explode(",",$r['search_history']);
   }
   return $re;
}

}
