<?php

class Application_Model_TeamMapper
{

    protected $_dbTable;
 
    public function setDbTable($dbTable)
    {
        if (is_string($dbTable)) {
            $dbTable = new $dbTable();
        }
        if (!$dbTable instanceof Zend_Db_Table_Abstract) {
            throw new Exception('Invalid table data gateway provided');
        }
        $this->_dbTable = $dbTable;
        return $this;
    }
 
    public function getDbTable()
    {
        if (null === $this->_dbTable) {
            $this->setDbTable('Application_Model_DbTable_Team');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
        $this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Team $model)
    {
        $data = array(
	        'name'   		=> $model->getName(),
        	'shortName' 	=> $model->getShortName(),
        	'password'		=> $model->getPassword(),
        	'member'		=> $model->getMember(),
        	'tel'			=> $model->getTel(),
        	'email'			=> $model->getEmail(),
        	'logo' 			=> $model->getLogo(),
        	'countryCode' 	=> $model->getCountryCode(),
        	'score' 		=> $model->getScore(),
        	'win' 			=> $model->getWin(),
        	'lose' 			=> $model->getLose(),
        	'isAdmin' 		=> $model->getIsAdmin()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['teamId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('teamId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Team $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->teamId)
        	  ->setName($row->name)
		      ->setShortName($row->shortName)
		      ->setPassword($row->password)
		      ->setMember($row->member)
		      ->setTel($row->tel)
		      ->setEmail($row->email)
		      ->setLogo($row->logo)
		      ->setCountryCode($row->countryCode)
		      ->setScore($row->score)
		      ->setWin($row->win)
		      ->setLose($row->lose)
		      ->setIsAdmin($row->isAdmin);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Team();
            $entry->setId($row->teamId)
	        	  ->setName($row->name)
			      ->setShortName($row->shortName)
			      ->setPassword($row->password)
			      ->setMember($row->member)
			      ->setTel($row->tel)
			      ->setEmail($row->email)
			      ->setLogo($row->logo)
			      ->setCountryCode($row->countryCode)
			      ->setScore($row->score)
			      ->setWin($row->win)
			      ->setLose($row->lose)
			      ->setIsAdmin($row->isAdmin);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    
    
	//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
	public function findByShortName($shortName)
	{
		$select = $this->getDbTable()->select()->where('shortName = ?', $shortName);
		$row = $this->getDbTable()->fetchRow($select);
		if (0 == count($row)) {
			return null;
		}
		$team = new Application_Model_Team();
		if (!empty($row)) {
			$team->setId($row->teamId)
			->setName($row->name)
			->setShortName($row->shortName)
			->setPassword($row->password)
			->setMember($row->member)
			->setTel($row->tel)
			->setEmail($row->email)
			->setLogo($row->logo)
			->setCountryCode($row->countryCode)
			->setScore($row->score)
			->setWin($row->win)
			->setLose($row->lose)
			->setIsAdmin($row->isAdmin);
		}
		return $team;
	
	}
	public function findByEmail($email)
	{
		$select = $this->getDbTable()->select()->where('email = ?', $email);
		$row = $this->getDbTable()->fetchRow($select);
		if (0 == count($row)) {
			return false;
		}
		else{
			return true;
		}
	
	}
	public function editUserTeam(Application_Model_Team $model)
	{
		$data = array(
				'name'   => $model->getName(),
				'shortName'   => $model->getShortName(),
				'password'   => $model->getPassword(),
				'member'   => $model->getMember(),
				'tel'   => $model->getTel(),
				'email'   => $model->getEmail(),
				'logo'   => $model->getLogo(),
				'countryCode'   => $model->getCountryCode()
		);
	
		if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
			unset($data['teamId']);
			$this->getDbTable()->insert($data);
		} else {
			$this->getDbTable()->update($data, array('teamId = ?' => $id));
		}
	}
	public function editScore($teamWinId, $teamLoseId){
		$teamWin = $this->getDbTable()->find($teamWinId);
		$teamLose = $this->getDbTable()->find($teamLoseId);
		
		$rowTeamWin = $teamWin->current();
		$win = $rowTeamWin->win;
		$win++;
		
		$rowTeamLose = $teamLose->current();
		$lose = $rowTeamLose->lose;
		$lose++;
		
		$scoreTeamWin = (int)$rowTeamWin->score;
		$scoreTeamLose = (int)$rowTeamLose->score;
		
		$score = Eaglet_Utils_CalculateScore::getResultScore($scoreTeamWin, $scoreTeamLose);
		
		$this->getDbTable()->update(array('win' => $win, 'score' => $score['scoreTeamWin']), array('teamId = ?' => $teamWinId));
		$this->getDbTable()->update(array('lose' => $lose, 'score' => $score['scoreTeamLose']), array('teamId = ?' => $teamLoseId));
		
		$statTourMapper = new Application_Model_StattourMapper();
		$statTourMapper->editScore($teamWinId, $teamLoseId);
	}
	
	public function cancelScore($teamWinId, $teamLoseId){
		$teamWin = $this->getDbTable()->find($teamWinId);
		$teamLose = $this->getDbTable()->find($teamLoseId);
		
		$rowTeamWin = $teamWin->current();
		$win = $rowTeamWin->win;
		$win--;
		
		$rowTeamLose = $teamLose->current();
		$lose = $rowTeamLose->lose;
		$lose--;
		
		$scoreTeamWin = (int)$rowTeamWin->score;
		$scoreTeamLose = (int)$rowTeamLose->score;
		
		$score = Eaglet_Utils_CalculateScore::getResultScore($scoreTeamWin, $scoreTeamLose, true);
		
		$this->getDbTable()->update(array('win' => $win, 'score' => $score['scoreTeamWin']), array('teamId = ?' => $teamWinId));
		$this->getDbTable()->update(array('lose' => $lose, 'score' => $score['scoreTeamLose']), array('teamId = ?' => $teamLoseId));
		
		$statTourMapper = new Application_Model_StattourMapper();
		$statTourMapper->editScore($teamWinId, $teamLoseId, true);
	}
	
	public function resetPassword($teamId){
		$this->getDbTable()->update(array('password' => 'RYphr8fCwGCqKig2VmRvDSvEzpwmsLkfqVX3HWWJE8s'), array('teamId = ?' => $teamId));
	}
    
    public function findTeamInTournament($tournamentId)
    {
        $select = $this->getDbTable()->select()
					->from(array('t' => 'team'), 't.*')
				    ->join(array('rt' => 'relatetourteam'), 't.teamId = rt.teamId', null)
                    ->where('rt.tournamentId = ?', $tournamentId)
                    ->setIntegrityCheck(false);
        $resultSet = $this->getDbTable()->fetchAll($select);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Team();
            $entry->setId($row->teamId)
	        	  ->setName($row->name)
			      ->setShortName($row->shortName)
			      ->setPassword($row->password)
			      ->setMember($row->member)
			      ->setTel($row->tel)
			      ->setEmail($row->email)
			      ->setLogo($row->logo)
			      ->setCountryCode($row->countryCode)
			      ->setScore($row->score)
			      ->setWin($row->win)
			      ->setLose($row->lose)
			      ->setIsAdmin($row->isAdmin);
            $entries[] = $entry;
        }
        return $entries;
    }
    public function findRanking($where = null, $orderBy = null, $limit = null, $pageNumber = null, $pageRange = null, $tagId = null){
    	$query = $this->getDbTable()->select()
    		->from(array('t' => 'team'),array('*'))
    		->order($orderBy)
    		->setIntegrityCheck(false)
    		->where($where);
    	
    	$paginator = Zend_Paginator::factory($query);
    	$paginator->setCurrentPageNumber($pageNumber)
    	->setItemCountPerPage($limit)
    	->setDefaultPageRange($pageRange);
    	return $paginator;
    }
}

