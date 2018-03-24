<?php

class Application_Model_RelateReplayHero2Mapper
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
            $this->setDbTable('Application_Model_DbTable_RelateReplayHero2');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_RelateReplayHero2 $model)
    {
        $data = array(
        	'relateReplayHero2Id' => $model->getId(),
        	'replay2Id'   	 	 => $model->getReplay2Id(),
        	'heroId'   			 => $model->getHeroId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['relateReplayHero2Id']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('relateReplayHero2Id = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_RelateReplayHero2 $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->relateReplayHero2Id)
             ->setReplay2Id($row->replay2Id)
             ->setHeroId($row->heroId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_RelateReplayHero2();
            $entry->setId($row->relateReplayHero2Id)
	             ->setReplay2Id($row->replay2Id)
	             ->setHeroId($row->heroId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function delete($replayId)
    {
    	$this->getDbTable()->delete(array('replay2Id = ?' => $replayId));
    }
}