<?php

class Application_Model_OrderMapper
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
            $this->setDbTable('Application_Model_DbTable_Order');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Order $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getOrderId()) || '' == ($id = $model->getOrderId())) {
            unset($data['orderId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('orderId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Order($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Order($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function findByUserId($userId)
    {
    	$select = $this->getDbTable()->select()->where('userId = ? AND status = 1', $userId);
    	$row = $this->getDbTable()->fetchRow($select);
    	
    	if (!empty($row)) {
    		return $row->orderId;
    	}
    	else{
    		return 0;
    	}
    }
    public function getLastOrderById($userId)
    {
    	$select = $this->getDbTable()->select()
    	->from(array('o' => 'order'), array(new Zend_Db_Expr('max(orderId)')))
    	->where('userId = '.$userId);
    	$results = $this->getDbTable()->fetchAll($select);
    	if($results[0]['max(orderId)'] == ''){
    		return 0;
    	}
    	else{
    		return $results[0]['max(orderId)'];
    	}
    }
    public function checkout($orderId, $totalPrice, $totalPriceTruemoney)
    {
    	$this->getDbTable()->update(array('status' => 2, 'orderDate' => date('Y-m-d'), 'totalPrice' => $totalPrice, 'totalPriceTruemoney' => $totalPriceTruemoney), array('orderId = ?' => $orderId));
    }
    public function changeStatus($orderId, $status)
    {
    	$this->getDbTable()->update(array('status' => $status), array('orderId = ?' => $orderId));
    }
    public function findOrderUser($where, $orderBy){
    	$query = $this->getDbTable()->select()
    	->from(array('o' => 'order'),array('*'))
    	->join(array('u' => 'user'),'o.userId = u.userId',array('u.steamName'))
    	->where($where)
    	->order($orderBy)
    	->setIntegrityCheck(false);
    
    	$resultRows = $this->getDbTable()->fetchAll($query);
    	if(count($resultRows) == 0){
    		return 0;
    	}
    	else{
    		return $resultRows;
    	}
    }
    public function findNotiByUserId($userId)
    {
    	$select = $this->getDbTable()->select()->where('userId = ? AND status = 2', $userId);
    	$row = $this->getDbTable()->fetchAll($select);
    
    	return count($row);
    }
    public function findNotiByStatus($status)
    {
    	$select = $this->getDbTable()->select()->where('status = ?', $status);
    	$row = $this->getDbTable()->fetchAll($select);
    
    	return count($row);
    }
}

