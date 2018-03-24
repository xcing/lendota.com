<?php

class Application_Model_RelateNewsTagMapper
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
            $this->setDbTable('Application_Model_DbTable_RelateNewsTag');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_RelateNewsTag $model)
    {
        $data = array(
        	'newsId'   	 	 => $model->getNewsId(),
        	'tagId'   			 => $model->getTagId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['relateNewsTagId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('relateNewsTagId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_RelateNewsTag $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->relateNewsTagId)
             ->setNewsId($row->newsId)
             ->setTagId($row->tagId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_RelateNewsTag();
            $entry->setId($row->relateNewsTagId)
	             ->setNewsId($row->newsId)
	             ->setTagId($row->tagId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    //////////////////////////////////////////////////////////// modify method ///////////////////////////////////////
    
	public function getTagData($newsId){
		$query = $this->getDbTable()->select();
		$query->from(array('t' => 'tag'),array('*'))                              
		      ->join(array('r' => 'relatenewstag'),'t.tagId = r.tagId',array('*'))
		      ->where('r.newsId = ?', $newsId)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;   
	}
    public function findTagData($newsId, $tagId){
    	$select = $this->getDbTable()->select();
    	$select->from($this->getDbTable(), array('count(*) as amount'));
        $select->where('newsId = '.$newsId.' and tagId = '.$tagId);
        $rows = $this->getDbTable()->fetchAll($select);
        if($rows[0]->amount > 0){
        	return true;
        }
        else{
        	return false;
        }
    }
    
    public function delete($newsId, $tagId)
    {
    	$this->getDbTable()->delete('newsId = '.$newsId.' and tagId = '.$tagId);
    }
    
    public function deleteByTagName($newsId, $tagName)
    {
        $sql = 'DELETE rnt.*
                FROM relatenewstag rnt
                    JOIN tag ON tag.tagId = rnt.tagId
                WHERE rnt.newsId = ?
                    AND tag.tagName = ?';
    	$stmt = $this->getDbTable()->getDefaultAdapter()->query($sql, array($newsId, $tagName));
    	$stmt->execute();
    }
}