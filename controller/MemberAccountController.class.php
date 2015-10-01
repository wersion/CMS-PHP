<?php
  class MemberAccountController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new MemberAccountModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'addAccount':
          $this->addAccount();
          break;
        // 删
        case 'deleteAccount':
          $this->deleteAccount();
          break;
        // 改
        case 'updateAccount':
          $this->updateAccount();          
          break;
        // 查
        case 'showAccount':
          $this->showAccount();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }

    // 增
    private function addAccount(){
      Validate_public::checkNode('addAccount');
      $this->_tpl->assign('addAccount',true);
      $this->_tpl->assign('title','添加会员账号');
      if(isset($_POST['send'])){
        $this->_model->accountEmail = $_POST['accountEmail'];
        $this->_model->accountNickName = $_POST['accountNickName'];
        $this->_model->password = $_POST['password'];
        $this->_model->status = $_POST['status'];
        if($this->_model->addAccount()){
            Tool_public::alertJump(':) 创建会员账号成功','MemberAccount.php?action=showAccount');
        }
        else{
           Tool_public::alertBack(':( 创建会员账号失败');
        }
      }
    }

    // 删
    private function deleteAccount(){
      Validate_public::checkNode('deleteAccount');
      $this->showAccount();
      $this->_tpl->assign('delete',true);
      $this->_tpl->assign('title','删除会员账号');
      if(isset($_GET['id'])){
        $this->_model->accountID = $_GET['id'];
        if($this->_model->deleteAccount()){
          Tool_public::alertJump(':) 删除会员账号成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除会员账号失败');
        }
      }
    }

    // 改
    private function updateAccount(){
      Validate_public::checkNode('updateAccount');
      $this->showAccount();
      $this->_tpl->assign('update',true);
      if(isset($_GET['id'])){
        $this->_tpl->assign('showAccount',false);
        $this->_tpl->assign('updateAccount',true);
        $this->_tpl->assign('title','修改会员账号');
        $date = array();        
        $this->_model->accountID = $_GET['id'];
        $date = $this->_model->getOneAccount();
        $this->_tpl->assign('preUrl',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('accountEmail',$date['accountEmail']);
        $this->_tpl->assign('accountNickName',$date['accountNickName']);
        $this->_tpl->assign('password',$date['password']);
        $this->_tpl->assign('status',$date['status']);
        if(isset($_POST['send'])){
          $this->_model->accountEmail = $_POST['accountEmail'];
          $this->_model->accountNickName = $_POST['accountNickName'];
          $this->_model->password = $_POST['password'];
          $this->_model->status = $_POST['status'];
          if($this->_model->UpdateAccount()){
            Tool_public::alertJump(':) 修改会员账号成功',$_POST['preUrl']);
          }
          else{
            Tool_public::alertBack(':( 修改会员账号失败');
          }
        }
      } 
    }

    // 查
    private function showAccount(){
      Validate_public::checkNode('showAccount');
      $this->_tpl->assign('showAccount',true);
      $this->_tpl->assign('title','会员账号列表');
      $this->_tpl->assign('AllAccount',$this->_model->getAllAccount());
    }
    
}

?>