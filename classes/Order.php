<?php
class Order{
  private $address;
  private $phone;
  private $city;
  private $card;
  private $currency;

public static function InsertData($address,$phone,$city,$card,$currency){
  $id=Session::get('customer_id');
  $dbObj = new db();
  $dbObj->updateInfoQuery($id,$address,$phone,$city,$card,$currency);
  return true;
}
public function ReturnData(){
  $id=Session::get('customer_id');
  $dbObj = new db();
  $data = $dbObj->idQuery($id,'customers');
  return $data;
}

public function placeorder(){
$id=Session::get('customer_id');
$all=$this->ReturnData();
$cart=Controller::gettingCart($id);
$sum=$cart->getTotalSum();

$delivery=0;
  if($sum>=500)
  $delivery=0;
  else {
    if($all['city']=='cairo')
    $delivery=50;
    else if($all['city']=='alex')
    $delivery=80;
    else  if($all['city']=='aswan')
    $delivery=150;  }
    $cust = new Customer();
    $rank=$cust->getRank();
    if($rank=='bronze'){
    $sum=$sum-$sum*0.05;
    $dis='5% (your rank is Bronze !)'; }
    else if($rank=='silver'){
    $sum=$sum-$sum*0.1;
    $dis='10% (your rank is Silver !)'; }
    else if($rank=='gold'){ $sum=$sum-$sum*0.15;
    $dis='15% (your rank is Gold !)'; }
    else   $dis='No discount (your rank is None !)';
    $total=$sum+$delivery;
    if($all['currency']=='usd'){
    $total=$total*0.064;
    $total=$total.'USD'; }
    else   $total=$total.'EGP';
      if($delivery==0) $delivery='Free (Your order is more than 500 LE)';
        if($all['card_number']==0)
          $pay='Cash';
        else $pay='Visa';
      $data = array("dis"=>$dis,"total"=>$total,"delivery"=>$delivery,"pay"=>$pay,"rank"=>$rank);
      return $data;
}
}
