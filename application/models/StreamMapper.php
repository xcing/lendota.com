<?php

class Application_Model_StreamMapper
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
            $this->setDbTable('Application_Model_DbTable_Stream');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Stream $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getStreamId()) || '' == ($id = $model->getStreamId())) {
            unset($data['streamId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('streamId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Stream($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Stream($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function plusplus($streamId){
		$result = $this->getDbTable()->find($streamId);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $number = $row->click;
        $number++;
        $this->getDbTable()->update(array('click' => $number), array('streamId = ?' => $streamId));
        
        return $row->url;
	}
	public function update($data){
		$this->getDbTable()->update($data, array('streamId = ?' => $data['streamId']));
	}
}

