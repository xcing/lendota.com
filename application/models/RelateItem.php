<?php

class Application_Model_RelateItem
{

    protected $_relateItemId;
    protected $_itemId;
    protected $_materialId;
    
 
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
            throw new Exception('Invalid RelateItem property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid RelateItem property');
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
        $this->_relateItemId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_relateItemId;
    }
    
	public function setItemId($value)
    {
        $this->_itemId = (int) $value;
        return $this;
    }
 
    public function getItemId()
    {
        return $this->_itemId;
    }
    
	public function setMaterialId($value)
    {
        $this->_materialId = (int) $value;
        return $this;
    }
 
    public function getMaterialId()
    {
        return $this->_materialId;
    }
    

}

