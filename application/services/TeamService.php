<?php
/**
 * User: kraingkrai_b
 * Date: 3/7/12
 * Time: 10:53 AM
 * To change this template use File | Settings | File Templates.
 */
class Application_Service_TeamService
{
    private static $teamnameCookie = '__ttcmo';
    private static $teampasswordCookie = '__tteub';
    private static $rememberSeconds = 7776000; //3 months

    protected static $_instance = null;
    protected $_storage = null;

    public static function getInstance()
    {
        if (null === self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function getStorage()
    {
        if (null === $this->_storage) {
            $this->setStorage(new Zend_Session_Namespace('Team'));
        }

        return $this->_storage;
    }

    private function setStorage(Zend_Session_Namespace $storage)
    {
        $this->_storage = $storage;
        return $this;
    }

    public function setIdentity(Application_Model_Team $team)
    {
        $this->getStorage()->team = $team;
    }

    public function getIdentity()
    {
        return $this->getStorage()->team;
    }

    public function hasIdentity()
    {
        return isset($this->getStorage()->team);
    }

    public function addRememberMeCookie($username, $password)
    {
        setcookie(self::$teamnameCookie, Eaglet_Utils_Password::encode($username), time() + self::$rememberSeconds, '/');
        setcookie(self::$teampasswordCookie, Eaglet_Utils_Password::encode($password), time() + self::$rememberSeconds, '/');
    }

    private static function isRememberMe()
    {
        return isset($_COOKIE[self::$teamnameCookie]) && isset($_COOKIE[self::$teampasswordCookie]);
    }

    public function logout()
    {
        unset($this->getStorage()->team);
        Zend_Session::destroy();
        if (self::isRememberMe()) {
            setcookie(self::$teamnameCookie, '', time() - 5000, '/');
            setcookie(self::$teampasswordCookie, '', time() - 5000, '/');
        }
    }

    public static function loginIfRememberMe()
    {
        if (self::isRememberMe()) {
            $teamMapper = new Application_Model_TeamMapper();
            $team = $teamMapper->findByShortName(Eaglet_Utils_Password::decode($_COOKIE[self::$teamnameCookie]));
            if ($team && $team->getShortName() && $team->getPassword() == $_COOKIE[self::$teampasswordCookie]) {
                Application_Service_TeamService::getInstance()->setIdentity($team);
            }
        }
    }
}
