<?php

class Application_Model_RankClan
{

    protected $_rankClanId;
    protected $_name;
    protected $_privilege;
    
 
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
            throw new Exception('Invalid rankClan property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid rankClan property');
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
        $this->_rankClanId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_rankClanId;
    }
    
	public function setName($value)
    {
        $this->_Name = (string) $value;
        return $this;
    }
 
    public function getName()
    {
        return $this->_Name;
    }
    
	public function setPrivilege($value)
    {
        $this->_privilege = (int) $value;
        return $this;
    }
 
    public function getPrivilege()
    {
        return $this->_privilege;
    }
    

}

