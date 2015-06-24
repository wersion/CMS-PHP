<?php
require substr(dirname(__FILE__),0,-6).'/init.inc.php';
if(isset($_SESSION['admin'])){
  Tool_inc::alertJump(null, 'admin.php');
}   
else{
  Tool_inc::alertJump(null, 'admin_login.php');
}
?>