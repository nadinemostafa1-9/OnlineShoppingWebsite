<?php
require_once ("db.php");
class Seller extends User{
    //Constructor
    public function __construct($fName = null,$lName=null,$e=null, $p=null,$type=null){
      if($fName != null||$lName!=null||$e!=null|| $p!=null||$type!=null ){
      parent::__construct($fName,$lName,$e, $p,$type );
    }
    }

      //check correct login
     public static function CheckLogin($email, $password){
        $pass = parent::hashPwd($password);
        $db = new db();
        $allData = $db->logindb($email, $pass, 'sellers');

        if($allData == false)
            return false;
        else {
            Session::set('email', $email);
            Session::set('fname', htmlentities($allData['first_name']));
            Session::set('lname', htmlentities($allData['last_name']));
            Session::set('type', $allData['type']);
            Session::set('seller_id', $allData['seller_id']);
            return true;
        }
    }
      public function CheckEmail(){
          $db = new db();
          $allData = $db->checkEmQuery($this->email,'sellers');
          if($allData==false){
            $data = $db->checkEmQuery($this->email,'customers');
            if($data == false){
              return true;}
                }
            else
                return false;
          }
          public function setSeller(){
              $dbObj = new db();
              $dbObj->setUserQuery($this->firstName,$this->lastName,
              $this->email,self::$password,$this->type,'sellers');
              $r = $dbObj->checkEmQuery($this->email,'sellers');
              if($r){
                  Session::set('seller_id', $r['seller_id']);
                  return true;
              }
              else
                return false;
            }

            public static function CheckPassword($pass){
                $id=Session::get('seller_id');
                $pass = parent::hashPwd($pass);
                $dbO = new db();
                $allData = $dbO->checkPassQuery($pass,'sellers',$id);
                if($allData == false)
                    return false;
                else
                  return true;
              }
              public static function update($fname,$lname,$email){
                  $id=Session::get('seller_id');
                  $db = new db();
                  $allData = $db->checkEmQuery($email,'sellers');
                  if($allData==true && $allData['seller_id']!==$id){
                      return false;
                  }
                  else{
                      $db->updateQuery($fname,$lname,$email,'sellers',$id);
                      return true;
                  }
              }

              public static function updateAll($fname, $lname, $email, $pass, $new){
                  $id=Session::get('seller_id');
                  if(Seller::CheckPassword($pass)){
                      $dbO = new db();
                      $dbO->updateQuery($fname,$lname,$email,'sellers',$id);
                      $new = parent::hashPwd($new);
                      $dbO->updatepassQuery($new,'sellers',$id);
                      return true;
                  }
                  else {
                      return false;
                  }
              }
    //Seller rank methods
        public function getRank(){
            return $this->rank;
        }
        public function setRank($rnk){
            $this->rank=$rnk;
        }
        public function updateRank(){
          require_once ("includes/prodFun.php");
            $dbObj = new db();
            $id = Session::get('seller_id');
            $stmt = getProducts($id);
            $stmt->execute();
            $count=0;
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  $count += $row['checked'];
            }

            if($count<=3){
                $this->rank="None";
            }
            if($count>3){
                $this->rank="bronze";
            }
            if($count>=6){
                $this->rank="Silver";
            }
            if($count>10){
                $this->rank="Gold";
            }

            return $this->rank;
        }
    public static function report($email,$prob){
      $db = new db();
      $db->reportQuery($email,$prob,'sellers');
    }
}
