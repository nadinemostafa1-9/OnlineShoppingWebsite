<?php
declare(strict_types = 1);
include 'includes/class-autoload.inc.php';
Session::init();
 ?>
 <!DOCTYPE html>
     <html>
         <head>
              <meta charset="utf-8">
              <link rel="stylesheet" href="css/signup.css"/>
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
              <script src="js/signup.js"></script>
         </head>
         <body>

                 <form action="includes/signup.inc.php"class="container" method="post" >
                     <div class="sh">
                         <a href="#" class="sh">shopera</a>
                     </div>
                   <hr>
                   <?php Session::getMsg(); ?>
                    <label for="first_name"><b>First name</b></label>
                    <input type="text" name="first_name" required>

                    <label for="last_name"><b>Last name</b></label>
                    <input type="text" name="last_name" required>

                   <label for="email"><b>Email</b></label>
                   <input type="email" name="email" required>


                   <label for="password">Password</label>
                    <input type="password" id="password" name="password" pattern="(?=.*\d).{1,}" minlength="8" title="Must contain at least one character and one number" required>

                   <label ><b>Confirm-Password</b></label>
                   <input type="password"  id="confirm_password" required>

                   <br>
                   <label for="join as" style="margin-left: 25px"><b>Join As:</b></label>
                   <br>
                   <div style="margin-left: 20px">
                     <input type="radio" id="seller" name="type" value="seller" required>Seller
                   <br>
                   <input type="radio" id="customer" name="type" value="customer">Customer
                   </div>


                   <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

                   <div class="clearfix">
                     <button type="submit" class="signupbtn" name="signup">Sign Up</button>
                     <button type="button" class="cancelbtn" name="cancel">Cancel</button>
                     </div>



                </form>

         </body>
     </html>
