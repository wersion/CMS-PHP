<?php
  class ArticleController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ArticleModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'show' :
          $this->showArticleList();
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
    
    //显示文章列表
    private function showArticleList() {
      parent::page($this->_model->getTotalArticle());
      $this->_tpl->assign('show',true);
      $this->_tpl->assign('title','文章列表');
      $this->_tpl->assign('AllArticle',$this->_model->getAllArticle());
    }
    
    //add
    private function add() {
      $this->_tpl->assign('add',true);
      $this->_tpl->assign('title','新增文章');
      $this->_tpl->assign('columnlist',$this->_model->getAllColumn());
      if(isset($_POST['send'])){
        $this->_model->_title = $_POST['title'];
        $this->_model->_c_id = $_POST['column'];
        $this->_model->_info = $_POST['info'];
        $this->_model->_content = $_POST['editor'];
        if($this->_model->addArticle()){
          Tool_inc::alertJump(':) 新增文章成功','article.php?action=show');
        }
        else{
          Tool_inc::alertJump(':( 新增文章失败','article.php?action=show');
        }
      }
    }
    
    //update
    private function update() {
      $this->_tpl->assign('update',true);
      $this->_tpl->assign('title','修改文章');
      $date = array();
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        $date = $this->_model->getOneArticle();
        $this->_tpl->assign('columnlist',$this->_model->getAllColumn());
        $this->_tpl->assign('a_id',$_GET['id']);
        $this->_tpl->assign('title',$date->title);
        $this->_tpl->assign('c_id',$date->c_id);
        $this->_tpl->assign('info',$date->info);
        $this->_tpl->assign('content',$date->content);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['a_id'];
          $this->_model->_title = $_POST['title'];
          $this->_model->_c_id = $_POST['column'];
          $this->_model->_info = $_POST['info'];
          $this->_model->_content = $_POST['editor'];
          if($this->_model->updateArticle()){
            Tool_inc::alertJump(':) 修改文章成功','article.php?action=show');
          }
          else{
              Tool_inc::alertJump(':( 修改文章失败','article.php?action=show');
          }
        }
      }
    }
    
    //delete
    private function delete() {
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->deleteArticle()){
          Tool_inc::alertJump(':) 删除文章成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_inc::alertBack(':( 删除文章失败');
        }
      }
      else{
        Tool_inc::alertBack(':( 非法操作');
      }
    }
    
  }
?>