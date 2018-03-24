<?php

class Application_Model_DetailorderMapper
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
            $this->setDbTable('Application_Model_DbTable_Detailorder');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Detailorder $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getDetailorderId()) || '' == ($id = $model->getDetailorderId())) {
            unset($data['detailorderId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('detailorderId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Detailorder($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Detailorder($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function findOrder($orderId){
    	$query = $this->getDbTable()->select()
    	->from(array('d' => 'detailorder'),array('*'))
    	->join(array('e' => 'equipment'),'d.equipmentId = e.equipmentId',array('e.equipmentId', 'e.name', 'e.image', 'e.price', 'e.priceSale'))
    	->where('d.orderId = ?', $orderId)
    	->setIntegrityCheck(false);
    
    	$resultRows = $this->getDbTable()->fetchAll($query);
    	if(count($resultRows) == 0){
    		return 0;
    	}
    	else{
    		return $resultRows;
    	}
    }
    public function delete($id){
    	$this->getDbTable()->delete(array('detailorderId = ?' => $id));
    }
    public function findAlreadyEquipment($orderId, $equipmentId)
    {
    	$select = $this->getDbTable()->select()->where('orderId = ?', $orderId, $equipmentId)
    											->where('equipmentId = ?', $equipmentId);
    	$row = $this->getDbTable()->fetchRow($select);
    	if (!empty($row)) {
    		return $row;
    	}
    	else{
    		return 0;
    	}
    }
    public function update($data){
    	$this->getDbTable()->update($data, array('detailorderId = ?' => $data['detailorderId']));
    }
    public function findNotiByOrderId($orderId)
    {
    	$select = $this->getDbTable()->select()->where('orderId = ?', $orderId);
    	$row = $this->getDbTable()->fetchAll($select);
    
    	return count($row);
    }
}

