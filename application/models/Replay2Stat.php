<?php 

class Application_Model_Replay2Stat
{
	protected $_replay2statId;
	protected $_replayMatchId;
	protected $_name;
	protected $_heroId;
	protected $_level;
	protected $_kill;
	protected $_die;
	protected $_assist;
	protected $_gold;
	protected $_lastshot;
	protected $_denie;
	protected $_xpm;
	protected $_gpm;
	protected $_itemId;
	
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
            throw new Exception('Invalid replay2stat property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid replay2stat property');
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
    
    public function setReplay2StatId($value)
    {
    	$this->_replay2statId = (int) $value;
    	return $this;
    }
    
    public function getReplay2StatId()
    {
    	return $this->_replay2statId;
    }
    
    public function setReplayMatchId($value)
    {
    	$this->_replayMatchId = (int) $value;
    	return $this;
    }
    
    public function getReplayMatchId()
    {
    	return $this->_replayMatchId;
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
    
    public function setHeroId($value)
    {
    	$this->_heroId = (int) $value;
    	return $this;
    }
    
    public function getHeroId()
    {
    	return $this->_heroId;
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
    
    public function setKill($value)
    {
    	$this->_kill = (int) $value;
    	return $this;
    }
    
    public function getKill()
    {
    	return $this->_kill;
    }
    
    public function setDie($value)
    {
    	$this->_die = (int) $value;
    	return $this;
    }
    
    public function getDie()
    {
    	return $this->_die;
    }
    
	public function setAssist($value)
    {
    	$this->_assist = (int) $value;
    	return $this;
    }
    
    public function getAssist()
    {
    	return $this->_assist;
    }
    
    public function setGold($value)
    {
    	$this->_gold = (string) $value;
    	return $this;
    }
    
    public function getGold()
    {
    	return $this->_gold;
    }
    
    public function setLastshot($value)
    {
    	$this->_lastshot = (int) $value;
    	return $this;
    }
    
    public function getLastshot()
    {
    	return $this->_lastshot;
    }
    
    public function setDenie($value)
    {
    	$this->_denie = (int) $value;
    	return $this;
    }
    
    public function getDenie()
    {
    	return $this->_denie;
    }
    
    public function setXpm($value)
    {
    	$this->_xpm = (int) $value;
    	return $this;
    }
    
    public function getXpm()
    {
    	return $this->_xpm;
    }
    
    public function setGpm($value)
    {
    	$this->_gpm = (int) $value;
    	return $this;
    }
    
    public function getGpm()
    {
        return $this->_gpm;
    }

    public function setItemId($value)
    {
    	$this->_itemId = (string) $value;
    	return $this;
    }
    public function getItemId()
    {
        return $this->_itemId;
    }
}