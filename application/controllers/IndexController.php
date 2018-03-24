<?php

class IndexController extends Zend_Controller_Action
{

	private $_LIMIT_NEWS = 15;
	private $_PAGE_RANGE = 5;
	private $_LIMIT_NEWS_RELATE = 5;
	
    public function init()
    {
//        if ($this->_helper->FlashMessenger->hasMessages()) {
//        	$this->view->flashMessages = $this->_helper->FlashMessenger->getMessages();
//        }
        $this->view->homeSelected = 'selected';
    }

    public function indexAction()
    {
    	$request = $this->getRequest();
    	$page = $request->getParam('page');
    	if($page != ''){
    		$this->view->page = $page;
    	}
    	$admin = $request->getParam('admin');
    	$tagId = $request->getParam('tagId');
    	$orderBy = array('stick DESC','date DESC');
    	if(Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
	    	if($admin == 1) {
	    		Eaglet_Utils_Auth::changeToAdminMode();
	    	}
	    	else if($admin == 2){
	    		Eaglet_Utils_Auth::changeToNormalMode();
	    	}
	    	if (Zend_Auth::getInstance()->getStorage()->read()->adminMode == 1) {
	    		$where = 'n.active = 0';
	    	}
	    	else if (Zend_Auth::getInstance()->getStorage()->read()->adminMode == 0){
	    		$where = 'n.active = 1';
	    	}
    	}
    	else{
	    	$where = 'n.active = 1';
	    }
	    if(Eaglet_Utils_Bilingual::isThaiLang()){
	    	$where .= " AND n.topic <> '"."' ";
	    }
	    else{
	    	$where .= " AND n.topicEN <> '"."' ";
	    }
        // fetch news
        $news_data = new Application_Model_News();
        $news = new Application_Model_NewsMapper();
        $relateNewsTag = new Application_Model_RelateNewsTagMapper();
        
        $newsPaginator = $news->findNewsList(
								$where,
								$orderBy,
								$this->_LIMIT_NEWS,
								$this->getRequest()->getParam('page', 1),
								$this->_PAGE_RANGE,
								$tagId);
		
		$i = 0;
		$tagArray = array();
		foreach($newsPaginator as $value){
			$value->detail = $news_data->splitDetail($value->detail);
			$value->detailEN = $news_data->splitDetail($value->detailEN);
			$tagArray[$i] = $relateNewsTag->getTagData($value->newsId);
			$i++;
		}
		$this->view->newsPaginator = $newsPaginator;						
        $this->view->tagArray = $tagArray;
        ///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
    }
    
