<?php

class Application_Model_MatchResult
{

    protected $_matchResultId;
    protected $_result;
    protected $_matchId;
    protected $_screenshot;
    protected $_replay;
    protected $_game;
 
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
            throw new Exception('Invalid matchReplay property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid matchReplay property');
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
    
    public function setMatchResultId($value)
    {
        $this->_matchResultId = (int) $value;
        return $this;
    }
 
    public function getMatchResultId()
    {
        return $this->_matchResultId;
    }
    
	public function setResult($value)
    {
        $this->_result = (int) $value;
        return $this;
    }
 
    public function getResult()
    {
        return $this->_result;
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
    
    public function setScreenshot($value)
    {
    	$this->_screenshot = (string) $value;
    	return $this;
    }
    
    public function getScreenshot()
    {
    	return $this->_screenshot;
    }
    public function setReplay($value)
    {
    	$this->_replay = (string) $value;
    	return $this;
    }
    
    public function getReplay()
    {
    	return $this->_replay;
    }
    
    public function setGame($value)
    {
    	$this->_game = (int) $value;
    	return $this;
    }
    
    public function getGame()
    {
    	return $this->_game;
    }
}

