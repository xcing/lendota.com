<?php

class Application_Model_Equipment
{

    protected $_equipmentId;
    protected $_name;
    protected $_image;
    protected $_price;
    protected $_priceSale;
    protected $_heroId;
    protected $_bundleId;
    protected $_chestId;
    protected $_rarity;
    protected $_slot;
    protected $_category;
    protected $_type;
    protected $_isNew;
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
            throw new Exception('Invalid equipment property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid equipment property');
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
 
    public function setEquipmentId($value)
    {
        $this->_equipmentId = (int) $value;
        return $this;
    }
 
    public function getEquipmentId()
    {
        return $this->_equipmentId;
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
    public function setImage($value)
    {
    	$this->_image = (string) $value;
    	return $this;
    }
    
    public function getImage()
    {
    	return $this->_image;
    }
    
	public function setPrice($value)
    {
        $this->_price = (string) $value;
        return $this;
    }
 
    public function getPrice()
    {
        return $this->_price;
    }
    
	public function setPriceSale($value)
    {
        $this->_priceSale = (string) $value;
        return $this;
    }
 
    public function getPriceSale()
    {
        return $this->_priceSale;
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
    
	public function setBundleId($value)
    {
        $this->_bundleId = (int) $value;
        return $this;
    }
 
    public function getBundleId()
    {
        return $this->_bundleId;
    }
    public function setChestId($value)
    {
    	$this->_chestId = (string) $value;
    	return $this;
    }
    
    public function getChestId()
    {
    	return $this->_chestId;
    }
    public function setRarity($value)
    {
    	$this->_rarity = (int) $value;
    	return $this;
    }
    
    public function getRarity()
    {
    	return $this->_rarity;
    }
    public function setSlot($value)
    {
    	$this->_slot = (int) $value;
    	return $this;
    }
    
    public function getSlot()
    {
    	return $this->_slot;
    }
    public function setCategory($value)
    {
    	$this->_category = (int) $value;
    	return $this;
    }
    
    public function getCategory()
    {
    	return $this->_category;
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
    public function setIsNew($value)
    {
    	$this->_isNew = (int) $value;
    	return $this;
    }
    
    public function getIsNew()
    {
    	return $this->_isNew;
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

