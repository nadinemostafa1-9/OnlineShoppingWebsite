<?php
include ("classes/session.php");
Session::init();
 ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <!--BOOTSTRAP meta-->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!--BOOTSTRAP stylesheet-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!--page style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Shipping Information.css?<?echo time();?>">
  <!--Navbar style sheet-->
  <link rel="stylesheet" type="text/css" href="css/Header.css?<?echo time();?>">

  <title>Shipping Information</title>
</head>
<body>
  <!--BOOTSTRAP -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="js/Shipping Information.js"></script>

<?php include ("header.php") ?>

<form class="content" method="post" action="includes/checkout.inc.php">

  <!---------------------------------Title---------------------------------->
  <h2 class="form-title">Shipping Information</h2>
  <!---------------------------------Country---------------------------------->
  <label class="form-label" for="city">City:</label>
  <select name="city" id="city">
    <option value="Alexandria">Alexandria</option>
    <option value="Aswan">Aswan</option>
    <option value="Cairo">Cairo</option>
    <option value="Sohag">Sohag</option>
    <option value="Suez">Suez</option>
  </select>
  <!---------------------------------Address---------------------------------->
  <label class="form-label">Address:</label>
  <textarea id="address"  name="address" placeholder="" required></textarea>
  <!---------------------------------Phone Number---------------------------------->
  <label class="form-label" for="no">Phone Number:</label>
  <input class="phone" type="text" name="no" required>
  <!---------------------------------Card Number---------------------------------->
  <label class="form-label" for="card" id="cardnum">Card Number:</label>
  <input type="text" id="card"  name="card" title="Must be 16 digits" pattern=".{16}" >
  <!---------------------------------Currency---------------------------------->
  <label class="form-label" for="currency">Currency:</label>
  <div class="radio-btns">
    <input type="radio" id="egp" name="cu" value="egp" required>EGP
    <input type="radio" id="usd" name="cu" value="usd">USD
  </div>
  <!---------------------------------Payment Method---------------------------------->
  <label class="form-label" for="payment">Payment Method:</label>
  <div class="radio-btns">
    <input type="radio" id="cash" name="type" value="cash" required>Cash
    <input type="radio" id="visa" name="type" value="visa">Visa
  </div>

  <!---------------------------------Form buttons---------------------------------->
  <div class="form-btns">
    <button type="submit" name="checkout" class="add-btn">Confirm Payment</button>
    <button type="reset" class="cancel-btn">Cancel</button>
  </div>
</form>
<?php include("Footer.php")?>
</body>
</html>
