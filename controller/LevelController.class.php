<?php
  class LevelController extends Controller {
    
    //构造方法，初始化
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new LevelModel());
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
      if(isset($_POST['send'])){
        $this->_model->_level = $_POST['level'];
        if(Validate_inc::checkForm($_POST['level_name'],false,2,16,'等级名称')){
          $this->_model->_level_name = $_POST['level_name'];
        }
        if(Validate_inc::checkForm($_POST['level_info'],false,2,200,'等级描述')){
          $this->_model->_level_info = $_POST['level_info'];
        }
        if($this->_model->addLevel()){
            Tool_inc::alertJump(':) 创建管理员等级成功','level.php?action=show');
        }
        else{
           Tool_inc::alertBack(':( 创建管理员等级失败');
        }
      }
    }

    // 删
    private function delete(){
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->deleteLevel()){
          Tool_inc::alertJump(':) 删除管理员等级成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_inc::alertBack(':( 删除管理员等级失败');
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
        $date = $this->_model->getOneLevel();
        $this->_tpl->assign('pre_url',$_SERVER["HTTP_REFERER"]);
        $this->_tpl->assign('id',$date->id);        
        $this->_tpl->assign('level',$date->level);
        $this->_tpl->assign('level_name',$date->level_name);
        $this->_tpl->assign('level_info',$date->level_info);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['levelid'];
          $this->_model->_level = $_POST['level'];
          if(Validate_inc::checkForm($_POST['level_name'],false,2,16,'等级名称')){
            $this->_model->_level_name = $_POST['level_name'];
          }
          if(Validate_inc::checkForm($_POST['level_info'],false,2,200,'等级描述')){
            $this->_model->_level_info = $_POST['level_info'];
          }
          if($this->_model->updateLevel()){
            Tool_inc::alertJump(':) 修改管理员等级成功',$_POST['pre_url']);
          }
          else{
            Tool_inc::alertBack(':( 修改管理员等级失败');
          }
        }
      } 
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }

    // 查
    private function read(){
      parent::page($this->_model->getTotalLevel());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','管理员等级列表');
      $this->_tpl->assign('AllLevel',$this->_model->getAllLevel());
    }

}

?>