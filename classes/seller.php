<?php
/***
 * Seller class
 * 
 * This class contains all details of seller account
 * This class inherits from User Class
 * This class encapsulates all seller info
 * 
 */
class seller extends user{
    //Properties
    private $SellerId;
    private $stock;
    private $rank;
    //Methods
    //Getters
    public function getStock($id){
        $sql = "SELECT SellerStock FROM sellers WHERE SellerId=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    public function getRank($id){
        $sql = "SELECT SellerRank FROM sellers WHERE SellerId=$id";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
    //Setters
    public function setStock($id, $stk){
        $sql = "UPDATE users SET SellerStock = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$stk, $id]);
    }
    public function setRank($id, $rnk){
        $sql = "UPDATE users SET SellerRank = ? WHERE SellerId = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$rnk, $id]);
    }
}
