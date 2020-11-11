<?php
/***
 * Customer class
 * 
 * This class contains all details of Customer account
 * This class inherits from User Class
 * This class encapsulates all Customer info
 * 
 */
class customer extends user{
    //Properties
    private $address;
    private $creditCard;
    private $balance;
    private $rank;
    private $freeDeliver = False;
    private $orders;
    //Methods
    //Getters
    public function getAddress($id){
        $sql = "SELECT CustomerAddress FROM users WHERE UserId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getCreditcard($id){
        $sql = "SELECT CustomerCreditcard FROM users WHERE UserId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getBalance($id){
        $sql = "SELECT CustomerBalance FROM users WHERE UserId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getRank($id){
        $sql = "SELECT CustomerRank FROM users WHERE UserId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getOrders($id){
        $sql = "SELECT CustomerOrders FROM users WHERE UserId=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    //Setters
    public function setAddress($id, $addr){
        $sql = "UPDATE users SET CustomerAddress = ? WHERE UserId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$addr, $id]);
    }
    public function setCreditcard($id, $card){
        $sql = "UPDATE users SET CustomerCreditcard = ? WHERE UserId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$card, $id]);
    }
    public function setBalance($id, $bal){
        $sql = "UPDATE users SET CustomerBalance = ? WHERE UserId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$bal, $id]);
    }
    public function setRank($id, $rnk){
        $sql = "UPDATE users SET CustomerRank = ? WHERE UserId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$rnk, $id]);
    }
    public function setOrders($id, $ord){
        $sql = "UPDATE users SET CustomerOrders = ? WHERE UserId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$ord, $id]);
    }
}
