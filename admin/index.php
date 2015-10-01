<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
if(isset($_SESSION['admin'])){
  Tool_public::alertJump(null, 'Admin.php');
}   
else{
  Tool_public::alertJump(null, 'AdminLogin.php');
}
?>