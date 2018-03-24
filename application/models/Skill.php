<?php

class Application_Model_Skill
{

    protected $_skillId;
    protected $_name;
    protected $_picture;
    protected $_picture2;
    protected $_abilityType;
    protected $_targetType;
    protected $_hotkey;
    protected $_detail;
    protected $_detailEN;
    protected $_note;
    protected $_noteEN;
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
            throw new Exception('Invalid Skill property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Skill property');
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
    
	public function setName($value)
    {
        $this->_name = (string) $value;
        return $this;
    }
 
    public function getName()
    {
        return $this->_name;
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
    
    public function setPicture2($value)
    {
    	$this->_picture2 = (string) $value;
    	return $this;
    }
    
    public function getPicture2()
    {
    	return $this->_picture2;
    }
    
	public function setAbilityType($value)
    {
        $this->_abilityType = (string) $value;
        return $this;
    }
 
    public function getAbilityType()
    {
        return $this->_abilityType;
    }
    
	public function setTargetType($value)
    {
        $this->_targetType = (string) $value;
        return $this;
    }
 
    public function getTargetType()
    {
        return $this->_targetType;
    }
    
	public function setHotkey($value)
    {
        $this->_hotkey = (string) $value;
        return $this;
    }
 
    public function getHotkey()
    {
        return $this->_hotkey;
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
    
	public function setNote($value)
    {
        $this->_note = (string) $value;
        return $this;
    }
 
    public function getNote()
    {
        return $this->_note;
    }
    
	public function setNoteEN($value)
    {
        $this->_noteEN = (string) $value;
        return $this;
    }
 
    public function getNoteEN()
    {
        return $this->_noteEN;
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

