<?php
  class ContentArticleController extends Controller {
    
    //构造方法，初始化 
    public function __construct(&$_tpl) {
      parent::__construct($_tpl, new ContentArticleModel());
    }
    
    //action
    public function Action() {
      switch ($_GET['action']) {
        case 'showArticle' :
          $this->showArticle();
          break;
        case 'addArticle' :
          $this->addArticle();
          break;
        case 'updateArticle' :
          $this->updateArticle();
          break;
        case 'deleteArticle' :
          $this->deleteArticle();
          break;
        default:
          Tool_public::alertBack(':( 非法操作');
      }
    }
    
    //显示文章列表
    private function showArticle() {
      parent::page($this->_model->getArticleTotal());
      $this->_tpl->assign('showArticle',true);
      $this->_tpl->assign('position','文章列表');
      $this->_tpl->assign('AllArticle',$this->_model->getAllArticle());
    }
    
    //add
    private function addArticle() {
      $this->_tpl->assign('addArticle',true);
      $this->_tpl->assign('position','新增文章');
      $column = $this->_model->getAllColumn();
      $this->_tpl->assign('ColumnList',Tree_public::createTreeStruct($column,0,'columnID'));
      if(isset($_POST['send'])){
        $this->_model->articleTitle = $_POST['articleTitle'];
        $this->_model->columnID = $_POST['columnID'];
        $this->_model->articleInfo = $_POST['articleInfo'];
        $this->_model->articleContent = $_POST['articleContent'];
        if($this->_model->addArticle()){
          Tool_public::alertJump(':) 新增文章成功','ContentArticle.php?action=showArticle');
        }
        else{
          Tool_public::alertJump(':( 新增文章失败','ContentArticle.php?action=showArticle');
        }
      }
    }
    
    //update
    private function updateArticle() {
      $this->showArticle();
      $this->_tpl->assign('update',true);
      if(isset($_GET['ID'])){
        $this->_tpl->assign('showArticle',false);
        $this->_tpl->assign('updateArticle',true);
        $this->_tpl->assign('position','修改文章');
        $column = $this->_model->getAllColumn();
        $this->_tpl->assign('columnList',Tree_public::createTreeStruct($column,0,'columnID'));
        $date = array();
        $articleID = $_GET['ID'];
        $this->_model->articleID = $articleID;
        $date = $this->_model->getOneArticle();
        $this->_tpl->assign('articleID',$articleID);
        $this->_tpl->assign('articleTitle',$date['articleTitle']);
        $this->_tpl->assign('columnID',$date['columnID']);
        $this->_tpl->assign('articleInfo',$date['articleInfo']);
        $this->_tpl->assign('articleContent',$date['articleContent']);
        if(isset($_POST['send'])){
          $this->_model->articleID = $_POST['articleID'];
          $this->_model->articleTitle = $_POST['articleTitle'];
          $this->_model->columnID = $_POST['columnID'];
          $this->_model->articleInfo = $_POST['articleInfo'];
          $this->_model->articleContent = $_POST['articleContent'];
          if($this->_model->updateArticle()){
            Tool_public::alertJump(':) 修改文章成功','ContentArticle.php?action=showArticle');
          }
          else{
              Tool_public::alertJump(':( 修改文章失败','ContentArticle.php?action=showArticle');
          }
        }
      }
    }
    
    //delete
    private function deleteArticle() {
      $this->showArticle();
      $this->_tpl->assign('delete',true);
      if(isset($_GET['ID'])){
        $this->_model->articleID = $_GET['ID'];
        if($this->_model->deleteArticle()){
          Tool_public::alertJump(':) 删除文章成功',$_SERVER['HTTP_REFERER']);
        }
        else{
          Tool_public::alertBack(':( 删除文章失败');
        }
      }
    }
   
  }
?>