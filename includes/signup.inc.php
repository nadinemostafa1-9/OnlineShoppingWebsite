<?php
include 'class-autoload.inc.php';
Session::init();

if(isset($_POST['signup'])){
if($_POST['type'] == 'customer'){
    $user = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['type']);
    if($user->CheckEmail())
    {
    $user->setUser();
      Session::set('success',"You have signed up");
      header("Location: ../HOME.php");
      return;
  }else {
    Session::set('error',"This email is already used");
    header("Location: ../signup.php");
    return;
  }
//add seller condition
}
}
?>
