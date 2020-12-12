<?php

include 'class-autoload.inc.php';

Session::init();

if(isset($_POST['login'])){
    if(Customer::CheckLogin($_POST['em'],$_POST['pass'])){
    header("Location: ../HOME.php");
    return;
  }//else if seller
  else {
    Session::set('error', "Incorrect Email or password");
    header("Location: ../login.php");
    return;
  }
}
