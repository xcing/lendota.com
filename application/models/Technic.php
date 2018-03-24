<?php

class Application_Model_Technic
{
    protected $_technicId;
    protected $_topic;
    protected $_topicEN;
    protected $_detail;
    protected $_detailEN;
    protected $_icon;
    protected $_ordinal;
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
            throw new Exception('Invalid Technic property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Technic property');
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
        $this->_technicId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_technicId;
    }
    
	public function setTopic($value)
    {
        $this->_topic = (string) $value;
        return $this;
    }
 
    public function getTopic()
    {
        return $this->_topic;
    }
    
	public function setTopicEN($value)
    {
        $this->_topicEN = (string) $value;
        return $this;
    }
 
    public function getTopicEN()
    {
        return $this->_topicEN;
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
    
	public function setIcon($value)
    {
        $this->_icon = (string) $value;
        return $this;
    }
 
    public function getIcon()
    {
        return $this->_icon;
    }
    
	public function setOrdinal($_firstname) 
	{
		$this->_ordinal = (int) $_firstname;
		return $this;
	}
	public function getOrdinal() 
	{
		return $this->_ordinal;
	}
	public function setActive($_active) 
	{
		$this->_active = (int) $_active;
	}
	public function getActive() 
	{
		return $this->_active;
	}

	

}

