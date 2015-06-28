<?php
  class LoginController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ManageModel());
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
        if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->admin_user = $_POST['admin_user'];
        }
        if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          $this->_model->admin_pass = $_POST['admin_pass'];
        }
        $_login = $this->_model->getLoginManage();
        if($_login){
          $this->_model->last_ip = $_SERVER['REMOTE_ADDR'];
          $this->_model->updateLoginInfo();
          $_SESSION['admin']['admin_user'] = $_login->admin_user;
          $_SESSION['admin']['admin_level'] = $_login->level_name;
          Tool_inc::alertJump(null,'admin.php');
        }
        else{
          Tool_inc::alertBack(':( 用户名或密码错误');
        }
      }
    }

    // 登出
    private function logout(){
      Tool_inc::unSession();
      Tool_inc::alertJump(null,'admin_login.php');
    }

}

?>