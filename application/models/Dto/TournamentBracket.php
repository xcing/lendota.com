<?php

class Application_Model_Dto_TournamentBracket
{
	private $_name;
    private $_teams;
    private $_results;
    private $_gameAmount;
    private $_finalGameAmount;
	private $_thirdPlaceFlag;
	
	public function getName()
	{
		return $this->_name;
	}

	public function setName($name)
	{
		$this->_name = $name;
		return $this;
	}

	public function getTeams()
    {
        return $this->_teams;
    }

    public function setTeams($teams)
    {
        $this->_teams = $teams;
        return $this;
    }

    public function getResults()
    {
        return $this->_results;
    }

    public function setResults($results)
    {
        $this->_results = $results;
        return $this;
    }

    public function getGameAmount()
    {
        return $this->_gameAmount;
    }

    public function setGameAmount($gameAmount)
    {
        $this->_gameAmount = $gameAmount;
    }

    public function getFinalGameAmount()
    {
        return $this->_finalGameAmount;
    }

    public function setFinalGameAmount($finalGameAmount)
    {
        $this->_finalGameAmount = $finalGameAmount;
    }

	public function hasThirdPlace()
	{
		return $this->_thirdPlaceFlag;
	}

	public function setThirdPlaceFlag($thirdPlaceFlag)
	{
		$this->_thirdPlaceFlag = (int) $thirdPlaceFlag;
		return $this;
	}
}
