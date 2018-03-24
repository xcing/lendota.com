<?php 

class Application_Model_Replay2
{
    const TOP_REPLAY2_AMOUNT = 5;    
    
	protected $_replay2Id;
	protected $_team1;
	protected $_team2;
	protected $_matchContest;
	protected $_rate;
	protected $_win;
	protected $_uploadedDate;
	protected $_totalView;
	protected $_totalComment;
	protected $_chosenTeam1;
	protected $_chosenTeam2;
	protected $_banTeam1;
	protected $_banTeam2;
	protected $_laneTeam1;
	protected $_laneTeam2;
	protected $_firstPick;
	protected $_link;
	protected $_replayMatchId;
	
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
            throw new Exception('Invalid replay2 property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid replay2 property');
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
    	$this->_replay2Id = (int) $value;
    	return $this;
    }
    
    public function getId()
    {
    	return $this->_replay2Id;
    }
    
    public function setTeam1($value)
    {
    	$this->_team1 = (string) $value;
    	return $this;
    }
    
    public function getTeam1()
    {
    	return $this->_team1;
    }
    
    public function setTeam2($value)
    {
    	$this->_team2 = (string) $value;
    	return $this;
    }
    
    public function getTeam2()
    {
    	return $this->_team2;
    }
    
    public function setMatchContest($value)
    {
    	$this->_matchContest = (string) $value;
    	return $this;
    }
    
    public function getMatchContest()
    {
    	return $this->_matchContest;
    }
    
    public function setRate($value)
    {
    	$this->_rate = (int) $value;
    	return $this;
    }
    
    public function getRate()
    {
    	return $this->_rate;
    }
    
    public function setWin($value)
    {
    	$this->_win = (int) $value;
    	return $this;
    }
    
    public function getWin()
    {
    	return $this->_win;
    }
    
    public function setUploadedDate($value)
    {
    	$this->_uploadedDate = (string) $value;
    	return $this;
    }
    
    public function getUploadedDate()
    {
    	return $this->_uploadedDate;
    }
    
    public function setTotalView($value)
    {
    	$this->_totalView = (int) $value;
    	return $this;
    }
    
    public function getTotalView()
    {
    	return $this->_totalView;
    }
    
	public function setTotalComment($value)
    {
    	$this->_totalComment = (int) $value;
    	return $this;
    }
    
    public function getTotalComment()
    {
    	return $this->_totalComment;
    }
    
    public function setChosenTeam1($value)
    {
    	$this->_chosenTeam1 = (string) $value;
    	return $this;
    }
    
    public function getChosenTeam1()
    {
    	return $this->_chosenTeam1;
    }
    
    public function setChosenTeam2($value)
    {
    	$this->_chosenTeam2 = (string) $value;
    	return $this;
    }
    
    public function getChosenTeam2()
    {
    	return $this->_chosenTeam2;
    }
    
    public function setBanTeam1($value)
    {
    	$this->_banTeam1 = (string) $value;
    	return $this;
    }
    
    public function getBanTeam1()
    {
    	return $this->_banTeam1;
    }
    
    public function setBanTeam2($value)
    {
    	$this->_banTeam2 = (string) $value;
    	return $this;
    }
    
    public function getBanTeam2()
    {
    	return $this->_banTeam2;
    }
    
    public function getLaneTeam1()
    {
        return $this->_laneTeam1;
    }

    public function setLaneTeam1($laneTeam1)
    {
        $this->_laneTeam1 = (string) $laneTeam1;
        return $this;
    }

    public function getLaneTeam2()
    {
        return $this->_laneTeam2;
    }

    public function setLaneTeam2($laneTeam2)
    {
        $this->_laneTeam2 = (string) $laneTeam2;
        return $this;
    }

        public function setFirstPick($value)
    {
    	$this->_firstPick = (int) $value;
    	return $this;
    }
    
    public function getFirstPick()
    {
    	return $this->_firstPick;
    }
    
    public function setLink($value)
    {
    	$this->_link = (string) $value;
    	return $this;
    }
    
    public function getLink()
    {
    	return $this->_link;
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
}