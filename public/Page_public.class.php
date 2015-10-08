<?php
  // 分页类
  class Page_public{
    private $total;                       //总记录条数
    private $limit;                       //数据库查询limit
    private $pagesize;                    //每页显示数
    private $page;                        //当前页码
    private $pagetotal;                   //总页数
    private $limitpage;                   //limit语句
    private $url;                         //url
    private $_page;                       //page按钮输出
    private $_pagelist;                   //page列表
    private $bothnum;                     //两边保持数字分页的量    

    public function __construct($_total,$_pagesize){
      $this->total = $_total;
      $this->pagesize = $_pagesize;
      $this->pagetotal = ceil($_total/$_pagesize);
      $this->page = $this->setPage();
      $this->limitpage = ($this->page-1)*$_pagesize;
      $this->limit = 'LIMIT '.$this->limitpage.','.$this->pagesize;
      $this->url = $this->setUrl();
      $this->bothnum = 5;
    }

    public function __get($_key){
      return $this->$_key;
    }

    private function setPage(){
      if(!empty($_GET['page'])&&$_GET['page']>0){
        if($_GET['page']>$this->pagetotal){
          return $this->pagetotal;
        }
        return $_GET['page'];
      }
      else{
        return 1;
      }
    }

    private function setUrl(){
      $_url = $_SERVER['REQUEST_URI'];                            //获取url
      $_par = parse_url($_url);                                   //url转换成数组
      if(isset($_par['query'])){
        parse_str($_par['query'],$_query);                        //把query部分分离成一个数组$_query
        unset($_query['page']);                                   //删除$_query数组的page
        $_url = $_par['path'].'?'.http_build_query($_query);      //重组url
      }
      return $_url;
    }

    private function pageList() {
      for($i=$this->bothnum;$i>=1;$i--) {
        $_page = $this->page-$i;
        if($_page < 1) continue;
        $this->_pagelist .= '<li><a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a></li>';
      }
      $this->_pagelist .= '<li class="active"><a href="'.$this->url.'&page='.$_page.'">'.$this->page.'<span class="sr-only">(current)</span></a></li>';
      for($i=1;$i<=$this->bothnum;$i++) {
        $_page = $this->page+$i;
        if($_page > $this->pagetotal) break;
        $this->_pagelist .= '<li><a href="'.$this->url.'&page='.$_page.'">'.$_page.'</a></li>';
      }
      return $this->_pagelist;
    }
    
    //上一页
    private function prev() {
      if($this->page == 1) {
        return '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&laquo</span></a></li>';
      }
      return '<li><a href="'.$this->url.'&page='.($this->page-1).'" aria-label="Previous"><span aria-hidden="true">&laquo</span></a></li>';
    }
    
    //下一页
    private function next() {
      if($this->total ==0){
        return '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo</span></a></li>';
      }
      elseif($this->page == $this->pagetotal) {
        return '<li class="disabled"><a href="#" aria-label="Previous"><span aria-hidden="true">&raquo</span></a></li>';
      }
      return '<li><a href="'.$this->url.'&page='.($this->page+1).'" aria-label="Next"><span aria-hidden="true">&raquo</span></a></li>';
    }

    //分页信息
    public function showPage() {
      $this->_page .=$this->prev(); 
      $this->_page .=$this->pageList();
      $this->_page .=$this->next();
      return $this->_page;
    }
  }
?>