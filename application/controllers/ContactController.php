<?php

class ContactController extends Zend_Controller_Action
{
	public function init()
	{
		//$this->view->contactSelected = 'selected';
	}
	
	public function indexAction()
	{
		$request = $this->getRequest();
    	if ($this->getRequest()->isPost()) {
    		$subject = '[Contact us] ' . $request->getParam('txtSubject');
    		$email = $request->getParam('txtEmail');
    		$detail = $request->getParam('txtDetail');
    		$body = 'E-mail: ' . $email . '<br/>Comment: <textarea readonly="readonly" cols="55" rows="10">' . $detail . '</textarea><br/>';  		
    		
    		$mailUtil = new Eaglet_Utils_Mail();
		    $result = $mailUtil->sendMail($mailUtil->supportMail, $subject, $body, null);
		    
		    $this->_helper->FlashMessenger($result);
		    $this->_redirect('/index');
    	}
	}
	
}
?>