<?php
include 'class-autoload.inc.php';
//Seller Updates profile
Session::init();

if(isset($_POST['cancel'])){
  header("Location: ../index.php");
  return;
}
else if(isset($_POST['save'])){
    if($_POST['password']==null && $_POST['new']==null) {

        if(Seller::updateInfo($_POST['first_name'], $_POST['last_name'], $_POST['email'])){
            Session::set('success', "Changes successfully made!");
            header("Location: ../profile.php");
            return;
        }
        else if (!Seller::updateInfo($_POST['first_name'],$_POST['last_name'],$_POST['email'])) {
            Session::set('error',"This e-mail is already used!");
            header("Location: ../profile.php");
            return;
        }
    }
    else if($_POST['password']!=null && $_POST['new']!=null){
        if(Seller::updateAll($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['new'])){
            Session::set('success', "Password successfully changed!");
            header("Location: ../profile.php");
            return;
        }
        else if(!Seller::updateAll($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password'], $_POST['new'])) {
            Session::set('error', "Wrong password");
            header("Location: ../profile.php");
        }
    }
    else{
        Session::set('error', "Please fill in all the fields");
        header("Location: ../profile.php");
        }
 }

?>
