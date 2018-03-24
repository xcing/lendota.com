<?php

class Application_Model_Appointment
{

    protected $_appointmentId;
    protected $_matchId;
    protected $_teamId;
    protected $_detail;
    protected $_date;
 
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
            throw new Exception('Invalid appointment property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid appointment property');
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
        $this->_appointmentId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_appointmentId;
    }
    
	public function setMatchId($value)
    {
        $this->_matchId = (int) $value;
        return $this;
    }
 
    public function getMatchId()
    {
        return $this->_matchId;
    }
    
    public function setTeamId($value)
    {
    	$this->_teamId = (int) $value;
    	return $this;
    }
    
    public function getTeamId()
    {
    	return $this->_teamId;
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
    
	public function setDate($value)
    {
        $this->_date = (string) $value;
        return $this;
    }
 
    public function getDate()
    {
        return $this->_date;
    }
   
}

