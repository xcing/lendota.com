<?php

class Application_Model_MapMapper
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
            $this->setDbTable('Application_Model_DbTable_Map');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Map $model)
    {
        $data = array(
        	'mapName'   => $model->getMapName()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['mapId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('mapId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Map $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->mapId)
             ->setMapName($row->mapName);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Map();
            $entry->setId($row->mapId)
             	->setMapName($row->mapName);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('mapId = ?' => $id));
    }

}

