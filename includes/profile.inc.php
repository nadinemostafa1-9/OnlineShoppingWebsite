<?php
include 'class-autoload.inc.php';
Session::init();
if(isset($_POST['cancel'])){
  header("Location: ../HOME.php");
  return;
}

else if(isset($_POST['save'])){

  if($_POST['password']==null && $_POST['new']==null) {

  if(Customer::update($_POST['first_name'],$_POST['last_name'],$_POST['email'])){
    Session::set('success',"Changes made");
    header("Location: ../Profile.php");
    return;

  }else if (!Customer::update($_POST['first_name'],$_POST['last_name'],$_POST['email'])) {

    Session::set('error',"This Email is already used");

   header("Location: ../Profile.php");
   return;
 }
}

  else if($_POST['password']!=null && $_POST['new']!=null){
    if(Customer::updateAll($_POST['first_name'],$_POST['last_name'],$_POST['email'],$_POST['password'],$_POST['new'])){
      Session::set('success',"Password Changed");
      header("Location: ../Profile.php");
      return;
    }elseif (!Customer::updateAll($_POST['first_name'],$_POST['last_name'],$_POST['email'],
    $_POST['password'],$_POST['new'])) {
      Session::set('error',"Wrong password");
       header("Location: ../Profile.php");
  }
}
    else{
      Session::set('error',"Please fill in all the fields");
  header("Location: ../Profile.php");
    }
  }


?>
