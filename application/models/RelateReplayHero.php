<?php 

class Application_Model_RelateReplayHero
{
	protected $_relateReplayHeroId;
	protected $_replayId;
	protected $_heroId;
	
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
            throw new Exception('Invalid relateReplayHero property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid relateReplayHero property');
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
    	$this->_relateReplayHeroId = (int) $value;
    	return $this;
    }
    
    public function getId()
    {
    	return $this->_relateReplayHeroId;
    }
    
    public function setReplayId($value)
    {
    	$this->_replayId = (int) $value;
    	return $this;
    }
    
    public function getReplayId()
    {
    	return $this->_replayId;
    }
    
    public function setHeroId($value)
    {
    	$this->_heroId = (int) $value;
    	return $this;
    }
    
    public function getHeroId()
    {
    	return $this->_heroId;
    }
}