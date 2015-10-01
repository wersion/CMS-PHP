<?php
  class RbacNodeModel extends Model {
    
    private $limit,$nodeID,$nodeNameEN,$nodeNameCH,$status,$sort,$parentID,$level,$nodeInfo;
    
    // 拦截器
    public function __set($_key,$_value){
      $this->$_key = $_value;
    }
    // 拦截器
    public function __get($_key){
      return $this->$_key;
    }

    public function getTotalNode(){
      $_sql="SELECT COUNT(*) FROM rbac_node";
      return parent::GetTotal($_sql);
    }

    public function getAllNode(){
      $_sql="SELECT nodeID,nodeNameCH,nodeNameEN,status,sort,parentID,level,nodeInfo
                FROM rbac_node
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    public function getParentNode(){
      $_sql="SELECT nodeID,nodeNameCH,parentID,level
                FROM rbac_node
                ORDER BY sort ASC";
      return parent::GetAll($_sql);
    }

    public function addNode(){
      $_sql = "INSERT INTO rbac_node(nodeNameCH,nodeNameEN,status,sort,parentID,level,nodeInfo) 
                VALUES ('$this->nodeNameCH','$this->nodeNameEN','$this->status','$this->sort','$this->parentID','$this->level','$this->nodeInfo')";
      return parent::CUD($_sql);
    } 

    public function deleteNode(){
      $_sql = "DELETE FROM rbac_node 
                WHERE nodeID = '$this->nodeID'";
      return parent::CUD($_sql);
    }

    public function getOneNode(){
      $_sql = "SELECT nodeNameCH,nodeNameEN,status,sort,parentID,level,nodeInfo
                FROM rbac_node 
                WHERE nodeID='$this->nodeID' LIMIT 1;"; 
      return parent::GetOne($_sql);
    }

    public function  updateNode(){
      $_sql = "UPDATE rbac_node
                SET nodeNameCH='$this->nodeNameCH',nodeNameEN='$this->nodeNameEN',status='$this->status',sort='$this->sort',parentID='$this->parentID',level='$this->level',nodeInfo='$this->nodeInfo'
                WHERE nodeID='$this->nodeID'
                LIMIT 1";
      return parent::CUD($_sql);
    }
  }
?>