<?php

class Application_Model_User
{

    protected $_userId;
    protected $_email;
    protected $_password;
    protected $_steamName;
    protected $_rankId;
    
 
    public function __construct(array $options = null)
    {
        if (is_array($options)) {
            $this->setOptions($options);
        }
    }
 
    public function __set($name, $value)
    {
        $method = 'set' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid User property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid User property');
        }
        return $this->$method();
    }
 
    public function setOptions(array $options)
    {
        $methods = get_class_methods($this);
        foreach ($options as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (in_array($method, $methods)) {
                $this->$method($value);
            }
        }
        return $this;
    }
 
    public function setUserId($value)
    {
        $this->_userId = (int) $value;
        return $this;
    }
 
    public function getUserId()
    {
        return $this->_userId;
    }
    public function setEmail($value)
    {
    	$this->_email = (string) $value;
    	return $this;
    }
    
    public function getEmail()
    {
    	return $this->_email;
    }
    
	public function setPassword($value)
    {
        $this->_password = (string) $value;
        return $this;
    }
 
    public function getPassword()
    {
        return $this->_password;
    }
    
    public function setSteamName($value)
    {
    	$this->_steamName = (string) $value;
    	return $this;
    }
    
    public function getSteamName()
    {
    	return $this->_steamName;
    }
	public function setRankId($value)
    {
        $this->_rankId = (string) $value;
        return $this;
    }
 
    public function getRankId()
    {
        return $this->_rankId;
    }
    
}

