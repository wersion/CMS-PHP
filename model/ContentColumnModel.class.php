<?php
  class ContentColumnModel extends Model {
    
    private $columnID,$columnName,$columnInfo,$level,$parentID,$sort;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }

    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    //获取所有栏目条数
    public function getColumnTotal(){
      $_sql = "SELECT COUNT(*) FROM cms_column";
      return parent::GetTotal($_sql); 
    }

    //获取所有栏目
    public function getAllColumn(){
      $_sql = "SELECT *
                FROM content_column
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    // 获取所有栏目下拉列表
    public function getAllColumnList(){
      $_sql = "SELECT columnID,columnName,parentID,level
                FROM content_column
                ORDER BY columnID ASC,columnName DESC";
      return parent::GetAll($_sql);
    }

    // 获取所有父级栏目条数
    public function getParentColumnTotal(){
      $_sql = "SELECT COUNT(*) FROM content_column WHERE pid=0";
      return parent::GetTotal($_sql);
    }

    // 获取所有父级栏目
    public function getAllParentColumn(){
      $_sql = "SELECT * 
                FROM content_column
                WHERE pid=0
                ORDER BY sort ASC
                $this->_limit;";
      return parent::GetAll($_sql);
    }

    // 获取一条记录
    public function getOneColumn(){
      $_sql = "SELECT columnID,columnName,columnInfo,parentID,level,sort
                FROM content_column
                WHERE columnID='$this->columnID LIMIT 1';"; 
      return parent::GetOne($_sql);
    }

    public function  updateColumn(){
      $_sql = "UPDATE content_column
                SET columnName='$this->columnName',columnInfo='$this->columnInfo',parentID='$this->parentID',level='$this->level',sort='$this->sort',columnInfo='$this->columnInfo'
                WHERE columnID='$this->columnID'
                LIMIT 1";
      return parent::CUD($_sql);
    }

    public function deleteColumn(){
      $_sql = "DELETE FROM content_column
                WHERE columnID = '$this->columnID'";
      return parent::CUD($_sql);
    }

    //增加一条记录
    public function addColumn(){
      $_sql = "INSERT INTO content_column(columnName,columnInfo,parentID,`level`,sort) 
                VALUES ('$this->columnName','$this->columnInfo','$this->parentID','$this->level',".parent::GetNextID('content_column').")";
      return parent::CUD($_sql);
    }
  }
?>