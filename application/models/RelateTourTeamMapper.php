<?php

class Application_Model_RelateTourTeamMapper
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
            $this->setDbTable('Application_Model_DbTable_RelateTourTeam');
        }
        return $this->_dbTable;
    }
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
    public function save(Application_Model_RelateTourTeam $model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getRelateTourTeamId()) || '' == ($id = $model->getRelateTourTeamId())) {
            unset($data['relateTourTeamId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('relateTourTeamId = ?' => $id));
        }
    }
 
    public function find($id)
    {
        $model = null;
        $result = $this->getDbTable()->find($id);
        if (count($result) > 0) {
            $row = $result->current();
            $model = new Application_Model_RelateTourTeam($row->toArray());
        }
        return $model;
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_RelateTourTeam($row->toArray());
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function findListTeam($tournamentId){
    	$query = $this->getDbTable()->select();
    	$query->from(array('t' => 'team'),array('*'))
    	->join(array('r' => 'relatetourteam'),'t.teamId = r.teamId',array('*'))
    	->where('r.tournamentId = ?', $tournamentId)
    	->setIntegrityCheck(false);
    	$resultRows = $this->getDbTable()->fetchAll($query);
    	return $resultRows;
    }
    
    public function delete($tournamentId, $teamId){
    	$this->getDbTable()->delete(array('tournamentId = ?' => $tournamentId, 'teamId = ?' =>$teamId));
    }
}

