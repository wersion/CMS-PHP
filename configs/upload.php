<?php
require substr(dirname(__FILE__),0,-7).'/init.inc.php';
if (isset($_POST['send'])) {
  $_fileupload = new FileUpload_public('pic',$_POST['MAX_FILE_SIZE']);
  $_path = $_fileupload->getPath();
  $_img = new Image_public($_path);
  $_img->thumb(150,100);
  $_img->out();
}
?>