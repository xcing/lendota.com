<?php

class Application_Model_UserMapper
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
            $this->setDbTable('Application_Model_DbTable_User');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
        $this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_User $model)
    {
    	$data = Eaglet_Utils_Object::toArray($model);
    	if (null === ($id = $model->getUserId()) || '' == ($id = $model->getUserId())) {
    		unset($data['userId']);
    		$this->getDbTable()->insert($data);
    	} else {
    		$this->getDbTable()->update($data, array('userId = ?' => $id));
    	}
    }
 
    public function find($id)
    {
    	$model = null;
    	$result = $this->getDbTable()->find($id);
    	if (count($result) > 0) {
    		$row = $result->current();
    		$model = new Application_Model_User($row->toArray());
    	}
    	return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
    	$resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
    	$entries   = array();
    	foreach ($resultSet as $row) {
    		$entry = new Application_Model_User($row->toArray());
    		$entries[] = $entry;
    	}
    	return $entries;
    }
    
    
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function findBy($field, $value)
    {
    	$select = $this->getDbTable()->select()->where($field.' = ?', $value);
    	$row = $this->getDbTable()->fetchRow($select);
    	$user = new Application_Model_User();
    	if (!empty($row)) {
	    	$user->setUserId($row->userId)
		             ->setPassword($row->password)
		             ->setEmail($row->email)
		             ->setSteamName($row->steamName)
		             ->setRankId($row->rankId);
    	}
    	return $user;
    	 
    }
    
	public function findByEmail($email)
    {
    	$select = $this->getDbTable()->select()->where('email = ?', $email);
    	$row = $this->getDbTable()->fetchRow($select);
    	$user = new Application_Model_User();
    	if (!empty($row)) {
	    	$user->setUserId($row->userId)
		             ->setPassword($row->password)
		             ->setEmail($row->email)
		             ->setSteamName($row->steamName)
		             ->setRankId($row->rankId);
    	}
    	return $user; 
    }
	
    public function delete($id){
    	$this->getDbTable()->delete(array('userId = ?' => $id));
    }

}

