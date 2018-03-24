<?php

class Application_Model_Detailorder
{

    protected $_detailorderId;
    protected $_equipmentId;
    protected $_amount;
    protected $_orderId;
 
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
            throw new Exception('Invalid detailorder property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid detailorder property');
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
 
    public function setDetailorderId($value)
    {
        $this->_detailorderId = (int) $value;
        return $this;
    }
 
    public function getDetailorderId()
    {
        return $this->_detailorderId;
    }
    
	public function setEquipmentId($value)
    {
        $this->_equipmentId = (int) $value;
        return $this;
    }
 
    public function getEquipmentId()
    {
        return $this->_equipmentId;
    }
    public function setAmount($value)
    {
    	$this->_amount = (int) $value;
    	return $this;
    }
    
    public function getAmount()
    {
    	return $this->_amount;
    }
    
	public function setOrderId($value)
    {
        $this->_orderId = (int) $value;
        return $this;
    }
 
    public function getOrderId()
    {
        return $this->_orderId;
    }
}

