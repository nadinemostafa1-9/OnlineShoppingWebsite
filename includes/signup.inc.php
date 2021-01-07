<?php
include 'class-autoload.inc.php';
Session::init();
if(isset($_POST['cancel'])){
  header("Location: ../HOME.php");
  return;
}

if(isset($_POST['signup'])){
  if($_POST['type'] == 'customer'){
    $user = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['type']);
    if($user->CheckEmail())
    {
      if($user->setUser()){
    if(Customer::CheckLogin($_POST['email'],$_POST['password'])){
      header("Location: ../HOME.php");
      return;
    	}}
  }else {
    Session::set('error',"This email is already used");
    header("Location: ../signup.php");
  }
}else {
  echo "Errrorrrr";
}

}
?>
