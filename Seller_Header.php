<?php
include_once ("classes/session.php");
 ?>

 <script src="js/Header.js?<?php echo time();?>"></script>
 <?php if (!Session::logged()) {?>
   <nav class="navbar navbar-dark bg-dark">

     <div class="pagetop">

       <div id="mySidebar" class="sidebar">
         <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
         <button class="dropdown-btn" onmousemove="opencat()">Clothes
           <i class="fa fa-caret-down"></i>
         </button>
         <div class="dropdown-container">
           <a href="men-clothes.php">Men</a>
           <a href="women-clothes.php">Women</a>
         </div>
         <a href="makeup.php" class="category">Makeup</a>
         <a href="accessories.php" class="category">Accessories</a>
         <a href="toys.php" class="category">Toys</a>
         <a href="Baby_care.php" class="category">Baby Care</a>
         <a href="electronics.php" class="category">Electronics</a>
         <a href="office.php" class="category">Home and Office</a>
       </div>
       <!-------open btn------>
       <div id="main">
         <button class="openbtn" onclick="openNav()">&#9776;</button>
       </div>
       <!--The Website Logo-->
      <div class="logo">
        <p><b>Shoppera</b></p>
      </div>
       <div class="nav_bar">
        <!----------------------------Home Page---------------------->
 			 <a href="HOME.php" target="_self">
 			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
   		 <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/><path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
 			 </svg>Home</a>
 			 <!----------------------------Report a Problem---------------->
        <a href=""><span>
 			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
 			 </svg>Report</span></a>
 			 <!----------------------------About Us-------------------->
        <a href="About-us.php">
 			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-question-octagon-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
        </svg>About Us</a>
 		  </div>
       <!-------search bar-------->
       <form class="search_bar" action="secondSearchPage.php">
         <input type="text" id="search1" placeholder="Search.." name="k">
         <!-----search bar button------>
         <button type="submit"><i class="fa fa-search"></i></button>
       </form>
     	<div class="log_in">
         <a href="signup.php">Sign Up</a>
         <a href="Login.php">Login</a>
     	</div>
 	  </div>
 	</nav>
 <?php }else {

 ?>
<nav class="navbar navbar-dark bg-dark">

    <div class="pagetop">
      <!--The Website Logo-->
      <div class="logo">
        <p><b>Shoppera</b></p>
      </div>
      <div class="nav_bar">
       <!----------------------------Home Page---------------------->
			 <a href="Seller.php" target="_self">
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  		 <path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/><path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
			 </svg>Home</a>
			 <!----------------------------Report a Problem---------------->
       <a href="report a problem.php"><span>
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-envelope-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
			 </svg>Report</span></a>
			 <!----------------------------About Us-------------------->
       <a href="About-us.php">
			 <svg width="1em" height="20px" viewBox="0 2 16 16" class="bi bi-question-octagon-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
       <path fill-rule="evenodd" d="M11.46.146A.5.5 0 0 0 11.107 0H4.893a.5.5 0 0 0-.353.146L.146 4.54A.5.5 0 0 0 0 4.893v6.214a.5.5 0 0 0 .146.353l4.394 4.394a.5.5 0 0 0 .353.146h6.214a.5.5 0 0 0 .353-.146l4.394-4.394a.5.5 0 0 0 .146-.353V4.893a.5.5 0 0 0-.146-.353L11.46.146zM5.496 6.033a.237.237 0 0 1-.24-.247C5.35 4.091 6.737 3.5 8.005 3.5c1.396 0 2.672.73 2.672 2.24 0 1.08-.635 1.594-1.244 2.057-.737.559-1.01.768-1.01 1.486v.105a.25.25 0 0 1-.25.25h-.81a.25.25 0 0 1-.25-.246l-.004-.217c-.038-.927.495-1.498 1.168-1.987.59-.444.965-.736.965-1.371 0-.825-.628-1.168-1.314-1.168-.803 0-1.253.478-1.342 1.134-.018.137-.128.25-.266.25h-.825zm2.325 6.443c-.584 0-1.009-.394-1.009-.927 0-.552.425-.94 1.01-.94.609 0 1.028.388 1.028.94 0 .533-.42.927-1.029.927z"/>
       </svg>About Us</a>

			 <!----------------------------Add Product-------------------->
       <a href="Add_product.php">
			 <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="20px" fill="currentColor" class="bi bi-file-earmark-plus-fill" viewBox="0 2 16 16">
       <path fill-rule="evenodd" d="M2 2a2 2 0 0 1 2-2h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm7.5 1.5v-2l3 3h-2a1 1 0 0 1-1-1zM8.5 7a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V11a.5.5 0 0 0 1 0V9.5H10a.5.5 0 0 0 0-1H8.5V7z"/>
       </svg>Add Product</a>

      </div>

      <div class="log_out">
        <a href="seller profile.php"><?php echo (Session::get('fname') .Session::get('lname'))?></a>
        <a href="logout.php">  Log out</a>
    	</div>
	  </div>
	</nav>
  <?php } ?>
