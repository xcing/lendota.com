<?php

class Application_Model_RoundScheduleMapper
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
            $this->setDbTable('Application_Model_DbTable_RoundSchedule');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_RoundSchedule &$model)
    {
        $data = Eaglet_Utils_Object::toArray($model);
        if (null === ($id = $model->getRoundScheduleId()) || '' == ($id = $model->getRoundScheduleId())) {
            unset($data['roundScheduleId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('roundScheduleId = ?' => $id));
        }
    }
	
	public function saveAll(&$models)
    {
        foreach ($models as $model) {
            $this->save($model);
        }
    }
 
    public function findRoundsInTour($tournamentId)
    {
		$rounds = array();
		$query = $this->getDbTable()
					  ->select()
					  ->from('roundschedule', '*')
					  ->where('tournamentId = ?', $tournamentId);
		$resultSet = $this->getDbTable()->fetchAll($query);
        if ($resultSet->count() > 0) {
			foreach ($resultSet as $row) {
				$round = new Application_Model_RoundSchedule($row->toArray());
                $rounds[] = $round;
			}
        }
        return $rounds;
    }
	
	public function findRoundSchedule($tournamentId, $round)
	{
		$roundSchedule = null;
		$query = $this->getDbTable()
					  ->select()
					  ->from('roundschedule', '*')
					  ->where('tournamentId = ?', $tournamentId)
					  ->where('round = ?', $round);
		$row = $this->getDbTable()->fetchRow($query);
        if ($row) {
			$roundSchedule = new Application_Model_RoundSchedule($row->toArray());
        }
        return $roundSchedule;
	}
	
}
 