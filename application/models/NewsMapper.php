<?php

class Application_Model_NewsMapper
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
            $this->setDbTable('Application_Model_DbTable_News');
        }
        return $this->_dbTable;
    }
 
    public function save(Application_Model_News $model)
    {
        $data = array(
        	'topic'   => $model->getTopic(),
        	'topicEN'   => $model->getTopicEN(),
        	'detail'   => $model->getDetail(),
        	'detailEN'   => $model->getDetailEN(),
        	'picture'   => $model->getPicture(),
        	'date'   => $model->getDate(),
        	'type'   => $model->getType(),
        	'read'   => $model->getRead(),
        	'replayType'   => $model->getReplayType(),
        	'replayId'   => $model->getReplayId(),
        	'creditName'   => $model->getCreditName(),
        	'creditLink'   => $model->getCreditLink(),
        	'active'   => $model->getActive(),
        	'stick'   => $model->getStick(),
        	'userId'  => $model->getUserId()
        );
 
        if (null === ($id = $model->getId()) || '' == ($id = $model->getId())) {
            unset($data['newsId']);
            $this->getDbTable()->insert($data);
        } else {
            $this->getDbTable()->update($data, array('newsId = ?' => $id));
        }
    }
 
    public function find($id, Application_Model_News $model)
    {
        $result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $model->setId($row->newsId)
             ->setTopic($row->topic)
             ->setTopicEN($row->topicEN)
             ->setDetail($row->detail)
             ->setDetailEN($row->detailEN)
             ->setPicture($row->picture)
             ->setDate($row->date)
             ->setType($row->type)
             ->setRead($row->read)
             ->setReplayType($row->replayType)
             ->setReplayId($row->replayId)
             ->setCreditName($row->creditName)
             ->setCreditLink($row->creditLink)
             ->setActive($row->active)
             ->setStick($row->stick)
        	 ->setUserId($row->userId);
    }
 
    public function fetchAll($where = null, $orderby = null, $limit = null, $offset = null)
    {
        $resultSet = $this->getDbTable()->fetchAll($where, $orderby, $limit, $offset);
        $entries   = array();
        foreach ($resultSet as $row) {
            $entry = new Application_Model_News();
            $entry->setId($row->newsId)
	             ->setTopic($row->topic)
	             ->setTopicEN($row->topicEN)
	             ->setDetail($row->detail)
	             ->setDetailEN($row->detailEN)
	             ->setPicture($row->picture)
	             ->setDate($row->date)
	             ->setType($row->type)
	             ->setRead($row->read)
	             ->setReplayType($row->replayType)
	             ->setReplayId($row->replayId)
	             ->setCreditName($row->creditName)
             	 ->setCreditLink($row->creditLink)
             	 ->setActive($row->active)
             	 ->setStick($row->stick)
            	 ->setUserId($row->userId);
            $entries[] = $entry;
        }
        return $entries;
    }
    
