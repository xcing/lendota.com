<?php

class Application_Model_TournamentMapper
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
            $this->setDbTable('Application_Model_DbTable_Tournament');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Tournament $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getTournamentId()) || '' == ($id = $model->getTournamentId())) {
            unset($data['tournamentId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('tournamentId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_Tournament($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Tournament($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function editResult($tournamentId = null, $teamChampId = null, $teamSecondId = null)
    {
    	$this->getDbTable()->update(array('champId' => $teamChampId, 'secondId' => $teamSecondId), array('tournamentId = ?' => $tournamentId));
    }
    public function editActive($tournamentId = null, $active = null)
    {
    	$this->getDbTable()->update(array('active' => $active), array('tournamentId = ?' => $tournamentId));
    }
    public function findAll($orderby = null){
    	$query = $this->getDbTable()->select();
    	$query->from(array('t' => 'tournament'),array('*'))
		      ->join(array('te' => 'team'),'t.champId = te.teamId',array('te.shortName', 'te.logo'))
		      ->order($orderby)
		      ->setIntegrityCheck(false);
    	$resultRows = $this->getDbTable()->fetchAll($query);
    	return $resultRows;
    }
}

