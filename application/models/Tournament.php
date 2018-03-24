<?php

class Application_Model_Tournament
{
    protected $_tournamentId;
    protected $_name;
    protected $_award;
    protected $_picture;
    protected $_startDate;
    protected $_deadlineDate;
    protected $_champId;
    protected $_secondId;
    protected $_thirdId;
    protected $_gameAmount;
    protected $_finalGameAmount;
    protected $_type;
    protected $_roundAmount;
    protected $_thirdPlace;
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
            throw new Exception('Invalid tournament property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid tournament property');
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
    
    public function setTournamentId($value)
    {
        $this->_tournamentId = (int) $value;
        return $this;
    }
 
    public function getTournamentId()
    {
        return $this->_tournamentId;
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
    
	public function setAward($value)
    {
        $this->_award = (string) $value;
        return $this;
    }
 
    public function getAward()
    {
        return $this->_award;
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
    
	public function setStartDate($value)
    {
        $this->_startDate = (string) $value;
        return $this;
    }
 
    public function getStartDate()
    {
        return $this->_startDate;
    }
    public function setDeadlineDate($value)
    {
    	$this->_deadlineDate = (string) $value;
    	return $this;
    }
    
    public function getDeadlineDate()
    {
    	return $this->_deadlineDate;
    }
    
	public function setChampId($value)
    {
        $this->_champId = (int) $value;
        return $this;
    }
 
    public function getChampId()
    {
        return $this->_champId;
    }
    
	public function setSecondId($value)
    {
        $this->_secondId = (int) $value;
        return $this;
    }
 
    public function getSecondId()
    {
        return $this->_secondId;
    }
    
    public function setThirdId($value)
    {
    	$this->_thirdId = (int) $value;
    	return $this;
    }
    
    public function getThirdId()
    {
    	return $this->_thirdId;
    }
    
    public function setGameAmount($value)
    {
    	$this->_gameAmount = (int) $value;
    	return $this;
    }
    
    public function getGameAmount()
    {
    	return $this->_gameAmount;
    }
    
    public function setFinalGameAmount($value)
    {
    	$this->_finalGameAmount = (int) $value;
    	return $this;
    }
    
    public function getFinalGameAmount()
    {
    	return $this->_finalGameAmount;
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
    
    public function setRoundAmount($value)
    {
    	$this->_roundAmount = (int) $value;
    	return $this;
    }
    
    public function getRoundAmount()
    {
    	return $this->_roundAmount;
    }
    
    public function getThirdPlace()
    {
        return $this->_thirdPlace;
    }

    public function setThirdPlace($thirdPlace)
    {
        $this->_thirdPlace = (int) $thirdPlace;
        return $this;
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

