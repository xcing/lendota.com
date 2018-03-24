<?php 

class Application_Model_RelateNewsTag
{
	protected $_relateNewsTagId;
	protected $_newsId;
	protected $_tagId;
	
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
            throw new Exception('Invalid relateNewsTag property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid relateNewsTag property');
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
    	$this->_relateNewsTagId = (int) $value;
    	return $this;
    }
    
    public function getId()
    {
    	return $this->_relateNewsTagId;
    }
    
    public function setNewsId($value)
    {
    	$this->_newsId = (int) $value;
    	return $this;
    }
    
    public function getNewsId()
    {
    	return $this->_newsId;
    }
    
    public function setTagId($value)
    {
    	$this->_tagId = (int) $value;
    	return $this;
    }
    
    public function getTagId()
    {
    	return $this->_tagId;
    }
}