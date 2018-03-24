<?php

class Application_Model_RoundSchedule
{
    protected $_roundScheduleId;
    protected $_tournamentId;
    protected $_round;
    protected $_date;
    
 
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
            throw new Exception('Invalid Tag property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid Tag property');
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
 
	public function getRoundScheduleId() {
		return $this->_roundScheduleId;
	}

	public function setRoundScheduleId($roundScheduleId) {
		$this->_roundScheduleId = (int) $roundScheduleId;
		return $this;
	}

	public function getTournamentId() {
		return $this->_tournamentId;
	}

	public function setTournamentId($tournamentId) {
		$this->_tournamentId = (int) $tournamentId;
		return $this;
	}

	public function getRound() {
		return $this->_round;
	}

	public function setRound($round) {
		$this->_round = (int) $round;
		return $this;
	}

	public function getDate() {
		return $this->_date;
	}

	public function setDate($date) {
		$this->_date = $date;
		return $this;
	}

}

