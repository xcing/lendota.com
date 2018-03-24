<?php 

class Application_Model_Replay
{
    const TOP_REPLAY_AMOUNT = 5;    
    
	protected $_replayId;
	protected $_replayFileName;
	protected $_sentinelTeamName;
	protected $_scourgeTeamName;
	protected $_matchContest;
	protected $_rate;
	protected $_uploadedDate;
	protected $_totalView;
	protected $_totalDownload;
	protected $_totalComment;
	
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
            throw new Exception('Invalid replay property');
        }
        $this->$method($value);
    }
 
    public function __get($name)
    {
        $method = 'get' . $name;
        if (('mapper' == $name) || !method_exists($this, $method)) {
            throw new Exception('Invalid replay property');
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
    	$this->_replayId = (int) $value;
    	return $this;
    }
    
    public function getId()
    {
    	return $this->_replayId;
    }
    
    public function setReplayFileName($value)
    {
    	$this->_replayFileName = (string) $value;
    	return $this;
    }
    
    public function getReplayFileName()
    {
    	return $this->_replayFileName;
    }
    
    public function setSentinelTeamName($value)
    {
    	$this->_sentinelTeamName = (string) $value;
    	return $this;
    }
    
    public function getSentinelTeamName()
    {
    	return $this->_sentinelTeamName;
    }
    
    public function setScourgeTeamName($value)
    {
    	$this->_scourgeTeamName = (string) $value;
    	return $this;
    }
    
    public function getScourgeTeamName()
    {
    	return $this->_scourgeTeamName;
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
    
    public function setTotalDownload($value)
    {
    	$this->_totalDownload = (int) $value;
    	return $this;
    }
    
    public function getTotalDownload()
    {
    	return $this->_totalDownload;
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
    
}