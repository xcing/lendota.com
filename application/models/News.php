<?php

class Application_Model_News
{

    protected $_newsId;
    protected $_topic;
    protected $_topicEN;
    protected $_detail;
    protected $_detailEN;
    protected $_picture;
    protected $_date;
    protected $_type;
    protected $_read;
    protected $_replayType;
    protected $_replayId;
    protected $_creditName;
    protected $_creditLink;
    protected $_active;
    protected $_stick;
    protected $_userId;
 
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
            throw new Exception('Invalid news property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid news property');
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
        $this->_newsId = (int) $value;
        return $this;
    }
 
    public function getId()
    {
        return $this->_newsId;
    }
    
	public function setTopic($value)
    {
        $this->_topic = (string) $value;
        return $this;
    }
 
    public function getTopic()
    {
        return $this->_topic;
    }
    
	public function setTopicEN($value)
    {
        $this->_topicEN = (string) $value;
        return $this;
    }
 
    public function getTopicEN()
    {
        return $this->_topicEN;
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
    
	public function setPicture($value)
    {
        $this->_picture = (string) $value;
        return $this;
    }
 
    public function getPicture()
    {
        return $this->_picture;
    }
    
	public function setDate($value)
    {
        $this->_date = (string) $value;
        return $this;
    }
 
    public function getDate()
    {
        return $this->_date;
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
	
	public function setRead($value)
    {
        $this->_read = (int) $value;
        return $this;
    }
 
    public function getRead()
    {
        return $this->_read;
    }
    
	public function setReplayType($value)
    {
        $this->_replayType = (int) $value;
        return $this;
    }
 
    public function getReplayType()
    {
        return $this->_replayType;
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
    
	public function setCreditName($value)
    {
        $this->_creditName = (string) $value;
        return $this;
    }
 
    public function getCreditName()
    {
        return $this->_creditName;
    }
    
	public function setCreditLink($value)
    {
        $this->_creditLink = (string) $value;
        return $this;
    }
 
    public function getCreditLink()
    {
        return $this->_creditLink;
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
    
	public function setStick($value)
    {
        $this->_stick = (int) $value;
        return $this;
    }
 
    public function getStick()
    {
        return $this->_stick;
    }
    
    public function setUserId($value)
    {
    	$this->_userId = (int) $value;
    	return $this;
    }
    
    public function getUserId()
    {
    	return $this->_userId;
    }
    
    public function splitDetail($value) {
    	$value = explode("[--break--]", $value);
    	return $value[0];
    }
    
	public function splitDetailAfter($value) {
    	$value = explode("[--break--]", $value);
    	return $value[1];
    }
    
    public function escapeBreak($value) {
    	$value = str_replace("[--break--]", "", $value);
    	return $value;
    }
    
    public function escapeTextForDescription($textWithSpecialChar)
    {
    	return str_replace("&", "&amp;", (html_entity_decode($textWithSpecialChar, ENT_QUOTES, 'UTF-8')));
    }

}

