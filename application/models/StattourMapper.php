<?php

class Application_Model_StattourMapper
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
            $this->setDbTable('Application_Model_DbTable_Stattour');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
        $this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Stattour $model)
    {
        $data = array(
	        'team1Id'  	=> $model->getTeam1Id(),
        	'team2Id' 	=> $model->getTeam2Id(),
        	'win'		=> $model->getWin(),
        	'lose'		=> $model->getLose()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['teamId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('statTourId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Stattour $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->statTourId)
        	  ->setTeam1Id($row->team1Id)
		      ->setTeam2Id($row->team2Id)
		      ->setWin($row->win)
		      ->setLose($row->lose);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Stattour();
            $entry->setId($row->statTourId)
	        	  ->setTeam1Id($row->team1Id)
			      ->setTeam2Id($row->team2Id)
			      ->setWin($row->win)
		      	  ->setLose($row->lose);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    
    
	//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
	public function findByTeam1Id($team1Id){
		$query = $this->getDbTable()->select()
		->from(array('s' => 'stattour'),array('*'))
		->join(array('t' => 'team'),'s.team2Id = t.teamId',array('t.score', 't.shortName', 't.countryCode'))
		->order('t.score DESC')
		->setIntegrityCheck(false)
		->where('team1Id = ?', $team1Id);
		//echo $query->__toString();exit;
		$resultRows = $this->getDbTable()->fetchAll($query);
		return $resultRows;
	}
	
	public function findByTeamId($team1Id, $team2Id){
		$model = null;
		$select = $this->getDbTable()->select()->where('team1Id = ?', $team1Id)->where('team2Id = ?', $team2Id);
		$row = $this->getDbTable()->fetchRow($select);
		if (count($row) > 0) {
			$model = new Application_Model_Stattour($row->toArray());
		}
		return $model;
	}
	
	public function editScore($teamWinId, $teamLoseId, $isCancel = false){
		$teamWin = $this->findByTeamId($teamWinId, $teamLoseId);
		$teamLose = $this->findByTeamId($teamLoseId, $teamWinId);
		if (0 == count($teamWin)) {
			//insert win
			$data['team1Id'] = $teamWinId;
			$data['team2Id'] = $teamLoseId;
			$data['win'] = 1;
			$data['lose'] = 0;
			$this->getDbTable()->insert($data);
		}
		else{
			//update win
			$win = $teamWin->win;
			if(!$isCancel)
				$win++;
			else
				$win--;
			$this->getDbTable()->update(array('win' => $win), array('team1Id = ?' => $teamWinId, 'team2Id = ?' =>$teamLoseId));
		}
		if (0 == count($teamLose)) {
			//insert lose
			$data['team1Id'] = $teamLoseId;
			$data['team2Id'] = $teamWinId;
			$data['win'] = 0;
			$data['lose'] = 1;
			$this->getDbTable()->insert($data);
		}
		else{
			//update lose
			$lose = $teamLose->lose;
			if(!$isCancel)
				$lose++;
			else
				$lose--;
			$this->getDbTable()->update(array('lose' => $lose), array('team1Id = ?' => $teamLoseId, 'team2Id = ?' =>$teamWinId));
		}
	}
}

