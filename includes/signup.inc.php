<?php
include 'class-autoload.inc.php';
Session::init();

if(isset($_POST['submit'])){



    $user = new Customer($_POST['first_name'], $_POST['last_name'], $_POST['email'], $_POST['password']);
    if($user->CheckEmail())
    {
    $user->setUser();
      Session::set('success',"You have signed up");
  }


}
?>
