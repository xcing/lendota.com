<?php

class Application_Model_RelateReplayHeroMapper
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
            $this->setDbTable('Application_Model_DbTable_RelateReplayHero');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_RelateReplayHero $model)
    {
        $data = array(
        	'relateReplayHeroId' => $model->getId(),
        	'replayId'   	 	 => $model->getReplayId(),
        	'heroId'   			 => $model->getHeroId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['relateReplayHeroId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('relateReplayHeroId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_RelateReplayHero $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->relateReplayHeroId)
             ->setReplayId($row->replayId)
             ->setHeroId($row->heroId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_RelateReplayHero();
            $entry->setId($row->relateReplayHeroId)
	             ->setReplayId($row->replayId)
	             ->setHeroId($row->heroId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function delete($replayId)
    {
    	$this->getDbTable()->delete(array('replayId = ?' => $replayId));
    }
}