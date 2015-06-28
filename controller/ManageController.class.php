<?php
  class ManageController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ManageModel());
    }

    // 业务流程控制器
    public function Action(){
      switch ($_GET['action']) {
        // 增
        case 'create':
          $this->add();
          break;
        // 删
        case 'delete':
          $this->delete();
          break;
        // 改
        case 'update':
          $this->update();          
          break;
        // 查
        case 'show':
          $this->read();
          break;
        default:
          Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 增
    private function add(){
      $this->_tpl->assign('create',true);
      $this->_tpl->assign('title','添加管理员');
      $this->_tpl->assign('level',$this->_model->getLevel());
      if(isset($_POST['send'])){
        if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
          $this->_model->admin_user = $_POST['admin_user'];
        }
        if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
          if(Validate_inc::checkEqual($_POST['admin_pass'],$_POST['pass_confirm'])){
            $this->_model->admin_pass = $_POST['admin_pass'];
          }
        }
        $this->_model->_level = $_POST['level'];
        if($this->_model->addManage()){
            Tool_inc::alertJump(':) 创建管理员成功','manage.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建管理员失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->deleteManage()){
          Tool_inc::alertJump(':) 删除管理员成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_inc::alertBack(':( 删除管理员失败');
        }
      }
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 改
    private function update(){
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改管理员');
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->getOneManage();
        $this->_tpl->assign('pre_url',$_SERVER['HTTP_REFERER']);
        $this->_tpl->assign('id',$date->id);
        $this->_tpl->assign('name',$date->admin_user);
        $this->_tpl->assign('pass',$date->admin_pass);
        $this->_tpl->assign('lv',$date->level);  
        $this->_tpl->assign('level',$this->_model->getLevel());
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['userid'];
          if(Validate_inc::checkForm($_POST['admin_user'],false,2,16,'用户名')){
            $this->_model->admin_user = $_POST['admin_user'];
          }
          if(Validate_inc::checkForm($_POST['admin_pass'],false,2,16,'密码')){
            if(Validate_inc::checkEqual($_POST['admin_pass'],$_POST['pass_confirm'])){
              $this->_model->admin_pass = $_POST['admin_pass'];
            }
          }
          $this->_model->_level = $_POST['level'];
          if($this->_model->updateManage()){
            Tool_inc::alertJump(':) 修改管理员成功',$_POST['pre_url']);
          }
          else{
            Tool_inc::alertBack(':( 修改管理员失败');
          }
        }
      } 
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      parent::page($this->_model->getTotalManage());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员列表');
      $this->_tpl->assign('AllManage',$this->_model->getAllManage());
    }
}

?>