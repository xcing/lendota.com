<?php

class Application_Model_Stream
{

    protected $_streamId;
    protected $_image;
    protected $_program;
    protected $_team1;
    protected $_team2;
    protected $_url;
    protected $_live;
    protected $_click;
    protected $_ordinal;
    protected $_ownerId;
 
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
            throw new Exception('Invalid Stream property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Stream property');
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
    
    public function setStreamId($value)
    {
        $this->_streamId = (int) $value;
        return $this;
    }
 
    public function getStreamId()
    {
        return $this->_streamId;
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
    
	public function setProgram($value)
    {
        $this->_program = (string) $value;
        return $this;
    }
 
    public function getProgram()
    {
        return $this->_program;
    }
    public function setTeam1($value)
    {
    	$this->_team1 = (string) $value;
    	return $this;
    }
    
    public function getTeam1()
    {
    	return $this->_team1;
    }
    public function setTeam2($value)
    {
    	$this->_team2 = (string) $value;
    	return $this;
    }
    
    public function getTeam2()
    {
    	return $this->_team2;
    }
    
    public function setUrl($value)
    {
    	$this->_url = (string) $value;
    	return $this;
    }
    
    public function getUrl()
    {
    	return $this->_url;
    }
    public function setLive($value)
    {
    	$this->_live = (int) $value;
    	return $this;
    }
    
    public function getLive()
    {
    	return $this->_live;
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
    public function setOrdinal($value)
    {
    	$this->_ordinal = (int) $value;
    	return $this;
    }
    
    public function getOrdinal()
    {
    	return $this->_ordinal;
    }
    public function setOwnerId($value)
    {
    	$this->_ownerId = (int) $value;
    	return $this;
    }
    
    public function getOwnerId()
    {
    	return $this->_ownerId;
    }
}

