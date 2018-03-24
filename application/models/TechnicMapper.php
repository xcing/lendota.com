<?php

class Application_Model_TechnicMapper
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
            $this->setDbTable('Application_Model_DbTable_Technic');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
        $this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Technic $model)
    {
        $data = array(
	        'topic'   => $model->getTopic(),
        	'topicEN'   => $model->getTopicEN(),
	        'detail'   => $model->getDetail(),
        	'detailEN'   => $model->getDetailEN(),
        	'icon'   => $model->getIcon(),
	        'ordinal'   => $model->getOrdinal(),
	        'active'   => $model->getActive()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['technicId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('technicId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Technic $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->technicId)
             ->setTopic($row->topic)
             ->setTopicEN($row->topicEN)
             ->setDetail($row->detail)
             ->setDetailEN($row->detailEN)
             ->setIcon($row->icon)
             ->setOrdinal($row->ordinal)
             ->setActive($row->active);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Technic();
            $entry->setId($row->technicId)
	             ->setTopic($row->topic)
	             ->setTopicEN($row->topicEN)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setIcon($row->icon)
	             ->setOrdinal($row->ordinal)
	             ->setActive($row->active);
            $entries[] = $entry;
        }
        return $entries;
    }
	///////////////////////////////////////////////////// modify method ////////////////////////////////////
	public function findBy($field, $value)
    {
    	$select = $this->getDbTable()->select()->where($field.' = ?', $value);
    	$row = $this->getDbTable()->fetchRow($select);
    	$model = new Application_Model_Technic();
    	if (!empty($row)) {
	    	$model->setId($row->technicId)
	             ->setTopic($row->topic)
	             ->setTopicEN($row->topicEN)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setIcon($row->icon)
	             ->setOrdinal($row->ordinal)
	             ->setActive($row->active);
    	}
    	return $model;
    	 
    }
	public function editNews($id, $topic, $topicEN, $icon, $detail, $detailEN){
		$this->getDbTable()->update(array('topic' => $topic, 'topicEN' => $topicEN, 'icon' => $icon, 'detail' => $detail, 'detailEN' => $detailEN), array('technicId = ?' => $id));
	}
	public function delete($id){
    	$this->getDbTable()->delete(array('technicId = ?' => $id));
    }
	public function moveOrdinal($id, $moveId){
    	$result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();

    	$result2 = $this->getDbTable()->find($moveId);
        if (0 == count($result2)) {
            return;
        }
        $row2 = $result2->current();
        
        $this->getDbTable()->update(array('ordinal' => $row2->ordinal), array('technicId = ?' => $id));
    	$this->getDbTable()->update(array('ordinal' => $row->ordinal), array('technicId = ?' => $moveId));
    }
	public function onlineTechnic($id){
    	$this->getDbTable()->update(array('active' => 1), array('technicId = ?' => $id));
    }
	public function offineTechnic($id){
    	$this->getDbTable()->update(array('active' => 0), array('technicId = ?' => $id));
    }
    public function maxOrdinal(){
    	$query = $this->getDbTable()->select();
        $query->from('technic', array(new Zend_Db_Expr('MAX(ordinal) AS maxordinal')))
        	    ->setIntegrityCheck(false);
        $resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows[0]['maxordinal']+1;  
    }
}

