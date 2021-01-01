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
    //Seller rank methods
    public function getRank(){
        return $this->rank;
    }
    public function setRank($rnk){
        $this->rank=$rnk;
    }
    public function updateRank($rnk){
        $id = Session::get('seller_id');
        $sql = "UPDATE sellers SET seller_rank = ? WHERE seller_id = ?";
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
