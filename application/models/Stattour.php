<?php

class Application_Model_Stattour
{
    protected $_statTourId;
    protected $_team1Id;
    protected $_team2Id;
    protected $_win;
    protected $_lose;
    
 
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
            throw new Exception('Invalid Stattour property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Stattour property');
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
        $this->_statTourId = (int) $value;
        return $this;
    }
    public function getId()
    {
        return $this->_statTourId;
    }
    
	public function setTeam1Id($value)
    {
        $this->_team1Id = (int) $value;
        return $this;
    }
    public function getTeam1Id()
    {
        return $this->_team1Id;
    }
	public function setTeam2Id($value)
    {
        $this->_team2Id = (int) $value;
        return $this;
    }
    public function getTeam2Id()
    {
        return $this->_team2Id;
    }
    public function setWin($value)
    {
    	$this->_win = (int) $value;
    	return $this;
    }
    public function getWin()
    {
    	return $this->_win;
    }
    public function setLose($value)
    {
    	$this->_lose = (int) $value;
    	return $this;
    }
    public function getLose()
    {
    	return $this->_lose;
    }
}

