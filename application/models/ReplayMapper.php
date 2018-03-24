<?php

class Application_Model_ReplayMapper
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
            $this->setDbTable('Application_Model_DbTable_Replay');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Replay &$model)
    {
        $data = array(
        	'replayId'			=> $model->getId(),
        	'replayFileName'   	=> $model->getReplayFileName(),
        	'sentinelTeamName'	=> $model->getSentinelTeamName(),
        	'scourgeTeamName'	=> $model->getScourgeTeamName(),
        	'matchContest'   	=> $model->getMatchContest(),
        	'rate'   			=> $model->getRate(),
        	'uploadedDate'   	=> $model->getUploadedDate(),
        	'totalView'			=> $model->getTotalView(),
        	'totalDownload'		=> $model->getTotalDownload(),
        	'totalComment'		=> $model->getTotalComment()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['replayId']);
            $id = $this->getDbTable()->insert($data);
            $model->setId($id);
        } else {
            $this->getDbTable()->update($data, array('replayId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Replay $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->replayId)
             ->setReplayFileName($row->replayFileName)
             ->setSentinelTeamName($row->sentinelTeamName)
             ->setScourgeTeamName($row->scourgeTeamName)
             ->setTeamNames($row->teamNames)
             ->setMatchContest($row->matchContest)
             ->setRate($row->rate)
             ->setUploadedDate($row->uploadedDate)
             ->setTotalView($row->totalView)
             ->setTotalDownload($row->totalDownload)
             ->setTotalComment($row->totalComment);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Replay();
            $entry->setId($row->replayId)
	             ->setReplayFileName($row->replayFileName)
	             ->setSentinelTeamName($row->sentinelTeamName)
            	 ->setScourgeTeamName($row->scourgeTeamName)
	             ->setMatchContest($row->matchContest)
	             ->setRate($row->rate)
	             ->setUploadedDate($row->uploadedDate)
	             ->setTotalView($row->totalView)
	             ->setTotalDownload($row->totalDownload)
	             ->setTotalComment($row->totalComment);
            $entries[] = $entry;
        }
        return $entries;
    }
    
	public function findReplayList($criterias = null, $orderBy = null, $limit = null, $pageNumber = null, $pageRange = null){
		$query = $this->getDbTable()->select()->distinct()
					->from(array('r' => 'replay'), 'r.*')
				    ->join(array('rh' => 'relatereplayhero'), 'r.replayId = rh.replayId', null);
		$countReplayQuery = $this->getDbTable()->select()
								 ->from(array('r' => 'replay'), 
										array(Zend_Paginator_Adapter_DbSelect::ROW_COUNT_COLUMN 
													=> new Zend_Db_Expr('COUNT(DISTINCT r.replayId)')))
								 ->join(array('rh' => 'relatereplayhero'), 
								 				'r.replayId = rh.replayId', null)
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
    	$select = $this->getDbTable()->select()->from('replay',array('matchContest', 'sentinelTeamName', 'scourgeTeamName'))->where('replayId = ?', $replayId);
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
	public function findBy($field, $value, $queryColumns)
    {
    	$select = $this->getDbTable()->select()->from('replay', $queryColumns)->where($field.' = ?', $value);
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	$replayes = array();
    	foreach ($resultSet as $row) {
    		$replay = new Application_Model_Replay();
    		$replay->setId(isset($row->replayId) ? $row->replayId : null)
	             ->setReplayFileName(isset($row->replayFileName) ? $row->replayFileName : null)
	             ->setSentinelTeamName(isset($row->sentinelTeamName) ? $row->sentinelTeamName : null)
            	 ->setScourgeTeamName(isset($row->scourgeTeamName) ? $row->scourgeTeamName : null)
	             ->setMatchContest(isset($row->matchContest) ? $row->matchContest : null)
	             ->setRate(isset($row->rate) ? $row->rate : null)
	             ->setUploadedDate(isset($row->uploadedDate) ? $row->uploadedDate : null)
	             ->setTotalView(isset($row->totalView) ? $row->totalView : null)
	             ->setTotalDownload(isset($row->totalDownload) ? $row->totalDownload : null)
	             ->setTotalComment(isset($row->totalComment) ? $row->totalComment : null);
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
        
        $this->getDbTable()->update(array($field => $number), array('replayId = ?' => $id));
	}
	
	public function deleteReplay($replayFileName)
	{
		$replay = $this->findUniqueBy('replayFileName', $replayFileName, array('replayId'));
		
		$this->getDbTable()->delete(array('replayId = ?' => $replay->getId()));
		
		$relateReplayHeroMapper = new Application_Model_RelateReplayHeroMapper();
    	$relateReplayHeroMapper->delete($replay->getId());
	}
	
	public function resultSetToModel($resultSet)
	{
	    $replayes = array();
    	foreach ($resultSet as $row) {
    		$replay = new Application_Model_Replay();
    		$replay->setId(isset($row->replayId) ? $row->replayId : null)
	             ->setReplayFileName(isset($row->replayFileName) ? $row->replayFileName : null)
	             ->setSentinelTeamName(isset($row->sentinelTeamName) ? $row->sentinelTeamName : null)
            	 ->setScourgeTeamName(isset($row->scourgeTeamName) ? $row->scourgeTeamName : null)
	             ->setMatchContest(isset($row->matchContest) ? $row->matchContest : null)
	             ->setRate(isset($row->rate) ? $row->rate : null)
	             ->setUploadedDate(isset($row->uploadedDate) ? $row->uploadedDate : null)
	             ->setTotalView(isset($row->totalView) ? $row->totalView : null)
	             ->setTotalDownload(isset($row->totalDownload) ? $row->totalDownload : null)
	             ->setTotalComment(isset($row->totalComment) ? $row->totalComment : null);
			$replayes[] = $replay;
    	}
    	return $replayes;
	}
	
	public function getTopDownloadLastMonth($replayLimit)
	{
        $query = $this->getDbTable()
                      ->select()
                      ->from('replay', array('replayId', 'matchContest', 'sentinelTeamName', 'scourgeTeamName'))
                      ->where('MONTH(DATE_SUB(CURDATE(),INTERVAL 1 MONTH)) = MONTH(uploadedDate)')
                      ->where('YEAR(CURDATE()) + 543 = YEAR(uploadedDate)')
                      ->order('totalDownload DESC')
                      ->limit($replayLimit);
        $resultSet = $this->getDbTable()->fetchAll($query);
        return $this->resultSetToModel($resultSet);
	}
	
}