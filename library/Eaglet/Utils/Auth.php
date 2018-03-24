<?php
class Eaglet_Utils_Auth
{
	private static $emailCookie = '__cmo';
	private static $passwordCookie = '__eub';
	private static $rememberSeconds = 7776000; //3 months

	public static function isRememberMe()
	{
		return isset($_COOKIE[self::$emailCookie]) && isset($_COOKIE[self::$passwordCookie]);
	}
	
	public static function loginIfRememberMe(Zend_Db_Adapter_Abstract $zendDb) 
	{
		if (self::isRememberMe()) {
			return self::login($zendDb, Eaglet_Utils_Password::decode($_COOKIE[self::$emailCookie]), 
				Eaglet_Utils_Password::decode($_COOKIE[self::$passwordCookie]));
		}
	}
	
	public static function login(Zend_Db_Adapter_Abstract $zendDb, $email, $password)
	{
		$auth = Zend_Auth::getInstance();
        $authAdapter = new Zend_Auth_Adapter_DbTable($zendDb, 'user');
        $authAdapter->setIdentityColumn('email')
        			->setCredentialColumn('password');
        $authAdapter->setIdentity($email)
        			->setCredential(Eaglet_Utils_Password::encode($password));
        			//->setCredentialTreatment('? AND active = 1');
        $result = $auth->authenticate($authAdapter);
        if ($result->isValid()) {
        	$storage = new Zend_Auth_Storage_Session();
        	$storage->write($authAdapter->getResultRowObject());
        	Zend_Auth::getInstance()->getStorage()->read()->adminMode = 0;
        	return true;
        } else {
        	return false;
        }
	}
	
	public static function addRememberMeCookie($email, $password)
	{
		setcookie(self::$emailCookie, Eaglet_Utils_Password::encode($email), time() + self::$rememberSeconds, '/');
		setcookie(self::$passwordCookie, Eaglet_Utils_Password::encode($password), time() + self::$rememberSeconds, '/');
	}
	
	public static function logout()
	{
		Zend_Auth::getInstance()->clearIdentity();
//		Zend_Session::destroy();
		if (self::isRememberMe()) {
			setcookie(self::$emailCookie, '', time() - 5000, '/');
			setcookie(self::$passwordCookie, '', time() - 5000, '/');
		}
	}
	
	public static function isAdminMode()
	{
		return Zend_Auth::getInstance()->getStorage()->read()->adminMode == 1;
	}
	
	public static function changeToAdminMode()   //////// news not approve
	{
		Zend_Auth::getInstance()->getStorage()->read()->adminMode = 1;
	}
	
	public static function changeToNormalMode()    //////// news approve
	{
		Zend_Auth::getInstance()->getStorage()->read()->adminMode = 0;
	}
	
	public static function isAdmin()
	{
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return false;
		}
		return Zend_Auth::getInstance()->getStorage()->read()->rankId == 1;
	}
}