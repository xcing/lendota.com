<?php

class Application_Model_MatchMapper
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
            $this->setDbTable('Application_Model_DbTable_Match');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Match &$model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getMatchId()) || '' == ($id = $model->getMatchId())) {
            unset($data['matchId']);
            $pk = $this->getDbTable()->insert($data);
            $model->setMatchId($pk);
        } else {
            $this->getDbTable()->update($data, array('matchId = ?' => $id));
        }
    }
    
    public function saveAll(&$models)
    {
        foreach ($models as $model) {
            $this->save($model);
        }
    }
 
    public function find($id)
    {
        $match = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $match = new Application_Model_Match($row->toArray());
        }
        return $match;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Match($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function editResult($matchId = null, $result = null, $isFinalRound = false)
    {
    	$this->getDbTable()->update(array('result' => $result), array('matchId = ?' => $matchId));
    	
    	$resultFind = $this->getDbTable()->find($matchId);
    	if (0 == count($resultFind)) {
    		return;
    	}
    	$row = $resultFind->current();
    	
    	if($row->ordinal % 2 != 0){
    		$field = 'team1Id';
    	}
    	else{
    		$field = 'team2Id';
    	}
    	if($result == 1){
    		$teamWinId = $row->team1Id;
    		$teamLoseId = $row->team2Id;
    	}
    	else{
    		$teamWinId = $row->team2Id;
    		$teamLoseId = $row->team1Id;
    	}
    	$this->getDbTable()->update(array($field => $teamWinId), array('matchId = ?' => $row->parentId));
    	
    	if($isFinalRound){
    		$tournamentMapper = new Application_Model_TournamentMapper();
    		$tournamentMapper->editResult($row->tournamentId, $teamWinId, $teamLoseId);
    		
    		$tournamentMapper->editActive($row->tournamentId, 3);
    	}
    }
    
    public function bothLoseBye($matchId = null)
    {
    	$this->getDbTable()->update(array('result' => 0), array('matchId = ?' => $matchId));
    	
    	$resultFind = $this->getDbTable()->find($matchId);
    	if (0 == count($resultFind)) {
    		return;
    	}
    	$row = $resultFind->current();
    	$ordinal = $row->ordinal;
    	
    	if($row->ordinal % 2 != 0){
    		$result = '2';
    	}
    	else{
    		$result = '1';
    	}
    	$this->getDbTable()->update(array('result' => $result), array('matchId = ?' => $row->parentId));
    	$data = array($result, $row->parentId);
    	
    	// move team auto win to next match
    	$resultFind = $this->getDbTable()->find($row->parentId);
    	if (0 == count($resultFind)) {
    		return;
    	}
    	$row = $resultFind->current();
    	
    	if($row->ordinal % 2 != 0){
    		$field = 'team1Id';
    	}
    	else{
    		$field = 'team2Id';
    	}
    	if($ordinal % 2 != 0){
    		$teamAutoWin = $row->team2Id;
    	}
    	else{
    		$teamAutoWin = $row->team1Id;
    	}
    	$this->getDbTable()->update(array($field => $teamAutoWin), array('matchId = ?' => $row->parentId));
    	// end move
    	
    	return $data;
    }
    
    public function cancelResult($matchId = null, $parentId, $ordinal)
    {
    	$this->getDbTable()->update(array('result' => null), array('matchId = ?' => $matchId));
    	if($ordinal % 2 != 0){
    		$field = 'team1Id';
    	}
    	else{
    		$field = 'team2Id';
    	}
    	$this->getDbTable()->update(array($field => 0), array('matchId = ?' => $parentId));
    }
    
    public function findMatchesInTournament($tournamentId)
    {
        $matches = array();
        $query = $this->getDbTable()
                      ->select()
                      ->from('match', 'match.*')
                      ->joinLeft('matchresult',
                                 'matchresult.matchId = match.matchId',
                                 array('matchresult.matchResultId', 
                                     'matchresult.result', 
                                     'matchresult.screenshot', 
                                     'matchresult.game'))
                      ->where('match.tournamentId = ?', $tournamentId)
                      ->order(array('round', 'ordinal'))
                      ->setIntegrityCheck(false);

        $resultSet = $this->getDbTable()->fetchAll($query);
        if ($resultSet->count() > 0) {
            $matchResults = array();
            $previousMatchId = 0;
            foreach ($resultSet as $row) {
                $match = new Application_Model_Match($row->toArray());
                if ($previousMatchId == $match->getMatchId()) {
                    $match = array_pop($matches);
                } else {
                    $matchResults = array();
                    $previousMatchId = $match->getMatchId();
                }
                $matchResult = new Application_Model_MatchResult($row->toArray());
                if ($matchResult->getMatchResultId()) {
                    $matchResults[] = $matchResult;
                    $match->setMatchResults($matchResults);
                }
                $matches[] = $match;
            }
        }
        return $matches;
    }
}

