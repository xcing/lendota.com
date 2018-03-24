<?php

class Application_Model_ChangelogMapper
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
            $this->setDbTable('Application_Model_DbTable_Changelog');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_Changelog $model)
    {
        $data = array(
        	'heroId'   => $model->getHeroId(),
        	'detail'   => $model->getDetail(),
	        'detailEN'   => $model->getDetailEN(),
	        'mapId'   => $model->getMapId(),
	        'type'   => $model->getType()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['changelogId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('changelogId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Changelog $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->changelogId)
             ->setHeroId($row->heroId)
             ->setDetail($row->detail)
             ->setDetailEN($row->detailEN)
             ->setMapId($row->mapId)
             ->setType($row->type);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Changelog();
            $entry->setId($row->changelogId)
	             ->setHeroId($row->heroId)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setMapId($row->mapId)
	             ->setType($row->type);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function findAllData($orderBy = null, $groupBy = null){
		if($groupBy != null){
			$query = $this->getDbTable()->select()
					->from(array('c' => 'changelog'),array('*'))                              
			        ->join(array('m' => 'map'),'c.mapId = m.mapId',array('m.mapName'))
			        ->join(array('h' => 'hero'),'c.heroId = h.heroId',array('h.name', 'h.lastname', 'h.picIcon'))
			        ->order($orderBy)
			        ->group($groupBy)
			        ->setIntegrityCheck(false);  
		}
		else{
			$query = $this->getDbTable()->select()
					->from(array('c' => 'changelog'),array('*'))                              
			        ->join(array('m' => 'map'),'c.mapId = m.mapId',array('m.mapName'))
			        ->join(array('h' => 'hero'),'c.heroId = h.heroId',array('h.name', 'h.lastname', 'h.picIcon'))
			        ->order($orderBy)
			        ->setIntegrityCheck(false);  
		}
		//echo $query->__toString();exit;
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;
	}
    
    public function delete($id){
    	$this->getDbTable()->delete(array('changelogId = ?' => $id));
    }

}

