<?php

class Application_Model_Rank
{

    protected $_rankId;
    protected $_rankName;
    protected $_admin;
    
 
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
            throw new Exception('Invalid rank property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid rank property');
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
        $this->_rankId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_rankId;
    }
    
	public function setRankName($value)
    {
        $this->_rankName = (string) $value;
        return $this;
    }
 
    public function getRankName()
    {
        return $this->_rankName;
    }
    
	public function setAdmin($value)
    {
        $this->_admin = (int) $value;
        return $this;
    }
 
    public function getAdmin()
    {
        return $this->_admin;
    }
    

}

