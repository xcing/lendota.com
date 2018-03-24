<?php

class Application_Model_ItemMapper
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
            $this->setDbTable('Application_Model_DbTable_Item');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Item $model)
    {
        $data = array(
        	'name'   => $model->getName(),
        	'detail'   => $model->getDetail(),
        	'detailEN'   => $model->getDetailEN(),
        	'price'   => $model->getPrice(),
        	'picture'   => $model->getPicture(),
        	'picture2'   => $model->getPicture2(),
        	'bonus'   => $model->getBonus(),
        	'information' => $model->getInformation(),
        	'informationEN' => $model->getInformationEN()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['guideId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('guideId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Item $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->itemId)
             ->setName($row->name)
             ->setDetail($row->detail)
             ->setDetailEN($row->detailEN)
             ->setPrice($row->price)
             ->setPicture($row->picture)
             ->setPicture2($row->picture2)
             ->setBonus($row->bonus)
             ->setInformation($row->information)
             ->setInformationEN($row->informationEN);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Item();
            $entry->setId($row->itemId)
	             ->setName($row->name)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setPrice($row->price)
	             ->setPicture($row->picture)
	             ->setPicture2($row->picture2)
	             ->setBonus($row->bonus)
             	 ->setInformation($row->information)
             	 ->setInformationEN($row->informationEN);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function joinItemRecipe($itemId){
		$query = $this->getDbTable()->select();
		$query->from(array('i' => 'item'),array())                              
		      ->join(array('r' => 'relateitem'),'i.itemId = r.itemId',array('*'))
		      ->where('i.itemId = ?', $itemId)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;       
		
	}
	
	public function joinItemUsein($itemId){
		$query = $this->getDbTable()->select();
		$query->from(array('i' => 'item'),array())                              
		      ->join(array('r' => 'relateitem'),'i.itemId = r.materialId',array('*'))
		      ->where('i.itemId = ? and r.itemId != r.materialId', $itemId)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;       
		
	}
	public function findAllItem()
    {
    	$select = $this->getDbTable()->select()->from('item',array('name', 'picture', 'picture2'));
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
    
    public function delete($id){
    	$this->getDbTable()->delete(array('itemId = ?' => $id));
    }

}

