<?php

class Application_Model_Item
{

    protected $_itemId;
    protected $_name;
    protected $_detail;
    protected $_detailEN;
    protected $_price;
    protected $_picture;
    protected $_picture2;
    protected $_bonus;
    protected $_information;
    protected $_informationEN;
 
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
            throw new Exception('Invalid item property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid item property');
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
        $this->_itemId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_itemId;
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
    
	public function setPrice($value)
    {
        $this->_price = (int) $value;
        return $this;
    }
 
    public function getPrice()
    {
        return $this->_price;
    }
    
	public function setPicture($value)
    {
        $this->_picture = (string) $value;
        return $this;
    }
 
    public function getPicture()
    {
        return $this->_picture;
    }
    
    public function setPicture2($value)
    {
    	$this->_picture2 = (string) $value;
    	return $this;
    }
    
    public function getPicture2()
    {
    	return $this->_picture2;
    }
    
	public function setBonus($value)
    {
        $this->_bonus = (string) $value;
        return $this;
    }
 
    public function getBonus()
    {
        return $this->_bonus;
    }
    
	public function setInformation($value)
    {
        $this->_information = (string) $value;
        return $this;
    }
 
    public function getInformation()
    {
        return $this->_information;
    }

	public function setInformationEN($value)
    {
        $this->_informationEN = (string) $value;
        return $this;
    }
 
    public function getInformationEN()
    {
        return $this->_informationEN;
    }

}

