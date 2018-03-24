<?php

class WebboardController extends Zend_Controller_Action {
	
	public function init()
	{
		$this->view->webboardSelected = 'selected';
	}
	
	public function indexAction() {
		
	}
}