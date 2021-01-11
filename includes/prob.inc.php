<?php
include 'class-autoload.inc.php';
Session::init();

if(isset($_POST['report'])){
if(Session::get('customer_id') || Session::get('seller_id')){
  User::report(htmlentities($_POST['email']),htmlentities($_POST['prob']));
  echo '<script>alert("Thanks for your feedback, we will respond soon..")
  window.location.replace("../report a problem.php");
  </script>';
}
}

?>
