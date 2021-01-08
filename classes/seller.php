<?php
require_once ("db.php");
require_once ("User.php");
class Seller extends User{

    private $rank;

    //Constructor
    public function __construct($fname, $lname, $em, $pass, $type){
        parent::__construct($fname, $lname, $em, $pass, $type);
        $this->rank = 0;
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
          if($allData==false)
                return true;
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
            $dbObj = new db();
            $id = Session::get('seller_id');
            $count=0;
            $sql = "SELECT * FROM products WHERE sellerID = ?";
            $stmt = $dbObj->connect()->prepare($sql);
            $stmt->execute([$id]);
            while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                $count += $row['count'];
            }
            if($count<5){
                $rnk=5;
            }
            else if($count>=5 && $count<20){
                $rnk=4;
            }
            else if($count>=20 && $count<50){
                $rnk=3;
            }
            else if($count>=50 && $count<100){
                $rnk=2;
            }
            else {
                $rnk=1;
            }
            $sql = "UPDATE sellers SET seller_rank = ? WHERE seller_id = ?";
            $stmt = $dbObj->connect()->prepare($sql);
            $stmt->execute([$rnk, $id]);
            $allData = $stmt->fetch();
            if($allData==true && $allData['seller_id']!==$id)
                return false;
            else
            {
                $sql = "UPDATE sellers SET rank=? WHERE seller_id=?";
                $stmt = $dbObj->connect()->prepare($sql);
                $stmt->execute([$rnk, $id]);
                return true;
            }
        }
}
