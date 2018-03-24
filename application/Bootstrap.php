<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
	protected function _initSession()
	{
		Zend_Session::start();
	}
	
	protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view->doctype('XHTML1_STRICT');
    }
    
    protected function _initPersistentLogin()
    {
    	$resource = $this->getOption('resources');
		$db = Zend_Db::factory($resource['db']['adapter'], $resource['db']['params']);
        Zend_Db_Table_Abstract::setDefaultAdapter($db);
    	if (!Zend_Auth::getInstance()->hasIdentity()) {
			Eaglet_Utils_Auth::loginIfRememberMe($db);
		}
    }


    protected function _initPersistentTeamLogin()
    {
        if (!Application_Service_TeamService::getInstance()->hasIdentity()) {
            Application_Service_TeamService::getInstance()->loginIfRememberMe();
        }
    }
    /* solonov check
    protected function _initAdvertiseTop()
    {
    	$advertiseMapper = new Application_Model_AdvertiseMapper();
    	$advertisesT = $advertiseMapper->fetchAll('position = 1 AND active = 1'); // top
    	$this->view->advertisesT = $advertisesT;
    }
	*/
    protected function _initViewHelper()
    {
    	$view = $this->getResource('view');
        $viewRenderer = new Zend_Controller_Action_Helper_ViewRenderer();
        $view->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');
        $viewRenderer->setView($view);
        Zend_Controller_Action_HelperBroker::addHelper($viewRenderer);
    }
    
	protected function _initLogger()
	{
		$writer = new Zend_Log_Writer_Stream(APPLICATION_PATH."/logs/application.log");
		$logger = new Zend_Log($writer);
		Zend_Registry::set('logger', $logger);
	}

	protected function _initRoutes()
    {
//		$frontController = Zend_Controller_Front::getInstance();
//		$router = $frontController->getRouter();
//		$router->addRoute(
//		  'langmodcontrolleraction',
//		  new Zend_Controller_Router_Route('/:lang/:module/:controller/:action',
//		    array('lang' => ':lang')
//		  )
//		);
//		$router->addRoute(
//		  'langcontrolleraction',
//		  new Zend_Controller_Router_Route('/:lang/:controller/:action',
//		    array('lang' => ':lang')
//		  )
//		);
//		$router->addRoute(
//		  'langindex',
//		  new Zend_Controller_Router_Route('/:lang',
//		    array('lang' => 'th',
//			  'module' => 'default',
//			  'controller' => 'index',
//			  'action' => 'index'
//		    )
//		  )
//		);
//		$router->addRoute(
//		  'langcontroller',
//		  new Zend_Controller_Router_Route('/:lang/:controller',
//		    array('lang' => 'th',
//			  'module' => 'default',
//			  'controller' => 'index',
//			  'action' => 'index'
//		    )
//		  )
//		);
    }

	protected function _initLocale()
	{
	    setlocale(LC_ALL, 'en_US.UTF-8');

	    $isThaiLang = false;
        if (Eaglet_Utils_Bilingual::isThaiLang()) {
            $lang = 'th';
            $locale = 'th_TH';
            $isThaiLang = true;
        } else {
            $lang = 'en';
            $locale = 'en_US';
        }
        Eaglet_Utils_Bilingual::setCookieLangIfNotExist($isThaiLang);

        $zendLocale = new Zend_Locale();
        $zendLocale->setLocale($locale);
        Zend_Registry::set('Zend_Locale', $zendLocale);
        $translate = new Zend_Translate('csv',
                APPLICATION_PATH . '/messages/language/' . $lang . '.csv', $lang);
        Zend_Registry::set('Zend_Translate', $translate);
        Zend_Form::setDefaultTranslator($translate);
	}
    
}

