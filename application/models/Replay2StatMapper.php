<?php

class Application_Model_Replay2StatMapper
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
            $this->setDbTable('Application_Model_DbTable_Replay2Stat');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Replay2Stat $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getReplay2StatId()) || '' == ($id = $model->getReplay2StatId())) {
            unset($data['replay2statId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('replay2statId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Replay2Stat($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Replay2Stat($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

}

