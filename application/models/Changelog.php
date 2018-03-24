<?php

class Application_Model_Changelog
{

    protected $_changelogId;
    protected $_heroId;
    protected $_detail;
    protected $_detailEN;
    protected $_mapId;
    protected $_type;
 
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
            throw new Exception('Invalid changelog property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid changelog property');
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
        $this->_changelogId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_changelogId;
    }
    
	public function setHeroId($value)
    {
        $this->_heroId = (int) $value;
        return $this;
    }
 
    public function getHeroId()
    {
        return $this->_heroId;
    }
    
	public function setDetail($value)
    {
        $this->_detail = (string) $value;
        return $this;
    }
 
    public function getDetail()
    {
        return $this->_detail;
    }
    
	public function setDetailEN($value)
    {
        $this->_detailEN = (string) $value;
        return $this;
    }
 
    public function getDetailEN()
    {
        return $this->_detailEN;
    }
    
	public function setMapId($value)
    {
        $this->_mapId = (int) $value;
        return $this;
    }
 
    public function getMapId()
    {
        return $this->_mapId;
    }
    
	public function setType($value)
    {
        $this->_type = (int) $value;
        return $this;
    }
 
    public function getType()
    {
        return $this->_type;
    }
   
}

