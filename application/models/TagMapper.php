<?php

class Application_Model_TagMapper
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
            $this->setDbTable('Application_Model_DbTable_Tag');
        }
        return $this->_dbTable;
    }
    
    public function insert($data)
    {
        $this->getDbTable()->insert($data);
    }
 
    public function save(Application_Model_Tag &$model)
    {
        $data = array(
	        'tagName'   => $model->getTagName()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['tagId']);
            $id = $this->getDbTable()->insert($data);
            $model->setId($id);
        } else {
            $this->getDbTable()->update($data, array('tagId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_Tag $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->tagId)
        	  ->setTagName($row->tagName);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_Tag();
            $entry->setId($row->tagId)
             	  ->setTagName($row->tagName);
            $entries[] = $entry;
        }
        return $entries;
    }
    
    public function findTagByName($tagName)
    {
        $query = $this->getDbTable()
                      ->select()
                      ->from('tag')
                      ->where('tagName = ?', $tagName);
        $resultSet = $this->getDbTable()->fetchAll($query);
        $tag = null;
        if ($resultSet->count() > 0) {
            $row = $resultSet->getRow(0);
            $tag = new Application_Model_Tag();
            $tag->setId($row->tagId);
            $tag->setTagName($row->tagName);
        }
        return $tag;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

}

