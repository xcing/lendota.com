<?php

class Application_Model_Replay2Mapper
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
            $this->setDbTable('Application_Model_DbTable_Replay2');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Replay2 &$model)
    {
        $data = array(
        	'replay2Id'			=> $model->getId(),
        	'team1'				=> $model->getTeam1(),
        	'team2'				=> $model->getTeam2(),
        	'matchContest'   	=> $model->getMatchContest(),
        	'rate'   			=> $model->getRate(),
        	'win'   			=> $model->getWin(),
        	'uploadedDate'   	=> $model->getUploadedDate(),
        	'totalView'			=> $model->getTotalView(),
        	'totalComment'		=> $model->getTotalComment(),
        	'chosenTeam1'		=> $model->getChosenTeam1(),
        	'chosenTeam2'		=> $model->getChosenTeam2(),
        	'banTeam1'			=> $model->getBanTeam1(),
        	'banTeam2'			=> $model->getBanTeam2(),
        	'laneTeam1'			=> $model->getLaneTeam1(),
        	'laneTeam2'			=> $model->getLaneTeam2(),
        	'firstPick'			=> $model->getFirstPick(),
        	'link'				=> $model->getLink(),
        	'replayMatchId'		=> $model->getReplayMatchId()
        );
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['replay2Id']);
            $id = $this->getDbTable()->insert($data);
            $model->setId($id);
        } else {
            $this->getDbTable()->update($data, array('replay2Id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Replay2 $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->replay2Id)
             ->setTeam1($row->team1)
             ->setTeam2($row->team2)
             ->setMatchContest($row->matchContest)
             ->setRate($row->rate)
             ->setWin($row->win)
             ->setUploadedDate($row->uploadedDate)
             ->setTotalView($row->totalView)
             ->setTotalComment($row->totalComment)
       		 ->setChosenTeam1($row->chosenTeam1)
       		 ->setChosenTeam2($row->chosenTeam2)
       		 ->setBanTeam1($row->banTeam1)
       		 ->setBanTeam2($row->banTeam2)
             ->setLaneTeam1($row->laneTeam1)
             ->setLaneTeam2($row->laneTeam2)
       		 ->setFirstPick($row->firstPick)
       		 ->setLink($row->link)
        	 ->setReplayMatchId($row->replayMatchId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Replay2();
            $entry->setId($row->replay2Id)
	             ->setTeam1($row->team1)
	             ->setTeam2($row->team2)
	             ->setMatchContest($row->matchContest)
	             ->setRate($row->rate)
	             ->setWin($row->win)
	             ->setUploadedDate($row->uploadedDate)
	             ->setTotalView($row->totalView)
	             ->setTotalComment($row->totalComment)
	       		 ->setChosenTeam1($row->chosenTeam1)
	       		 ->setChosenTeam2($row->chosenTeam2)
	       		 ->setBanTeam1($row->banTeam1)
	       		 ->setBanTeam2($row->banTeam2)
                 ->setLaneTeam1($row->laneTeam1)
                 ->setLaneTeam2($row->laneTeam2)
	       		 ->setFirstPick($row->firstPick)
	       		 ->setLink($row->link)
            	 ->setReplayMatchId($row->replayMatchId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
	public function findReplayList($criterias = null, $orderBy = null, $limit = null, $pageNumber = null, $pageRange = null){
		$query = $this->getDbTable()->select()->distinct()
					->from(array('r' => 'replay2'), 'r.*')
				    ->join(array('rh' => 'relatereplayhero2'), 'r.replay2Id = rh.replay2Id', null);
		$countReplayQuery = $this->getDbTable()->select()
								 ->from(array('r' => 'replay2'), 
										array(Zend_Paginator_Adapter_DbSelect::ROW_COUNT_COLUMN 
													=> new Zend_Db_Expr('COUNT(DISTINCT r.replay2Id)')))
								 ->join(array('rh' => 'relatereplayhero2'), 
								 				'r.replay2Id = rh.replay2Id', null)
								 ->setIntegrityCheck(false);
	    foreach ($criterias as $cond=>$value) {
	    	$query->where($cond, $value);
	    	$countReplayQuery->where($cond, $value);
	    }
	    $query = $query->order($orderBy)
				    	->setIntegrityCheck(false);
		$adapter = new Zend_Paginator_Adapter_DbSelect($query);
		$adapter->setRowCount($countReplayQuery);
		$replayPaginator = new Zend_Paginator($adapter);
		$replayPaginator->setCurrentPageNumber($pageNumber) 
					    ->setItemCountPerPage($limit)
					    ->setDefaultPageRange($pageRange);
		return $replayPaginator;
	}
	
	/**
     * 
     * Find by function.
     * @param unknown_type $field
     * @param unknown_type $value
     * @param unknown_type $queryColumns
     * @return Array of Application_Model_Replay
     */
	public function findReplayDetail($replayId)
    {
    	$select = $this->getDbTable()->select()->from('replay',array('matchContest', 'team1', 'team2'))->where('replay2Id = ?', $replayId);
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
	public function findBy($field, $value, $queryColumns)
    {
    	$select = $this->getDbTable()->select()->from('replay2', $queryColumns)->where($field.' = ?', $value);
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	$replayes = array();
    	foreach ($resultSet as $row) {
    		$replay = new Application_Model_Replay2();
    		$replay->setId(isset($row->replay2Id) ? $row->replay2Id : null)
	             ->setTeam1(isset($row->team1) ? $row->team1 : null)
            	 ->setTeam2(isset($row->team2) ? $row->team2 : null)
	             ->setMatchContest(isset($row->matchContest) ? $row->matchContest : null)
	             ->setRate(isset($row->rate) ? $row->rate : null)
	             ->setWin(isset($row->win) ? $row->win : null)
	             ->setUploadedDate(isset($row->uploadedDate) ? $row->uploadedDate : null)
	             ->setTotalView(isset($row->totalView) ? $row->totalView : null)
	             ->setTotalComment(isset($row->totalComment) ? $row->totalComment : null)
	    		 ->setChosenTeam1(isset($row->chosenTeam1) ? $row->chosenTeam1 : null)
	    		 ->setChosenTeam2(isset($row->chosenTeam2) ? $row->chosenTeam2 : null)
	    		 ->setBanTeam1(isset($row->banTeam1) ? $row->banTeam1 : null)
	    		 ->setBanTeam2(isset($row->banTeam2) ? $row->banTeam2 : null)
	    		 ->setLaneTeam1(isset($row->laneTeam1) ? $row->laneTeam1 : null)
	    		 ->setLaneTeam2(isset($row->laneTeam2) ? $row->laneTeam2 : null)
	    		 ->setFirstPick(isset($row->firstPick) ? $row->firstPick : null)
	    		 ->setLink(isset($row->link) ? $row->link : null)
    			 ->setReplayMatchId(isset($row->replayMatchId) ? $row->replayMatchId : null);
			$replayes[] = $replay;
    	}
    	return $replayes;
    }
    
    public function findUniqueBy($field, $value, $queryColumns)
    {
    	$replays = $this->findBy($field, $value, $queryColumns);
    	if (isset($replays[0])) {
    		return $replays[0];
    	} else {
    		throw new Exception();
    	}
    }
	public function plusplus($id, $field, $isMinus = false){  //for plus read and comment
		$result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $number = $row->$field;
        if($isMinus){
        	$number--;
        }
        else{
        	$number++;
        }
        
        $this->getDbTable()->update(array($field => $number), array('replay2Id = ?' => $id));
	}
	/*
	public function deleteReplay($replayFileName)
	{
		$replay = $this->findUniqueBy('replayFileName', $replayFileName, array('replay2Id'));
		
		$this->getDbTable()->delete(array('replay2Id = ?' => $replay->getId()));
		
		$relateReplayHeroMapper = new Application_Model_RelateReplayHeroMapper();
    	$relateReplayHeroMapper->delete($replay->getId());
	}
	*/
	public function resultSetToModel($resultSet)
	{
	    $replayes = array();
    	foreach ($resultSet as $row) {
    		$replay = new Application_Model_Replay();
    		$replay->setId(isset($row->replay2Id) ? $row->replay2Id : null)
	             ->setTeam1(isset($row->team1) ? $row->team1 : null)
            	 ->setTeam2(isset($row->team2) ? $row->team2 : null)
	             ->setMatchContest(isset($row->matchContest) ? $row->matchContest : null)
	             ->setRate(isset($row->rate) ? $row->rate : null)
	             ->setWin(isset($row->win) ? $row->win : null)
	             ->setUploadedDate(isset($row->uploadedDate) ? $row->uploadedDate : null)
	             ->setTotalView(isset($row->totalView) ? $row->totalView : null)
	             ->setTotalComment(isset($row->totalComment) ? $row->totalComment : null)
	    		 ->setChosenTeam1(isset($row->chosenTeam1) ? $row->chosenTeam1 : null)
	    		 ->setChosenTeam2(isset($row->chosenTeam2) ? $row->chosenTeam2 : null)
	    		 ->setBanTeam1(isset($row->banTeam1) ? $row->banTeam1 : null)
	    		 ->setBanTeam2(isset($row->banTeam2) ? $row->banTeam2 : null)
	    		 ->setFirstPick(isset($row->firstPick) ? $row->firstPick : null)
	    		 ->setLink(isset($row->link) ? $row->link : null)
    			 ->setReplayMatchId(isset($row->replayMatchId) ? $row->replayMatchId : null);
			$replayes[] = $replay;
    	}
    	return $replayes;
	}
	
	public function getTopDownloadLastMonth($replayLimit)
	{
        $query = $this->getDbTable()
                      ->select()
                      ->from('replay2', array('replay2Id', 'matchContest', 'team1', 'team2'))
                      ->where('MONTH(DATE_SUB(CURDATE(),INTERVAL 1 MONTH)) = MONTH(uploadedDate)')
                      ->order('totalView DESC')
                      ->limit($replayLimit);
        $resultSet = $this->getDbTable()->fetchAll($query);
        return $this->resultSetToModel($resultSet);
	}
	public function delete($id){
		$this->getDbTable()->delete(array('replay2Id = ?' => $id));
		
		$relateReplayHeroMapper = new Application_Model_RelateReplayHero2Mapper();
		$relateReplayHeroMapper->delete($id);
	}
	
}