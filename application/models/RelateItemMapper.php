<?php

class Application_Model_RelateItemMapper
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
            $this->setDbTable('Application_Model_DbTable_RelateItem');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_RelateItem $model)
    {
        $data = array(
        	'itemId'   => $model->getItemId(),
        	'materialId'   => $model->getMaterialId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['relateItemId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('relateItemId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_RelateItem $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->relateItemId)
             ->setItemId($row->itemId)
             ->setMaterialId($row->materialId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_RelateItem();
            $entry->setId($row->relateItemId)
	             ->setItemId($row->itemId)
	             ->setMaterialId($row->materialId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('relateItemId = ?' => $id));
    }

}