    public function detailAction()
    {
    	$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$this->view->newsId = $id;
    	
    	$news_data = new Application_Model_News();
    	$news = new Application_Model_NewsMapper();
    	$relateNewsTag = new Application_Model_RelateNewsTagMapper();
        $entries = $news->joinUserDetail($id);
        //Zend_Debug::dump($entries);exit;
        if (Eaglet_Utils_Bilingual::isThaiLang()) {
        	$newsTopic = $entries[0]->topic;
        } else {
        	$newsTopic = $entries[0]->topicEN;
        }
    	Eaglet_Utils_Url::processSEOUrl(
    		$this->_request->getRequestUri(), 
    		'id', 
    		$newsTopic, 
    		'/index/detail/id/' . $id
    	);
        
        $tagArray = array();
    	foreach($entries as $value){
			$newDescription = $news_data->escapeTextForDescription($news_data->splitDetail($value->detail));
			$value->detail = $news_data->escapeBreak($value->detail);
			$value->detailEN = $news_data->escapeBreak($value->detailEN);
			$tagArray = $relateNewsTag->getTagData($value->newsId);
		}
        $this->view->entries = $entries;
        $this->view->tagArray = $tagArray;
        $this->view->description = $newDescription;
        
        $news->plusplus($id, 'read', false);
        
        
        if(!empty($tagArray[0])){
        	$where = "r.newsId != ".$id." AND n.date < '".$entries[0]->date."' AND (";
	        $i = 0;
	        $newRelateData = array();
        	
	        foreach($tagArray as $tag){
	        	if($i != 0){
	        		$where .= ' or ';
	        	}
	        	$where .= 'tagId = '.$tag['tagId'];
	        	$i++;
	        }
	        $where .= ')';
	        if(Eaglet_Utils_Bilingual::isThaiLang()){
		    	$where .= " AND n.topic <> '"."' ";
		    }
		    else{
		    	$where .= " AND n.topicEN <> '"."' ";
		    }
	        $newRelateData = $news->findNewsRelate($where, 'date DESC', $this->_LIMIT_NEWS_RELATE);
	        $this->view->haveRelate = true;
	        foreach($newRelateData as $value){
				$value->detail = $news_data->splitDetail($value->detail);
			}
			$this->view->newRelateData = $newRelateData;		
        }
        else{
        	$this->view->haveRelate = false;
        }
        ///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
    } 
    
    
    
    
	public function writenewsAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');	
		}
    	//$this->view->userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
    	
    	$tag = new Application_Model_TagMapper();
    	$tagTeam = $tag->fetchAll('tagId <= 100');
    	$this->view->tagTeam = $tagTeam;
    	$tagPlayer = $tag->fetchAll('tagId > 100 and tagId <= 200');
    	$this->view->tagPlayer = $tagPlayer;
    	$tagOther = $tag->fetchAll('tagId > 200');
    	$this->view->tagOther = $tagOther;
    	//Zend_Debug::dump($tagData);exit;
    	
    	///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
    }
    public function processnewsAction(){
    	$request = $this->getRequest();
    	
    	$news = new Application_Model_NewsMapper();
        
        if($request->getParam('mode') == 'addNews'){
        	if($request->getParam('imageName') != ''){
	        	$type = 0;
	        }
	        else{
	        	$type = 1;
	        }
	        $newsData = new Application_Model_News();
	        $newsData->setTopic($request->getParam('topic'));
	        $newsData->setTopicEN($request->getParam('topicEN'));
	        $newsData->setDetail($request->getParam('comment'));
	        $newsData->setDetailEN($request->getParam('commentEN'));
	        $newsData->setType($type);
	        $newsData->setPicture($request->getParam('imageName'));
	        $newsData->setDate(date("Y/m/d H:i:s"));
	        $newsData->setRead('0');
	        $newsData->setReplayType($request->getParam('replayType'));
	        if($request->getParam('replayType') == 0){
	        	$newsData->setReplayId(0);
	        }
	        else{
	        	$newsData->setReplayId($request->getParam('replayId'));
	        }
	        $newsData->setCreditName($request->getParam('creditName'));
	        $newsData->setCreditLink($request->getParam('creditLink'));
	        $newsData->setActive('0');
	        $newsData->setStick('0');
	        $newsData->setUserId(Zend_Auth::getInstance()->getStorage()->read()->userId);
	        $news->save($newsData);
	        
	        $newsNextId = $news->getLastId();
            $tags = $request->getParam('tags');
            $tagList = array_filter(array_map('trim', explode(',', $tags)));
            $tagMapper = new Application_Model_TagMapper();
            $relateNewsTagMapper = new Application_Model_RelateNewsTagMapper();
            foreach ($tagList as $tag) {
                $tagModel = $tagMapper->findTagByName($tag);
                if (!$tagModel) {
                    $tagModel = new Application_Model_Tag();
                    $tagModel->setTagName($tag);
                    $tagMapper->save($tagModel);
                }
                $relateNewsTag = new Application_Model_RelateNewsTag();
                $relateNewsTag->setNewsId($newsNextId);
                $relateNewsTag->setTagId($tagModel->getId());
                $relateNewsTagMapper->save($relateNewsTag);
            }
            
			return $this->_redirect('/index/index/admin/1');
        }
        
        ///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
    }
    public function processonlinenewsAction(){
    	$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$active = $request->getParam('active');
    	$page = $request->getParam('page');
    	if($page == ''){
    		$page = 1;
    	}
    	$news = new Application_Model_NewsMapper();
    	$news->activateNews($id, $active);
    	
    	return $this->_redirect('/index/index/page/'.$page);
    }
    public function addstickAction(){
    	$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$page = $request->getParam('page');
    	$addStick = $request->getParam('addStick');
    	if($page == ''){
    		$page = 1;
    	}
    	$news = new Application_Model_NewsMapper();
    	$news->stickNews($id, $addStick);
    	
    	return $this->_redirect('/index/index/page/'.$page);
    }
	public function editnewsAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');	
		}
		$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$this->view->newsId = $id;
    	$page = $request->getParam('page');
    	$this->view->page = $page;
    	
    	$news = new Application_Model_NewsMapper();
    	$relateNewsTag = new Application_Model_RelateNewsTagMapper();
        $entries = $news->fetchAll('newsId = '.$id);
        $this->view->entries = $entries;
        
        $tag = new Application_Model_TagMapper();
    	$tagTeam = $tag->fetchAll('tagId <= 100');
    	$this->view->tagTeam = $tagTeam;
    	$tagPlayer = $tag->fetchAll('tagId > 100 and tagId <= 200');
    	$this->view->tagPlayer = $tagPlayer;
    	$tagOther = $tag->fetchAll('tagId > 200');
    	$this->view->tagOther = $tagOther;
    	
    	$tagArray = array();
    	foreach($entries as $value){
			$tagArray = $relateNewsTag->getTagData($value->id);
		}
        $tags = '';
        foreach ($tagArray as $tagModel) {
            $tags .= $tagModel->tagName . ', ';
        }
        $this->view->tags = rtrim($tags, ', ');
        $this->view->tagArray = $tagArray;
        
        ///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	public function edittopicAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');
		}
		$request = $this->getRequest();
		$id = $request->getParam('id');
		$this->view->newsId = $id;
		$page = $request->getParam('page');
		$this->view->page = $page;
	
		$news = new Application_Model_NewsMapper();
		$relateNewsTag = new Application_Model_RelateNewsTagMapper();
		$entries = $news->fetchAll('newsId = '.$id);
		$this->view->entries = $entries;
	
		$tag = new Application_Model_TagMapper();
		$tagTeam = $tag->fetchAll('tagId <= 100');
		$this->view->tagTeam = $tagTeam;
		$tagPlayer = $tag->fetchAll('tagId > 100 and tagId <= 200');
		$this->view->tagPlayer = $tagPlayer;
		$tagOther = $tag->fetchAll('tagId > 200');
		$this->view->tagOther = $tagOther;
	
		$tagArray = array();
		foreach($entries as $value){
			$tagArray = $relateNewsTag->getTagData($value->id);
		}
		$this->view->tagArray = $tagArray;
	
		///////////////////// login and advertising ///////////////////////
		$this->_helper->actionStack('index', 'user');
	}
	public function deletenewsAction(){
		$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$page = $request->getParam('page');
    	
    	$news = new Application_Model_NewsMapper();
        $news->delete($id);
        
        return $this->_redirect('/index/index/page/'.$page);
	}
	public function processeditnewsAction(){
		$request = $this->getRequest();
    	$news = new Application_Model_NewsMapper();
    	$page = $request->getParam('page');
        
        if($request->getParam('mode') == 'editNews'){
        	
        	if($request->getParam('imageName') != ''){
	        	$type = 0;
	        }
	        else{
	        	$type = 1;
	        }
	        $newId = $request->getParam('newsId');
	        
        	if($request->getParam('replayType') == 0){
	        	$replayId = 0;
	        }
	        else{
	        	$replayId = $request->getParam('replayId');
	        }
        	
        	$news->editNews($newId,
        					$request->getParam('topic'),
        					$request->getParam('topicEN'),
        					$type,
        					$request->getParam('imageName'),
        					$request->getParam('comment'),
        					$request->getParam('commentEN'),
        					$request->getParam('replayType'),
        					$replayId,
        					$request->getParam('creditName'),
        					$request->getParam('creditLink')
        					);
            $tags = $request->getParam('tags');
            $oldTags = $request->getParam('oldTags');
            $tagList = array_filter(array_map('trim', explode(',', $tags)));
            $oldTagList = array_filter(array_map('trim', explode(',', $oldTags)));
            $newTagList = array_diff($tagList, $oldTagList);
            $removeTagList = array_diff($oldTagList, $tagList);
            $tagMapper = new Application_Model_TagMapper();
            $relateNewsTagMapper = new Application_Model_RelateNewsTagMapper();
            foreach ($newTagList as $newTag) {
                $tagModel = $tagMapper->findTagByName($newTag);
                if (!$tagModel) {
                    $tagModel = new Application_Model_Tag();
                    $tagModel->setTagName($newTag);
                    $tagMapper->save($tagModel);
                }
                $relateNewsTag = new Application_Model_RelateNewsTag();
                $relateNewsTag->setNewsId($newId);
                $relateNewsTag->setTagId($tagModel->getId());
                $relateNewsTagMapper->save($relateNewsTag);
            }
            foreach ($removeTagList as $removeTag) {
                $relateNewsTagMapper->deleteByTagName($newId, $removeTag);
            }
            
        	return $this->_redirect('/index/index/page/'.$page);
        }
    }
    public function processedittopicAction(){
    	$request = $this->getRequest();
    	$news = new Application_Model_NewsMapper();
    	$page = $request->getParam('page');
    
    	if($request->getParam('mode') == 'editNews'){
    
    		if($request->getParam('imageName') != ''){
    			$type = 0;
    		}
    		else{
    			$type = 1;
    		}
    		$newId = $request->getParam('newsId');
    
    		if($request->getParam('replayType') == 0){
    			$replayId = 0;
    		}
    		else{
    			$replayId = $request->getParam('replayId');
    		}
    
    		$news->editTopic($newId,
    				$request->getParam('topic'),
    				$request->getParam('topicEN'),
    				$type,
    				$request->getParam('imageName'),
    				$request->getParam('replayType'),
    				$replayId,
    				$request->getParam('creditName'),
    				$request->getParam('creditLink')
    		);
    
    		$tag = new Application_Model_TagMapper();
    		$tagData = $tag->fetchAll();
    		$relateNewsTagData = new Application_Model_RelateNewsTag();
    		$relateNewsTagData->setNewsId($newId);
    		$relateNewsTag = new Application_Model_RelateNewsTagMapper();
    		$tagArray = $relateNewsTag->getTagData($newId);
    		foreach($tagData as $entry){
    			if($request->getParam('tag'.$entry->id) == 'on'){
    				if(!$relateNewsTag->findTagData($newId, $entry->id)){
    					$relateNewsTagData->setTagId($entry->id);
    					$relateNewsTag->save($relateNewsTagData);
    				}
    			}
    			else{
    				foreach($tagArray as $tag){
    					if($tag['tagId'] == $entry->id){
    						$relateNewsTag->delete($newId, $entry->id);
    					}
    				}
    			}
    		}
    
    		return $this->_redirect('/index/index/page/'.$page);
    
    	}
    }
	public function messageAction(){
		$request = $this->getRequest();
    	$message = $request->getParam('message');
    	$this->view->message = $message;
    	
    	///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
}

