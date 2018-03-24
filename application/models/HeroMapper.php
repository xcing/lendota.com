<?php

class Application_Model_HeroMapper
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
            $this->setDbTable('Application_Model_DbTable_Hero');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Hero $model)
    {
        $data = array(
        	'name'   => $model->getName(),
        	'lastname'   => $model->getLastname(),
        	'fullname2'   => $model->getFullname2(),
        	'name2'   => $model->getName2(),
        	'picIcon'   => $model->getPicIcon(),
        	'picIcon2'   => $model->getPicIcon2(),
	        'picTitle'   => $model->getPicTitle(),
        	'picCartoon2'   => $model->getPicCartoon2(),
	        'title'   => $model->getTitle(),
        	'titleEN'   => $model->getTitleEN(),
        	'title2'   => $model->getTitle2(),
        	'titleEN2'   => $model->getTitleEN2(),
        	'quote'   => $model->getQuote(),
	        'type'   => $model->getType(),
	        'hp'   => $model->getHp(),
	        'mp'   => $model->getMp(),
	        'atk'   => $model->getAtk(),
	        'armor'   => $model->getArmor(),
	        'movespeed'   => $model->getMovespeed(),
	        'str'   => $model->getStr(),
	        'agi'   => $model->getAgi(),
	        'int'   => $model->getInt(),
	        'range'   => $model->getRange(),
	        'side'   => $model->getSide(),
	        'ordinal'   => $model->getOrdinal()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['heroId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('heroId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Hero $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->heroId)
             ->setName($row->name)
             ->setLastname($row->lastname)
             ->setFullname2($row->fullname2)
             ->setName2($row->name2)
             ->setPicIcon($row->picIcon)
             ->setPicIcon2($row->picIcon2)
             ->setPicTitle($row->picTitle)
             ->setPicCartoon2($row->picCartoon2)
             ->setTitle($row->title)
             ->setTitleEN($row->titleEN)
             ->setTitle2($row->title2)
             ->setTitleEN2($row->titleEN2)
             ->setQuote($row->quote)
             ->setType($row->type)
             ->setHp($row->hp)
             ->setMp($row->mp)
             ->setAtk($row->atk)
             ->setArmor($row->armor)
             ->setMovespeed($row->movespeed)
             ->setStr($row->str)
             ->setAgi($row->agi)
             ->setInt($row->int)
             ->setRange($row->range)
             ->setSide($row->side)
             ->setOrdinal($row->ordinal);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Hero();
            $entry->setId($row->heroId)
	             ->setName($row->name)
	             ->setLastname($row->lastname)
	             ->setFullname2($row->fullname2)
	             ->setName2($row->name2)
	             ->setPicIcon($row->picIcon)
	             ->setPicIcon2($row->picIcon2)
	             ->setPicTitle($row->picTitle)
	             ->setPicCartoon2($row->picCartoon2)
	             ->setTitle($row->title)
	             ->setTitleEN($row->titleEN)
	             ->setTitle2($row->title2)
	             ->setTitleEN2($row->titleEN2)
	             ->setQuote($row->quote)
	             ->setType($row->type)
	             ->setHp($row->hp)
	             ->setMp($row->mp)
	             ->setAtk($row->atk)
	             ->setArmor($row->armor)
	             ->setMovespeed($row->movespeed)
	             ->setStr($row->str)
	             ->setAgi($row->agi)
	             ->setInt($row->int)
	             ->setRange($row->range)
	             ->setSide($row->side)
             	 ->setOrdinal($row->ordinal);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

    public function delete($id){
    	$this->getDbTable()->delete(array('heroId = ?' => $id));
    }
    
    /**
     * 
     * Find by function.
     * @param unknown_type $field
     * @param unknown_type $value
     * @param unknown_type $queryColumns
     * @return Array of Application_Model_Hero
     */
	public function findBy($field, $value, $queryColumns, $orderBy = null, $filter = null)
    {
    	$select = $this->getDbTable()->select()->from('hero', $queryColumns)->where($field.' = ?'.$filter, $value);
    	if ($orderBy) {
    		$select->order($orderBy);
    	}
    	$resultSet = $this->getDbTable()->fetchAll($select);
    	$heroes = array();
    	foreach ($resultSet as $row) {
    		$hero = new Application_Model_Hero();
    		$hero->setId(isset($row->heroId) ? $row->heroId : null)
	             ->setName(isset($row->name) ? $row->name : null)
	             ->setFullname2(isset($row->fullname2) ? $row->fullname2 : null)
	             ->setName2(isset($row->name2) ? $row->name2 : null)
	             ->setLastname(isset($row->lastname) ? $row->lastname : null)
	             ->setPicIcon(isset($row->picIcon) ? $row->picIcon : null)
	             ->setPicIcon2(isset($row->picIcon2) ? $row->picIcon2 : null)
	             ->setPicTitle(isset($row->picTitle) ? $row->picTitle : null)
	             ->setPicCartoon2(isset($row->picCartoon2) ? $row->picCartoon2 : null)
	             ->setTitle(isset($row->title) ? $row->title : null)
	             ->setTitleEN(isset($row->titleEN) ? $row->titleEN : null)
	             ->setTitle2(isset($row->title2) ? $row->title2 : null)
	             ->setTitleEN2(isset($row->titleEN2) ? $row->titleEN2 : null)
	             ->setQuote(isset($row->quote) ? $row->quote : null)
	             ->setType(isset($row->type) ? $row->type : null)
	             ->setHp(isset($row->hp) ? $row->hp : null)
	             ->setMp(isset($row->mp) ? $row->mp : null)
	             ->setAtk(isset($row->atk) ? $row->atk : null)
	             ->setArmor(isset($row->armor) ? $row->armor : null)
	             ->setMovespeed(isset($row->movespeed) ? $row->movespeed : null)
	             ->setStr(isset($row->str) ? $row->str : null)
	             ->setAgi(isset($row->agi) ? $row->agi : null)
	             ->setInt(isset($row->int) ? $row->int : null)
	             ->setRange(isset($row->range) ? $row->range : null)
	             ->setSide(isset($row->side) ? $row->side : null)
	             ->setOrdinal(isset($row->ordinal) ? $row->ordinal : null);
			$heroes[] = $hero;
    	}
    	return $heroes;
    }

	public function findAllHero()
    {
    	$select = $this->getDbTable()->select()->from('hero',array('name', 'lastname', 'name2', 'picIcon', 'picIcon2', 'picCartoon2'));
    	$stmt = $select->query();
    	$row = $stmt->fetchAll();
    	return $row;
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

