<?php
  //内容实体类
  class ContentPageModel extends Model {
    
    private $limit,$pageID,$parentID,$pageName,$pageInfo,$pageContent,$sort,$status;

    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    // 获取文章记录条数
    public function getPageTotal(){
      $_sql = "SELECT COUNT(*) FROM content_page";
      return parent::GetTotal($_sql);
    }

    // 获取文章列表
    public function getAllPage(){
      $_sql = "SELECT p.pageID,c.columnName,p.pageName,p.pageInfo,p.sort,p.`status`
                FROM content_page p,content_column c 
                WHERE p.parentID=c.columnID
                ORDER BY p.pageID
                $this->limit;";
      return parent::GetAll($_sql);
    }

    // 新增一条文章
    public function addPage(){
      $_sql = "INSERT INTO content_page(articleTitle,columnID,articleUpdatetime,articleInfo,articleContent)
                VALUES ('$this->articleTitle','$this->columnID',NOW(),'$this->articleInfo','$this->articleContent')";
      return parent::CUD($_sql);
    }

    // 获取一条文章数据
    public function getOnePage(){
      $_sql = "SELECT pageID,parentID,pageName,sort,status,pageInfo,pageContent
                FROM content_page
                WHERE pageID='$this->pageID'";
      return parent::GetOne($_sql);
    }
    
    // 更新一条数据
    public function updatePage(){
      $_sql = "UPDATE content_page
                SET parentID='$this->parentID',pageName='$this->pageName',pageInfo='$this->pageInfo',pageContent='$this->pageContent',sort='$this->sort',status='$this->status'
                WHERE pageID='$this->pageID'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    // 删除一条数据
    public function deletePage(){
      $_sql = "DELETE FROM content_page
                WHERE articleID = '$this->articleID'";
      return parent::CUD($_sql);
    }

    // 获取所有栏目
    public function getAllColumn(){
      $_sql = "SELECT columnID,columnName,parentID,level
                FROM content_column
                ORDER BY columnID ASC,columnName DESC";
      return parent::GetAll($_sql);
    }
  }
?>