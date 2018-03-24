<?php

class Application_Model_EquipmentMapper
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
            $this->setDbTable('Application_Model_DbTable_Equipment');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Equipment $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getEquipmentId()) || '' == ($id = $model->getEquipmentId())) {
            unset($data['equipmentId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('equipmentId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Equipment($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Equipment($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function findEquipmentList($where = null, $orderBy = null, $limit = null, $pageNumber = null, $pageRange = null){
    	$query = $this->getDbTable()->select()
    	->from(array('e' => 'equipment'),array('*'))
    	->order($orderBy)
    	->setIntegrityCheck(false)
    	->where($where);
    		
    	$paginator = Zend_Paginator::factory($query);
    	$paginator->setCurrentPageNumber($pageNumber)
    	->setItemCountPerPage($limit)
    	->setDefaultPageRange($pageRange);
    	return $paginator;
    }
    public function findDetail($equipmentId){
    	$query = $this->getDbTable()->select()
    	->from(array('e' => 'equipment'),array('*'))
    	->where('e.equipmentId = ?', $equipmentId)
    	->setIntegrityCheck(false);
    
    	$result = $this->getDbTable()->fetchAll($query);
    	return $result;
    }
    public function update($data){
    	$this->getDbTable()->update($data, array('equipmentId = ?' => $data['equipmentId']));
    }
}

