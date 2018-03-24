<?php

class Application_Model_Guidehero
{

    protected $_guideHeroId;
    protected $_name;
    protected $_skill;
    protected $_item;
    protected $_heroCombo;
    protected $_heroWeak;
    protected $_detail;
    protected $_ordinal;
    protected $_heroId;
    protected $_replayId;
 
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
            throw new Exception('Invalid guidehero property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid guidehero property');
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
        $this->_guideHeroId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_guideHeroId;
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
    
	public function setSkill($value)
    {
        $this->_skill = (string) $value;
        return $this;
    }
 
    public function getSkill()
    {
        return $this->_skill;
    }
    
	public function setItem($value)
    {
        $this->_item = (string) $value;
        return $this;
    }
 
    public function getItem()
    {
        return $this->_item;
    }
    
	public function setHeroCombo($value)
    {
        $this->_heroCombo = (string) $value;
        return $this;
    }
 
    public function getHeroCombo()
    {
        return $this->_heroCombo;
    }
    
	public function setHeroWeak($value)
    {
        $this->_heroWeak = (string) $value;
        return $this;
    }
 
    public function getHeroWeak()
    {
        return $this->_heroWeak;
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
    
	public function setOrdinal($value)
    {
        $this->_ordinal = (int) $value;
        return $this;
    }
 
    public function getOrdinal()
    {
        return $this->_ordinal;
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
    
	public function setReplayId($value)
    {
        $this->_replayId = (string) $value;
        return $this;
    }
 
    public function getReplayId()
    {
        return $this->_replayId;
    }
    
	
}

