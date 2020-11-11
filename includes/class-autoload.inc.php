<?php
//use it to include all the classes neede inside the page
spl_autoload_register('myAutoLoader');
// used if the file in the root folder
function myAutoLoader($className){

  $path = 'classes/';
  $extension = '.class.php';
  require_once $path . $className . $extension;
}

//if the path chages , like if the file inside my incude folder
spl_autoload_register('myAutoLoader');
function myAutoLoader($className){

  $url = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
  if(strpos($url, 'includes') !== false){
    $path = '../classes'; //go back directory and then to class folder
  }else{
    $path = 'classes/';

  }
  $extension = '.class.php';
  require_once $path . $className . $extension;
}
 ?>
