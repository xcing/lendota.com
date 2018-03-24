<?php

class Application_Model_MatchResultMapper
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
            $this->setDbTable('Application_Model_DbTable_MatchResult');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_MatchResult $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['matchResultId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('matchResultId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_MatchResult($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_MatchResult($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function checkResult($matchId = null, $amount = 1)
    {
    	$select = $this->getDbTable()->select();
    	$select->from($this->getDbTable(), array('count(*) as result'));
    	$select->where('matchId = '.$matchId.' and result = 1');
    	$result1 = $this->getDbTable()->fetchAll($select);
    
    	$select = $this->getDbTable()->select();
    	$select->from($this->getDbTable(), array('count(*) as result'));
    	$select->where('matchId = '.$matchId.' and result = 2');
    	$result2 = $this->getDbTable()->fetchAll($select);
    
    	$amoutForWin = (floor($amount/2))+1;
    	if((int)$result1[0]->result >= $amoutForWin){
    		return 1;
    	}
    	else if((int)$result2[0]->result >= $amoutForWin){
    		return 2;
    	}
    	else{
    		return null;
    	}
    }
    public function addlinkreplay($matchResultId, $link)
    {
    	$this->getDbTable()->update(array('replay' => $link), array('matchResultId = ?' => $matchResultId));
    }
    public function editScreenshot($matchResultId, $link)
    {
    	$this->getDbTable()->update(array('screenshot' => $link), array('matchResultId = ?' => $matchResultId));
    }
    public function deleteByMatchId($matchId){
    	$this->getDbTable()->delete(array('matchId = ?' => $matchId));
    }
}

