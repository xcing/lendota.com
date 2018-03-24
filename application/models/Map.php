<?php

class Application_Model_Map
{

    protected $_mapId;
    protected $_mapName;
 
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
            throw new Exception('Invalid map property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid map property');
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
        $this->_mapId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_mapId;
    }
    
	public function setMapName($value)
    {
        $this->_mapName = (string) $value;
        return $this;
    }
 
    public function getMapName()
    {
        return $this->_mapName;
    }
   
}