//////////////////////////////////////////////////////////// modify method ///////////////////////////////////////

	public function findNewsList($where = null, $orderBy = null, $limit = null, $pageNumber = null, $pageRange = null, $tagId = null){
		if($tagId == null){
			$query = $this->getDbTable()->select()
						->from(array('n' => 'news'),array('*'))
						->join(array('u' => 'user'),'n.userId = u.userId',array('u.steamName'))
				        ->order($orderBy)
				        ->setIntegrityCheck(false)
				        ->where($where);  
		}
		else{
			$where .= ' and r.tagId = '.$tagId;
			$query = $this->getDbTable()->select()
						->from(array('n' => 'news'),array('*'))
						->join(array('u' => 'user'),'n.userId = u.userId',array('u.steamName'))
				        ->join(array('r' => 'relatenewstag'),'r.newsId = n.newsId',array('r.tagId'))
				        ->join(array('t' => 'tag'),'t.tagId = r.tagId',array('t.tagName'))
				        ->order($orderBy)
				        ->setIntegrityCheck(false)
				        ->where($where); 
		}
		$paginator = Zend_Paginator::factory($query);
		$paginator->setCurrentPageNumber($pageNumber) 
					    ->setItemCountPerPage($limit)
					    ->setDefaultPageRange($pageRange);
		return $paginator;
	}
	
	public function findNewsRelate($where = null, $orderBy = null, $limit = null){
		$query = $this->getDbTable()->select()
					->from(array('n' => 'news'),array('*'))                              
			        ->join(array('r' => 'relatenewstag'),'n.newsId = r.newsId',array('r.tagId'))
			        ->order($orderBy)
			        ->limit($limit)
			        ->group('n.newsId')
			        ->setIntegrityCheck(false)
			        ->where($where);  
		//echo $query->__toString();exit;
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;
	}
	
    /*
	public function joinUser($active, $orderby = null, $limit = null, $offset = null){
		$query = $this->getDbTable()->select();
		$query->from(array('n' => 'news'),array('*'))                              
		      ->join(array('u' => 'user'),'n.userId = u.userId',array('u.username'))
		      ->join(array('c' => 'clan'),'c.clanId = u.clanId',array('*'))
		      ->where('n.active = ?', $active)
		      ->order($orderby)
		      ->limit($limit, $offset)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;       
		
	}
	*/
	public function joinUserDetail($newsId){ 
		$query = $this->getDbTable()->select();
		$query->from(array('n' => 'news'),array('*'))
			  ->join(array('u' => 'user'),'n.userId = u.userId',array('u.steamName'))
		      ->where('n.newsId = ?', $newsId)
		      ->setIntegrityCheck(false);     
		$resultRows = $this->getDbTable()->fetchAll($query);
        return $resultRows;       
		
	}
    
	public function plusplus($id, $field, $isMinus = false){  //for plus read and comment
		$result = $this->getDbTable()->find($id);
        if (0 == count($result)) {
            return;
        }
        $row = $result->current();
        $number = $row->$field;
        if($isMinus){
        	$number--;
        }
        else{
        	$number++;
        }
        $this->getDbTable()->update(array($field => $number), array('newsId = ?' => $id));
	}
	
	public function countRow($isActive){
		
		$select = $this->getDbTable()->select();
        $select->from($this->getDbTable(), array('count(*) as amount'));
        $select->where('active = '.$isActive);
        $rows = $this->getDbTable()->fetchAll($select);
       
        return($rows[0]->amount);  

	}
	
	public function getLastId(){
		$select = $this->getDbTable()->select();
        $select->from($this->getDbTable(), array('max(newsId) as maxId'));
        $rows = $this->getDbTable()->fetchAll($select);
       
        return($rows[0]->maxId);  
	}
	
	public function editNews($id, $topic, $topicEN, $type, $picture, $detail, $detailEN, $replayType, $replayId, $creditName, $creditLink){
		$this->getDbTable()->update(array(
								'topic' => $topic, 
								'topicEN' => $topicEN, 
								'type' => $type, 
								'picture' => $picture, 
								'detail' => $detail, 
								'detailEN' => $detailEN, 
								'replayType' => $replayType, 
								'replayId' => $replayId, 
								'creditName' => $creditName,
								'creditLink' => $creditLink),
								array('newsId = ?' => $id));
	}
	public function editTopic($id, $topic, $topicEN, $type, $picture, $replayType, $replayId, $creditName, $creditLink){
		$this->getDbTable()->update(array(
				'topic' => $topic,
				'topicEN' => $topicEN,
				'type' => $type,
				'picture' => $picture,
				'replayType' => $replayType,
				'replayId' => $replayId,
				'creditName' => $creditName,
				'creditLink' => $creditLink),
				array('newsId = ?' => $id));
	}
	public function activateNews($id, $active){
		if($active == 1){
			$this->getDbTable()->update(array('active' => $active, 'date' => date("Y/m/d H:i:s")), array('newsId = ?' => $id));
		}
		else{
			$this->getDbTable()->update(array('active' => $active), array('newsId = ?' => $id));
		}
	}
	
	public function stickNews($id, $addStick = true){
		if($addStick){
			$this->getDbTable()->update(array('stick' => '1'), array('newsId = ?' => $id));
		}
		else{
			$this->getDbTable()->update(array('stick' => '0'), array('newsId = ?' => $id));
		}
	}
	
    public function delete($id){
    	$this->getDbTable()->delete(array('newsId = ?' => $id));
    }

}

