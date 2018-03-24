<?php

class Application_Model_SkillDetail
{

    protected $_skilldetailId;
    protected $_level;
    protected $_mana;
    protected $_cooldown;
    protected $_castingRange;
    protected $_aoe;
    protected $_duration;
    protected $_target;
    protected $_effect;
    protected $_skillId;
    
 
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
            throw new Exception('Invalid SkillDetail property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid SkillDetail property');
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
        $this->_skillId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_skillId;
    }
    
	public function setLevel($value)
    {
        $this->_level = (int) $value;
        return $this;
    }
 
    public function getLevel()
    {
        return $this->_level;
    }
    
	public function setMana($value)
    {
        $this->_mana = (string) $value;
        return $this;
    }
 
    public function getMana()
    {
        return $this->_mana;
    }
    
	public function setCooldown($value)
    {
        $this->_cooldown = (string) $value;
        return $this;
    }
 
    public function getCooldown()
    {
        return $this->_cooldown;
    }
    
	public function setCastingRange($value)
    {
        $this->_castingRange = (string) $value;
        return $this;
    }
 
    public function getCastingRange()
    {
        return $this->_castingRange;
    }
    
	public function setAoe($value)
    {
        $this->_aoe = (string) $value;
        return $this;
    }
 
    public function getAoe()
    {
        return $this->_aoe;
    }
    
	public function setDuration($value)
    {
        $this->_duration = (string) $value;
        return $this;
    }
 
    public function getDuration()
    {
        return $this->_duration;
    }
    
	public function setTarget($value)
    {
        $this->_target = (string) $value;
        return $this;
    }
 
    public function getTarget()
    {
        return $this->_target;
    }
    
	public function setEffect($value)
    {
        $this->_effect = (string) $value;
        return $this;
    }
 
    public function getEffect()
    {
        return $this->_effect;
    }
    
	public function setSkillId($value)
    {
        $this->_skillId = (int) $value;
        return $this;
    }
 
    public function getSkillId()
    {
        return $this->_skillId;
    }
    
	
    

}

