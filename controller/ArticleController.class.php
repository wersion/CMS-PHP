<?php
  class ArticleController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ArticleModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'Show' :
          $this->Show();
          break;
        case 'Add' :
          $this->Add();
          break;
        case 'Update' :
          $this->Update();
          break;
        case 'Delete' :
          $this->Delete();
          break;
        default:
          Tool_inc::alertBack('非法操作！');

      }
    }
    
    //显示文章列表
    private function Show() {
      parent::page($this->_model->GetArticleTotal());
      $this->_tpl->assign('Show',true);
      $this->_tpl->assign('title','文章列表');
      $this->_tpl->assign('AllArticle',$this->_model->GetAllArticle());
    }
    
    //add
    private function Add() {
      $this->_tpl->assign('Add',true);
      $this->_tpl->assign('title','新增文章');
      $this->_tpl->assign('columnlist',$this->_model->GetAllColumn());
      if(isset($_POST['send'])){
        $this->_model->_article_title = $_POST['title'];
        $this->_model->_column_id = $_POST['column'];
        $this->_model->_article_info = $_POST['info'];
        $this->_model->_article_content = $_POST['editor'];
        if($this->_model->AddArticle()){
          Tool_inc::alertJump(':) 新增文章成功','article.php?action=Show');
        }
        else{
          Tool_inc::alertJump(':( 新增文章失败','article.php?action=Show');
        }
      }
    }
    
    //update
    private function Update() {
      $this->_tpl->assign('Update',true);
      $this->_tpl->assign('title','修改文章');
      $date = array();
      if(isset($_GET['id'])){
        $article_id = $_GET['id'];
        $this->_model->_id = $article_id;
        $date = $this->_model->GetOneArticle();
        $this->_tpl->assign('columnliat',$this->_model->GetAllColumn());
        $this->_tpl->assign('article_id',$article_id);
        $this->_tpl->assign('article_title',$date->article_title);
        $this->_tpl->assign('column_id',$date->column_id);
        $this->_tpl->assign('article_info',$date->article_info);
        $this->_tpl->assign('article_content',$date->article_content);
        if(isset($_POST['send'])){
          $this->_model->_id = $_POST['article_id'];
          $this->_model->_article_title = $_POST['article_title'];
          $this->_model->_column_id = $_POST['column_id'];
          $this->_model->_article_info = $_POST['article_info'];
          $this->_model->_article_content = $_POST['article_content'];
          if($this->_model->UpdateArticle()){
            Tool_inc::alertJump(':) 修改文章成功','article.php?action=Show');
          }
          else{
              Tool_inc::alertJump(':( 修改文章失败','article.php?action=Show');
          }
        }
      }
    }
    
    //delete
    private function Delete() {
      if(isset($_GET['id'])){
        $this->_model->_id = $_GET['id'];
        if($this->_model->DeleteArticle()){
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