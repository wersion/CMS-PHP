<?php
  class ContentController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ContentModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'show' :
          $this->show();
          break;
        case 'add' :
          $this->add();
          break;
        case 'update' :
          $this->update();
          break;
        case 'delete' :
          $this->delete();
          break;
        default:
          Tool::alertBack('非法操作！');
      }
    }
    
    //show
    private function show() {
      $this->_tpl->assign('show',true);
      // $this->_tpl->assign('title','文章列表');
      $this->_model->_id = '7';
      $date = $this->_model->getOneArticle();
      echo $date->id;
      echo $date->title;
      echo $date->c_id;
      echo $date->info;
      echo $date->content;
    }
    
    //add
    private function add() {
      $this->_tpl->assign('add',true);
      $this->_tpl->assign('title','新增文章');
      if(isset($_POST['send'])){
        $this->_model->_title = $_POST['title'];
        $this->_model->_c_id = $_POST['c_id'];
        $this->_model->_info = $_POST['info'];
        $this->_model->_content = $_POST['editor'];
        if($this->_model->addArticle()){
          Tool_inc::alertJump(':) 新增文章成功','content.php?action=add');
        }
        else{
          Tool_inc::alertJump(':( 新增文章失败','content.php?action=add');
        }
      }


    }
    
    //update
    private function update() {

    }
    
    //delete
    private function delete() {

    }
    
  }
?>