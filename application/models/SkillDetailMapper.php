<?php

class Application_Model_SkillDetailMapper
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
            $this->setDbTable('Application_Model_DbTable_SkillDetail');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_SkillDetail $model)
    {
        $data = array(
	        'level'   => $model->getLevel(),
        	'mana'   => $model->getMana(),
	        'cooldown'   => $model->getCooldown(),
	        'castingRange'   => $model->getCastingRange(),
	        'aoe'   => $model->getAoe(),
        	'duration'   => $model->getDuration(),
        	'target'   => $model->getTarget(),
        	'effect'   => $model->getEffect(),
        	'skillId'   => $model->getSkillId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['skilldetailId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('skilldetailId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_SkillDetail $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->skilldetailId)
             ->setLevel($row->level)
             ->setMana($row->mana)
             ->setCooldown($row->cooldown)
             ->setCastingRange($row->castingRange)
             ->setAoe($row->aoe)
             ->setDuration($row->duration)
             ->setTarget($row->target)
             ->setEffect($row->effect)
             ->setSkillId($row->skillId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_SkillDetail();
            $entry->setId($row->skilldetailId)
	             ->setLevel($row->level)
	             ->setMana($row->mana)
	             ->setCooldown($row->cooldown)
	             ->setCastingRange($row->castingRange)
	             ->setAoe($row->aoe)
	             ->setDuration($row->duration)
	             ->setTarget($row->target)
	             ->setEffect($row->effect)
	             ->setSkillId($row->skillId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('skilldetailId = ?' => $id));
    }

}

