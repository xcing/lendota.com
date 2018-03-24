<?php

class Application_Model_Team
{
    protected $_teamId;
    protected $_name;
    protected $_shortName;
    protected $_password;
    protected $_member;
    protected $_email;
    protected $_tel;
    protected $_logo;
    protected $_countryCode;
    protected $_score;
    protected $_win;
    protected $_lose;
    protected $_isAdmin;
 
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
            throw new Exception('Invalid Team property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Team property');
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
 
    public function setId($value)
    {
        $this->_teamId = (int) $value;
        return $this;
    }
    public function getId()
    {
        return $this->_teamId;
    }
    
	public function setName($value)
    {
        $this->_name = (string) $value;
        return $this;
    }
    public function getName()
    {
        return $this->_name;
    }
    public function setShortName($value)
    {
    	$this->_shortName = (string) $value;
    	return $this;
    }
    public function getShortName()
    {
    	return $this->_shortName;
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
    public function setMember($value)
    {
    	$this->_member = (string) $value;
    	return $this;
    }
    public function getMember()
    {
    	return $this->_member;
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
    public function setTel($value)
    {
    	$this->_tel = (string) $value;
    	return $this;
    }
    public function getTel()
    {
    	return $this->_tel;
    }
    public function setLogo($value)
    {
    	$this->_logo = (string) $value;
    	return $this;
    }
    public function getLogo()
    {
    	return $this->_logo;
    }
    public function setCountryCode($value)
    {
    	$this->_countryCode = (string) $value;
    	return $this;
    }
    public function getCountryCode()
    {
    	return $this->_countryCode;
    }
    public function setScore($value)
    {
    	$this->_score = (int) $value;
    	return $this;
    }
    public function getScore()
    {
    	return $this->_score;
    }
    public function setWin($value)
    {
    	$this->_win = (int) $value;
    	return $this;
    }
    public function getWin()
    {
    	return $this->_win;
    }
    public function setLose($value)
    {
    	$this->_lose = (int) $value;
    	return $this;
    }
    public function getLose()
    {
    	return $this->_lose;
    }
    public function setIsAdmin($value)
    {
    	$this->_isAdmin = (int) $value;
    	return $this;
    }
    public function getIsAdmin()
    {
    	return $this->_isAdmin;
    }
}

