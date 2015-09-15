<?php
  class LoginController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new LoginModel());
    }

    // 业务流程控制器
    public function Action(){
      if(isset($_GET['action'])){
        switch ($_GET['action']) {
          // 登入
          case 'login':
            $this->login();
            break;
          // 登出
          case 'logout':
            $this->logout();
            break;
        }
      }
    }

    // 登陆
    private function login(){
      if($_POST['send']){
        if(Validate_public::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->userName = $_POST['admin_user'];
        }
        if(Validate_public::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          $this->_model->passWord = $_POST['admin_pass'];
        }
        $_login = $this->_model->getLoginManage();
        if($_login){
          $this->_model->loginIP = $_SERVER['REMOTE_ADDR'];
          $this->_model->updateLoginInfo();
          $this->_model->userID=$_login['userID'];
          $_node = $this->_model->getUserNode();
          $_node = Tree_public::createTreeStruct($_node,0,'nodeID');
          $nodeArray = array();
          foreach ($_node as $key => $value) {
            foreach($value as $key2 => $value2){
              if($key2=='nodeNameEN'){
                array_push($nodeArray,$value2);
              }
            }
          }
          $_SESSION['admin']['admin_user'] = $_login['username'];
          $_SESSION['admin']['admin_level'] = $_login['password'];
          $_SESSION['nodeList']=$_node;
          $_SESSION['rbacNode']=$nodeArray;
          Tool_public::alertJump(null,'Admin.php');
        }
        else{
          Tool_public::alertBack(':( 用户名或密码错误');
        }
      }
    }

    // 登出
    private function logout(){
      Tool_public::unSession();
      Tool_public::alertJump(null,'AdminLogin.php');
    }

}

?>