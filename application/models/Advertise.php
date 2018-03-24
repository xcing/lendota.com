<?php

class Application_Model_Advertise
{
    protected $_advertiseId;
    protected $_position;
    protected $_image;
    protected $_detail;
    protected $_detailEN;
    protected $_link;
    protected $_click;
    protected $_active;
 
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
            throw new Exception('Invalid advertise property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid advertise property');
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
    
    public function setAdvertiseId($value)
    {
        $this->_advertiseId = (int) $value;
        return $this;
    }
 
    public function getAdvertiseId()
    {
        return $this->_advertiseId;
    }
    
	public function setPosition($value)
    {
        $this->_position = (int) $value;
        return $this;
    }
 
    public function getPosition()
    {
        return $this->_position;
    }
    
	public function setImage($value)
    {
        $this->_image = (string) $value;
        return $this;
    }
 
    public function getImage()
    {
        return $this->_image;
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
    public function setLink($value)
    {
    	$this->_link = (string) $value;
    	return $this;
    }
    
    public function getLink()
    {
    	return $this->_link;
    }
    
	public function setClick($value)
    {
        $this->_click = (int) $value;
        return $this;
    }
 
    public function getClick()
    {
        return $this->_click;
    }
    
    public function setActive($value)
    {
		$this->_active = (int) $value;
    	return $this;
    }
    
    public function getActive()
    {
    	return $this->_active;
    }
}

