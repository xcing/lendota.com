<?php

class Application_Model_Order
{

    protected $_orderId;
    protected $_userId;
    protected $_status;
    protected $_transferDateTime;
    protected $_orderDate;
    protected $_totalPrice;
    protected $_totalPriceTruemoney;
    protected $_bank;
    protected $_truemoney;
    protected $_note;
 
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
            throw new Exception('Invalid order property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid order property');
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
 
    public function setOrderId($value)
    {
        $this->_orderId = (int) $value;
        return $this;
    }
 
    public function getOrderId()
    {
        return $this->_orderId;
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
    public function setStatus($value)
    {
    	$this->_status = (int) $value;
    	return $this;
    }
    
    public function getStatus()
    {
    	return $this->_status;
    }
    
	public function setTransferDateTime($value)
    {
        $this->_transferDateTime = (string) $value;
        return $this;
    }
 
    public function getTransferDateTime()
    {
        return $this->_transferDateTime;
    }
    
	public function setOrderDate($value)
    {
        $this->_orderDate = (string) $value;
        return $this;
    }
 
    public function getOrderDate()
    {
        return $this->_orderDate;
    }
    public function setTotalPrice($value)
    {
    	$this->_totalPrice = (int) $value;
    	return $this;
    }
    
    public function getTotalPrice()
    {
    	return $this->_totalPrice;
    }
    public function setTotalPriceTruemoney($value)
    {
    	$this->_totalPriceTruemoney = (int) $value;
    	return $this;
    }
    
    public function getTotalPriceTruemoney()
    {
    	return $this->_totalPriceTruemoney;
    }
    public function setBank($value)
    {
    	$this->_bank = (int) $value;
    	return $this;
    }
    
    public function getBank()
    {
    	return $this->_bank;
    }
    public function setTruemoney($value)
    {
    	$this->_truemoney = (string) $value;
    	return $this;
    }
    
    public function getTruemoney()
    {
    	return $this->_truemoney;
    }
    public function setNote($value)
    {
    	$this->_note = (string) $value;
    	return $this;
    }
    
    public function getNote()
    {
    	return $this->_note;
    }
}

