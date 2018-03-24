<?php

class Application_Model_Match
{
    protected $_matchId;
    protected $_team1Id;
    protected $_team2Id;
    protected $_round;
    protected $_result;
    protected $_parentId;
    protected $_tournamentId;
    protected $_ordinal;
    protected $_teamSide;
    
    private $_matchResults;


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
            throw new Exception('Invalid match property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid match property');
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
    
    public function setMatchId($value)
    {
        $this->_matchId = (int) $value;
        return $this;
    }
 
    public function getMatchId()
    {
        return $this->_matchId;
    }
    
	public function setTeam1Id($value)
    {
        $this->_team1Id = (int) $value;
        return $this;
    }
 
    public function getTeam1Id()
    {
        return $this->_team1Id;
    }
    
	public function setTeam2Id($value)
    {
        $this->_team2Id = (int) $value;
        return $this;
    }
 
    public function getTeam2Id()
    {
        return $this->_team2Id;
    }
    
	public function setRound($value)
    {
        $this->_round = (string) $value;
        return $this;
    }
 
    public function getRound()
    {
        return $this->_round;
    }
    
	public function setResult($value)
    {
        $this->_result = (int) $value;
        return $this;
    }
 
    public function getResult()
    {
        return $this->_result;
    }
    
	public function setParentId($value)
    {
        $this->_parentId = (int) $value;
        return $this;
    }
 
    public function getParentId()
    {
        return $this->_parentId;
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
    
	public function setOrdinal($value)
    {
        $this->_ordinal = (int) $value;
        return $this;
    }
 
    public function getOrdinal()
    {
        return $this->_ordinal;
    }
    
    public function getMatchResults()
    {
        return $this->_matchResults;
    }

    public function setMatchResults($matchResults)
    {
        $this->_matchResults = $matchResults;
    }
    
    public function getTeamSide()
    {
        return $this->_teamSide;
    }

    public function setTeamSide($teamSide)
    {
        $this->_teamSide = (int) $teamSide;
        return $this;
    }
}

