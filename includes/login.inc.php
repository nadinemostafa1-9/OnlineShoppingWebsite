<?php
declare(strict_types = 1);
include 'class-autoload.inc.php';

Session::init();
if(isset($_POST['cancel'])){
  header("Location: ../index.php");
  return;
}

if(isset($_POST['login'])){
  Customer::checkValidEmLogin($_POST['em']);
Customer::checkLengthLogin($_POST['em'], $_POST['pass']);
$user = new Customer;
$user->getUser($_POST['em'],$_POST['pass']);

}
