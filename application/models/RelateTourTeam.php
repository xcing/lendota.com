<?php

class Application_Model_RelateTourTeam
{

    protected $_relateTourTeamId;
    protected $_tournamentId;
    protected $_teamId;
    
 
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
            throw new Exception('Invalid RelateTourTeam property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid RelateTourTeam property');
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
        
    public function setRelateTourTeamId($value)
    {
        $this->_relateTourTeamId = (int) $value;
        return $this;
    }
 
    public function getRelateTourTeamId()
    {
        return $this->_relateTourTeamId;
    }
    
	public function setTournamentId($value)
    {
        $this->_tournamentId = (int) $value;
        return $this;
    }
 
    public function getTournamentId()
    {
        return $this->_tournamentId;
    }
    
	public function setTeamId($value)
    {
        $this->_teamId = (int) $value;
        return $this;
    }
 
    public function getTeamId()
    {
        return $this->_teamId;
    }
    

}

