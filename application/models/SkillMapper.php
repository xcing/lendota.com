<?php

class Application_Model_SkillMapper
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
            $this->setDbTable('Application_Model_DbTable_Skill');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Skill $model)
    {
        $data = array(
	        'name'   => $model->getName(),
        	'picture'   => $model->getPicutre(),
        	'picture2'   => $model->getPicutre2(),
        	'abilityType'   => $model->getAbilityType(),
        	'targetType'   => $model->getTargetType(),
	        'hotkey'   => $model->getHotkey(),
	        'detail'   => $model->getDetail(),
        	'detailEN'   => $model->getDetailEN(),
        	'note'   => $model->getNote(),
        	'noteEN'   => $model->getNoteEN(),
	        'heroId'   => $model->getHeroId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['skillId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('skillId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Skill $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->skillId)
             ->setName($row->name)
             ->setPicture($row->picture)
             ->setPicture2($row->picture2)
             ->setAbilityType($row->abilityType)
             ->setTargetType($row->targetType)
             ->setHotkey($row->hotkey)
             ->setDetail($row->detail)
             ->setDetailEN($row->detailEN)
             ->setNote($row->note)
             ->setNoteEN($row->noteEN)
             ->setHeroId($row->heroId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Skill();
            $entry->setId($row->skillId)
	             ->setName($row->name)
	             ->setPicture($row->picture)
	             ->setPicture2($row->picture2)
	             ->setAbilityType($row->abilityType)
             	 ->setTargetType($row->targetType)
	             ->setHotkey($row->hotkey)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setNote($row->note)
	             ->setNoteEN($row->noteEN)
	             ->setHeroId($row->heroId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function joinSkillDetail($heroId){
		$query = $this->getDbTable()->select();
		$query->from(array('s' => 'skill'),array('*'))                              
		      ->join(array('k' => 'skilldetail'),'s.skillId = k.skillId',array('*'))
		      ->where('s.heroId = ?', $heroId)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;       
		
	}
	
	public function joinHero($orderby = null){
		$query = $this->getDbTable()->select();
		$query->from(array('s' => 'skill'),array('*'))
			  ->join(array('h' => 'hero'),'s.heroId = h.heroId',array('h.ordinal'))
			  ->order($orderby)
			  ->setIntegrityCheck(false);
		$resultRows = $this->getDbTable()->fetchAll($query);
		return $resultRows;
	
	}
	
	public function findAllSkill()
    {
    	$select = $this->getDbTable()->select()->from('skill',array('name', 'picture', 'picture2'));
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
	
	public function findSkill($heroId)
    {
    	$select = $this->getDbTable()->select()->from('skill',array('name', 'picture', 'picture2'))->where('heroId = ?', $heroId);
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
    }
    
    public function delete($id){
    	$this->getDbTable()->delete(array('skillId = ?' => $id));
    }

}

