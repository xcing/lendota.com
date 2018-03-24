<?php

class DownloadController extends Zend_Controller_Action {
	
	private $_LIMIT_IMAGE = 24;
	private $_PAGE_RANGE = 5;
	
	public function init() 
	{
		$this->view->downloadSelected = 'selected';
	}
	
	public function indexAction() {
		
	}
	public function mapAction() {
		
	}
	public function programAction() {
		
	}
	public function wallpaperAction() {
		$objScan = scandir("upload/wallpaper");
		$sizeFile = sizeof($objScan);
		$size = $sizeFile-3;
		
		$request = $this->getRequest();
    	$page = $request->getParam('page');
		if($page == null){
			$page = '1';
		}
		$imagePerPage = 12;
		$start = (($page-1)*$imagePerPage)+3;
		$end = $start+$imagePerPage;
		if(($size+3) < $end){
			$end = ($size+3);
		}
		
        if($size % $imagePerPage == 0){
        	$totalPage = floor(($size / $imagePerPage));
        }
        else{
        	$totalPage = floor(($size / $imagePerPage))+1;
        }
        $this->view->totalPage = $totalPage;
		$this->view->page = $page;
		$this->view->start = $start;
		$this->view->end = $end;
		$this->view->wallpaper = $objScan;
	}
	public function fanartAction() {
		
		$objScan = scandir("upload/fanart");
		//Zend_Debug::dump($objScan);exit;
		$fanart = array();
		foreach($objScan as $file){
			if(($file != ".") && ($file != "..") && ($file != ".svn") ){
              	$fanart[] = $file;
         	} 
		}
		//Zend_Debug::dump($fanart);exit;
		$sizeFile = sizeof($fanart);
		$size = $sizeFile;
		
		$request = $this->getRequest();
    	$page = $request->getParam('page');
		if($page == null){
			$page = '1';
		}
		$imagePerPage = 24;
		
		
		$paginator = Zend_Paginator::factory($fanart);
		$paginator->setCurrentPageNumber($page)
				  ->setItemCountPerPage($this->_LIMIT_IMAGE)
				  ->setDefaultPageRange($this->_PAGE_RANGE);
		$this->view->fanartPaginator = $paginator;
		
	}
	public function loadfileAction() {
		
		$request = $this->getRequest();
    	$filename = $request->getParam('filename');
    	$this->view->filename = $filename;
    	
	}
	public function loadAction(){
		
	}
}