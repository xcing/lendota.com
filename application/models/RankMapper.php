<?php

class Application_Model_RankMapper
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
            $this->setDbTable('Application_Model_DbTable_Rank');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Rank $model)
    {
        $data = array(
        	'rankName'   => $model->getRankName(),
        	'admin'   => $model->getAdmin()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['rankId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('rankId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Rank $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->rankId)
             ->setRankName($row->rankName)
             ->setAdmin($row->admin);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Rank();
            $entry->setId($row->rankId)
	             ->setRankName($row->rankName)
	             ->setAdmin($row->admin);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('rankId = ?' => $id));
    }

}

