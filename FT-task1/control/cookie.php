

<?php
$cookie_name="username";
$cookie_pass="password";
if(!isset($_COOKIE["username"])) {
  echo "";
} else {
  echo", ".$_COOKIE[$cookie_name];
  
 
}


?>


