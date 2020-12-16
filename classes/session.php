<?php
class Session{

  public static function init(){
    session_start();
  }
  //set SESSION keys
  public static function set($key, $val)
    {
        $_SESSION[$key] = $val;
    }
    //GET SESSION WHEN nedded.
  public static function get($key)
      {
            if (isset($_SESSION[$key])) {
                return $_SESSION[$key];
            } else {
                return false;
            }
        }

  public static function logged(){
  if(!Session::get('email')){
    die('Not logged in');
    return false;
  }else {
    return true;
  }
}
  
    public static function getMsg(){
      if ( isset($_SESSION["error"]) ) {
          // Look closely at the use of single and double quotes
          echo('<p style="color: red;">'.htmlentities($_SESSION['error'])."</p>\n");
          unset($_SESSION["error"]);
      }
      if(isset($_SESSION['success'])){
        echo ('<p style="color:green;">'.htmlentities($_SESSION['success'])."</p>\n");
        unset($_SESSION['success']);
      }
    }

        public static function destroy()
    {
        session_destroy();
        header("Location:login.php");
    }
}
 ?>
