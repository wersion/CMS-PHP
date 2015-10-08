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
          // 后台用户登陆
          case 'adminLogin':
            $this->adminLogin();
            break;
          // 后台用户登出
          case 'adminLogout':
            $this->adminLogout();
            break;
          case 'memberLogin':
            $this->memberLogin();
            break;
          case 'memberLogout':
            $this->memberLogout();
            break;
        }
      }
    }

    // 后台用户登陆
    private function adminLogin(){
      if($_POST['send']){
        if(Validate_public::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->userName = $_POST['admin_user'];
        }
        if(Validate_public::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          $this->_model->passWord = $_POST['admin_pass'];
        }
        $_login = $this->_model->getLoginUser();
        if($_login){
          $this->_model->loginIP = $_SERVER['REMOTE_ADDR'];
          $this->_model->updateUserInfo();
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
          $_SESSION['user'] = $_login['userName'];
          $_SESSION['role'] = $_login['roleName'];
          $_SESSION['nodeList']=$_node;
          $_SESSION['rbacNode']=$nodeArray;
          Tool_public::alertJump(null,'Admin.php');
        }
        else{
          Tool_public::alertBack(':( 用户名或密码错误');
        }
      }
    }

    // 后台用户登出
    private function adminLogout(){
      Tool_public::unSession();
      Tool_public::alertJump(null,'AdminLogin.php');
    }
    
    private function memberLogin(){
      if($_POST['send']){
        if(Validate_public::checkForm($_POST['accountPassword'],false,2,16,'密码')){
          $this->_model->passWord = $_POST['accountPassword'];
        }
        if(Validate_public::checkForm($_POST['accountEmail'],false,2,16,'用户名')){
          $this->_model->account = $_POST['accountEmail'];
          $pattern = "/^([0-9A-Za-z\\-_\\.]+)@([0-9a-z]+\\.[a-z]{2,3}(\\.[a-z]{2})?)$/i";
          if(preg_match($pattern,$_POST['accountEmail'])){
            $_login = $this->_model->getLoginMemberEmail();
          }else{
            $_login = $this->_model->getLoginMemberNickName();
          }
        }
        if($_login){
          $_SESSION['member'] = $_login['accountNickName'];
          Tool_public::alertJump(null,'Index.php');
        }
        else{
          Tool_public::alertBack(':( 用户名或密码错误');
        }
      }
    }
    
    private function memberLogout(){
      Tool_public::unSession();
      Tool_public::alertJump('退出成功','Index.php');
    }

}

?>