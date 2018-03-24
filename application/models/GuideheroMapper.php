<?php

class Application_Model_GuideheroMapper
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
            $this->setDbTable('Application_Model_DbTable_Guidehero');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Guidehero $model)
    {
        $data = array(
        	'name'   => $model->getName(),
        	'skill'   => $model->getSkill(),
        	'item'   => $model->getItem(),
        	'heroCombo'   => $model->getHeroCombo(),
        	'heroWeak'   => $model->getHeroWeak(),
	        'detail'   => $model->getDetail(),
	        'ordinal'   => $model->getOrdinal(),
	        'heroId'   => $model->getHeroId(),
	        'replayId'   => $model->getReplayId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['guideHeroId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('guideHeroId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Guidehero $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->guideHeroId)
             ->setName($row->name)
             ->setSkill($row->skill)
             ->setItem($row->item)
             ->setHeroCombo($row->heroCombo)
             ->setHeroWeak($row->heroWeak)
             ->setDetail($row->detail)
             ->setOrdinal($row->ordinal)
             ->setHeroId($row->heroId)
             ->setReplayId($row->replayId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Guidehero();
            $entry->setId($row->guideHeroId)
	             ->setName($row->name)
	             ->setSkill($row->skill)
	             ->setItem($row->item)
	             ->setHeroCombo($row->heroCombo)
	             ->setHeroWeak($row->heroWeak)
	             ->setDetail($row->detail)
	             ->setOrdinal($row->ordinal)
	             ->setHeroId($row->heroId)
	             ->setReplayId($row->replayId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('guideHeroId = ?' => $id));
    }

    public function findAllGuide($heroId)
    {
    	$select = $this->getDbTable()->select()->from('guidehero',array('guideHeroId', 'name'))->where('heroId = ?', $heroId);
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
    
	public function findBy($field, $value, $queryColumns)
    {
    	$select = $this->getDbTable()->select()->from('hero', $queryColumns)->where($field.' = ?', $value);
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	$heroes = array();
    	foreach ($resultSet as $row) {
    		$hero = new Application_Model_Guidehero();
    		$hero->setId(isset($row->guideHeroId) ? $row->heroId : null)
	             ->setName(isset($row->name) ? $row->name : null)
	             ->setSkill(isset($row->skill) ? $row->skill : null)
	             ->setItem(isset($row->item) ? $row->item : null)
	             ->setHeroCombo(isset($row->heroCombo) ? $row->heroCombo : null)
	             ->setHeroWeak(isset($row->heroWeak) ? $row->heroWeak : null)
	             ->setDetail(isset($row->detail) ? $row->detail : null)
	             ->setOrdinal(isset($row->ordinal) ? $row->ordinal : null)
	             ->setHeroId(isset($row->heroId) ? $row->heroId : null)
	             ->setReplayId(isset($row->replayId) ? $row->replayId : null);
			$heroes[] = $hero;
    	}
    	return $heroes;
    }

    public function findUniqueBy($field, $value, $queryColumns)
    {
    	$heroes = $this->findBy($field, $value, $queryColumns);
    	if (isset($heroes[0])) {
    		return $heroes[0];
    	} else {
    		throw new Exception();
    	}
    }
}

