<?php
include 'includes/class-autoload.inc.php';
Session::init();
Session::logged();
?>
<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous"><!--for icons--->
<link rel="stylesheet" type="text/css"href="css/customer(profile).css">
	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="js/signup.js"></script>
<title>seller profile</title>
</head>
  <body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!--------------------------------------------------------------------navigation bar----------------------------------------------------------------->
  <nav class=" navbar navbar-dark bg-dark">

    <div class="pagetop">

      <div id="mySidebar" class="sidebar">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <button class="dropdown-btn">Clothes
          <i class="fa fa-caret-down"></i>
        </button>
        <div class="dropdown-container">
          <a href="#">Men</a>
          <a href="#">Women</a>
        </div>
        <a href="#" class="category">Makeup</a>
        <a href="#" class="category">Accessories</a>
        <a href="#" class="category">Toys</a>
        <a href="#" class="category">Baby Care</a>
        <a href="#" class="category">Electronics</a>
        <a href="#" class="category">Home and Office</a>
      </div>
      <!-------open btn------>
      <div id="main">
        <button class="openbtn" onclick="openNav()">&#9776;</button>
      </div>

      <script>
        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
          dropdown[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var dropdownContent = this.nextElementSibling;
            if (dropdownContent.style.display === "block") {
                dropdownContent.style.display = "none";
              } else {
                        dropdownContent.style.display = "block";
                      }
          });
        }
        function openNav() {
        document.getElementById("mySidebar").style.width = "250px";
      }
      function closeNav() {
        document.getElementById("mySidebar").style.width = "0";
        document.getElementById("main").style.marginLeft = "0";
      }
      </script>

      <div class="nav_bar">
       <!----------------------------Home Page---------------------->
			 <a href="HOME.html" target="_self">
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  		 <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/><path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
			 </svg>Home</a>
			 <!----------------------------Report a Problem---------------->
       <a href=""><span>
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
			 </svg>Report</span></a>
			 <!----------------------------All Products-------------------->
       <a href="">
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-question-octagon-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
       </svg>About Us</a>


       <a href="">
   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square-fill" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
</svg>
        Add Product</a>
      </div>
      <!-------search bar-------->
      <form class="search_bar" action="secondSearchPage.php">
        <input type="text" placeholder="Search.." name="k">
        <!-----search bar button------>
        <button type="submit"><i class="fa fa-search"></i></button>
      </form>
    	<div class="log_out">
        <a href="shrook2.html">username</a>
        <a href="#">Logout</a>
    	</div>
	  </div>
	</nav>
  <!----- image---->
 <div class="text-center">
  <img src="images/ava.jpg" class="rounded" alt="avatar"></div>
 <!------- rank--->
   <div class="card">Rank:</div>
   <!------form---->
 <div class="container">
     <h2>My Information</h2>
     <?php
     Session::getMsg();
     ?>
    <form class="form-horizontal">
    <div class="form-group">
         <label for="Firstname"><b>First name</b></label>
      <input class="in"type="text" placeholder="Enter Firstname" name="uname" value="<?php echo Session::get('first_name'); ?>" required>
        <label for="Lasttname"><b>Last name</b></label>
      <input class="in"type="text" placeholder="Enter Lastname" name="uname" value="<?php echo Session::get('last_name'); ?>" required>
      <label class="in" for="email"><b>Email</b></label>
   <input class="in"type="email" placeholder="Enter Email" value="<?php echo Session::get('email'); ?>" required>
    </div><!-----for change password---->
    <!--------- button edit------>
     <button type="button" class=" editchange all" data-toggle="collapse" data-target="#dem">Edit</button>
       <div id="dem" class="collapse">
        <p class="changepass">Change Password?</p>
     <button type="button" class="ch all" data-toggle="collapse" data-target="#demo">Change</button>
      <div id="demo" class="collapse">
      <div class="form-group">
      <label for="password"><b>Old Password</b></label>
      <input class="in" type="password"  name="password" >
      <label for="new"><b>New Password</b></label>
      <input class="in" type="password" id="password" name="new" >
      <label for="psw"><b>Confirm Password</b></label>
       <input class="in" type="password"  id="confirm_password" name="psw" >
      </div>
     </div>
    <!-----for buttons--->
    <div class="tocenter">
     <button type="submit" class="chan all"  name="save">Submit</button>
    <button type="submit" class="chancancel all" name="cancel">Cancel</button>
 
   </div>

    </div>
    </form>
 </div>
  </body>
</html>