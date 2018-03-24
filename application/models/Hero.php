<?php

class Application_Model_Hero
{

    protected $_heroId;
    protected $_name;
    protected $_lastname;
    protected $_fullname2;
    protected $_name2;
    protected $_picIcon;
    protected $_picIcon2;
    protected $_picTitle;
    protected $_picCartoon2;
    protected $_title;
    protected $_titleEN;
    protected $_title2;
    protected $_titleEN2;
    protected $_quote;
    protected $_type;
    protected $_hp;
    protected $_mp;
    protected $_atk;
    protected $_armor;
    protected $_movespeed;
    protected $_str;
    protected $_agi;
    protected $_int;
    protected $_range;
    protected $_side;
    protected $_ordinal;
 
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
            throw new Exception('Invalid hero property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid hero property');
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
        $this->_heroId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_heroId;
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
    
	public function setLastname($value)
    {
        $this->_lastname = (string) $value;
        return $this;
    }
 
    public function getLastname()
    {
        return $this->_lastname;
    }
    public function setFullname2($value)
    {
    	$this->_fullname2 = (string) $value;
    	return $this;
    }
    
    public function getFullname2()
    {
    	return $this->_fullname2;
    }
	public function setPicIcon($value)
    {
        $this->_picIcon = (string) $value;
        return $this;
    }
    public function setName2($value)
    {
    	$this->_name2 = (string) $value;
    	return $this;
    }
    
    public function getName2()
    {
    	return $this->_name2;
    }
    public function getPicIcon()
    {
        return $this->_picIcon;
    }
    public function setPicIcon2($value)
    {
    	$this->_picIcon2 = (string) $value;
    	return $this;
    }
    
    public function getPicIcon2()
    {
    	return $this->_picIcon2;
    }
    
	public function setPicTitle($value)
    {
        $this->_picTitle = (string) $value;
        return $this;
    }
 
    public function getPicTitle()
    {
        return $this->_picTitle;
    }
    
    public function setPicCartoon2($value)
    {
    	$this->_picCartoon2 = (string) $value;
    	return $this;
    }
    
    public function getPicCartoon2()
    {
    	return $this->_picCartoon2;
    }
    
	public function setTitle($value)
    {
        $this->_title = (string) $value;
        return $this;
    }
 
    public function getTitle()
    {
        return $this->_title;
    }
    
	public function setTitleEN($value)
    {
        $this->_titleEN = (string) $value;
        return $this;
    }
 
    public function getTitleEN()
    {
        return $this->_titleEN;
    }
    public function setTitle2($value)
    {
    	$this->_title2 = (string) $value;
    	return $this;
    }
    
    public function getTitle2()
    {
    	return $this->_title2;
    }
    
    public function setTitleEN2($value)
    {
    	$this->_titleEN2 = (string) $value;
    	return $this;
    }
    
    public function getTitleEN2()
    {
    	return $this->_titleEN2;
    }
    public function setQuote($value)
    {
    	$this->_quote = (string) $value;
    	return $this;
    }
    
    public function getQuote()
    {
    	return $this->_quote;
    }
    
	public function setType($value)
    {
        $this->_type = (string) $value;
        return $this;
    }
 
    public function getType()
    {
        return $this->_type;
    }
    
	public function setHp($value)
    {
        $this->_hp = (string) $value;
        return $this;
    }
 
    public function getHp()
    {
        return $this->_hp;
    }
    
	public function setMp($value)
    {
        $this->_mp = (string) $value;
        return $this;
    }
 
    public function getMp()
    {
        return $this->_mp;
    }
    
	public function setAtk($value)
    {
        $this->_atk = (string) $value;
        return $this;
    }
 
    public function getAtk()
    {
        return $this->_atk;
    }
    
	public function setArmor($value)
    {
        $this->_armor = (string) $value;
        return $this;
    }
 
    public function getArmor()
    {
        return $this->_armor;
    }
    
	public function setMovespeed($value)
    {
        $this->_movespeed = (string) $value;
        return $this;
    }
 
    public function getMovespeed()
    {
        return $this->_movespeed;
    }
    
	public function setStr($value)
    {
        $this->_str = (string) $value;
        return $this;
    }
 
    public function getStr()
    {
        return $this->_str;
    }
    
	public function setAgi($value)
    {
        $this->_agi = (string) $value;
        return $this;
    }
 
    public function getAgi()
    {
        return $this->_agi;
    }
    
	public function setInt($value)
    {
        $this->_int = (string) $value;
        return $this;
    }
 
    public function getInt()
    {
        return $this->_int;
    }
    
	public function setRange($value)
    {
        $this->_range = (int) $value;
        return $this;
    }
 
    public function getRange()
    {
        return $this->_range;
    }
	public function setSide($value)
    {
        $this->_side = (int) $value;
        return $this;
    }
 
    public function getSide()
    {
        return $this->_side;
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

}

