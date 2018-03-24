<?php

class Application_Model_AppointmentMapper
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
            $this->setDbTable('Application_Model_DbTable_Appointment');
        }
        return $this->_dbTable;
    }
 
    public function insert($data)
    {
    	$this->getDbTable()->insert($data);
    }
    
    public function save(Application_Model_Appointment $model)
    {
        $data = array(
        	'matchId'   => $model->getMatchId(),
        	'teamId'   => $model->getTeamId(),
        	'detail'   => $model->getDetail(),
        	'date'   => $model->getDate()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['appointmentId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('appointmentId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Appointment $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->appointmentId)
             ->setMatchId($row->matchId)
             ->setTeamId($row->teamId)
             ->setDetail($row->detail)
             ->setDate($row->date);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Appointment();
            $entry->setId($row->appointmentId)
	             ->setMatchId($row->matchId)
	             ->setTeamId($row->teamId)
	             ->setDetail($row->detail)
	             ->setDate($row->date);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    public function findAppointment($where = null, $orderBy = null, $limit = null){
    	$query = $this->getDbTable()->select()
    	->from(array('a' => 'appointment'),array('*'))
    	->join(array('t' => 'team'),'a.teamId = t.teamId',array('t.shortName', 't.logo'))
    	->order($orderBy)
    	->limit($limit)
    	->setIntegrityCheck(false)
    	->where($where);
    	$resultRows = $this->getDbTable()->fetchAll($query);
    	return $resultRows;
    }
    
    public function delete($id){
    	$this->getDbTable()->delete(array('appointmentId = ?' => $id));
    }

}

