<?php
class GuideController extends Zend_Controller_Action
{
    public function init()
    {
        $this->view->guideSelected = 'selected';
    }

    public function indexAction()
    {
    	$hero = new Application_Model_HeroMapper();
    	$orderby = 'ordinal';
        $entries = $hero->fetchAll(null, $orderby);
        $this->view->entries = $entries;
        $this->view->sizeHeroData = sizeof($entries);
        
        $skill = new Application_Model_SkillMapper();
        $orderby = 'h.ordinal';
        $entriesSkill = $skill->joinHero($orderby);
        //Zend_Debug::dump($entriesSkill);exit;
        $this->view->entriesSkill = $entriesSkill;
    }
    public function indexdota2Action()
    {
    	$hero = new Application_Model_HeroMapper();
    	$orderby = 'ordinal';
    	$entries = $hero->fetchAll(null, $orderby);
    	$this->view->entries = $entries;
    	$this->view->sizeHeroData = sizeof($entries);
    
    	$skill = new Application_Model_SkillMapper();
    	$orderby = 'h.ordinal';
    	$entriesSkill = $skill->joinHero($orderby);
    	$this->view->entriesSkill = $entriesSkill;
    }
    public function heroAction()
    {
    	$request = $this->getRequest();
    	$heroId = $request->getParam('heroId');
    	$this->view->heroId = $heroId;
    	
    	$hero = new Application_Model_HeroMapper();
        $entries = $hero->fetchAll('heroId = '.$heroId);
        $this->view->entries = $entries;
        
        Eaglet_Utils_Url::processSEOUrl(
			$this->_request->getRequestUri(), 
			'heroId', 
			Eaglet_Utils_Url::getGuideHeroSkillSlugUrl($entries[0]->name, $entries[0]->lastname),
			'/guide/hero/heroId/' . $heroId
		);
        
        $skill = new Application_Model_SkillMapper();
        $entriesSkill = $skill->fetchAll('heroId = '.$heroId);
        $this->view->entriesSkill = $entriesSkill;
        
        $entriesSkillDetail = $skill->joinSkillDetail($heroId);
        $this->view->entriesSkillDetail = $entriesSkillDetail;
        
        $guideHero = new Application_Model_GuideheroMapper();
        $entriesGuideHero = $guideHero->findAllGuide($heroId);
        $this->view->entriesGuideHero = $entriesGuideHero;
        if($heroId == 100){
        	$entriesSkillInvoke = $skill->fetchAll('heroId = 9999');
        	$this->view->entriesSkillInvoke = $entriesSkillInvoke;
        	
        	$entriesSkillDetailInvoke = $skill->joinSkillDetail('9999');
        	$this->view->entriesSkillDetailInvoke = $entriesSkillDetailInvoke;
        }
		
    }
    public function herodota2Action()
    {
    	$request = $this->getRequest();
    	$heroId = $request->getParam('heroId');
    	$this->view->heroId = $heroId;
    
    	$hero = new Application_Model_HeroMapper();
    	$entries = $hero->fetchAll('heroId = '.$heroId);
    	$this->view->entries = $entries;
    
    	Eaglet_Utils_Url::processSEOUrl(
    			$this->_request->getRequestUri(),
    			'heroId',
    			Eaglet_Utils_Url::getGuideHeroSkillSlugUrl($entries[0]->name2, ''),
    			'/guide/herodota2/heroId/' . $heroId
    	);
    
    	$skill = new Application_Model_SkillMapper();
    	$entriesSkill = $skill->fetchAll('heroId = '.$heroId);
    	$this->view->entriesSkill = $entriesSkill;
    
    	$entriesSkillDetail = $skill->joinSkillDetail($heroId);
    	$this->view->entriesSkillDetail = $entriesSkillDetail;
    
    	$guideHero = new Application_Model_GuideheroMapper();
    	$entriesGuideHero = $guideHero->findAllGuide($heroId);
    	$this->view->entriesGuideHero = $entriesGuideHero;
    	if($heroId == 100){
    		$entriesSkillInvoke = $skill->fetchAll('heroId = 9999');
    		$this->view->entriesSkillInvoke = $entriesSkillInvoke;
    
    		$entriesSkillDetailInvoke = $skill->joinSkillDetail('9999');
    		$this->view->entriesSkillDetailInvoke = $entriesSkillDetailInvoke;
    	}
    
    }
    public function guideheroAction()
    {
    	$request = $this->getRequest();
    	$heroId = $request->getParam('heroId');
    	$guideHeroId = $request->getParam('guideHeroId');
    	$this->view->heroId = $heroId;
    	$this->view->guideHeroId = $guideHeroId;
    	
    	$hero = new Application_Model_HeroMapper();
        $entries = $hero->fetchAll('heroId = '.$heroId);
        $this->view->entries = $entries;
        
        Eaglet_Utils_Url::processSEOUrl(
			$this->_request->getRequestUri(), 
			'guideHeroId', 
			Eaglet_Utils_Url::getGuideHeroSlugUrl($entries[0]->name, $entries[0]->lastname),
			'/guide/guidehero/heroId/' . $heroId . '/guideHeroId/' . $guideHeroId
		);
        
        $guideHero = new Application_Model_GuideheroMapper();
        $entriesGuideHero = $guideHero->findAllGuide($heroId);
        $this->view->entriesGuideHero = $entriesGuideHero;
    	
        $guideHeroDetail = $guideHero->fetchAll('guideHeroId = '.$guideHeroId);
        $this->view->entriesGuideHeroDetail = $guideHeroDetail;
        
        /////// skill
        $skill = array();
        $skill = explode(',', $guideHeroDetail[0]->skill);
        $this->view->skill = $skill;
        
        $skillImg = new Application_Model_SkillMapper();
        $entriesSkillImg = $skillImg->findSkill($heroId);
        $entriesSkillImg[4]['name'] = 'stat';
        $entriesSkillImg[4]['picture'] = '/resources/replay-parser/images/BTNStatUp.gif';
        $this->view->entriesSkillImg = $entriesSkillImg;
        
        $entriesSkill = $skillImg->findAllSkill();
        $this->view->entriesSkill = $entriesSkill;
        
        /////// item
        $item = array();
        $item = explode(',', $guideHeroDetail[0]->item);
        $sizeItem = sizeof($item);
        $this->view->sizeItem = $sizeItem;
        $this->view->item = $item;
        
        $itemImg = new Application_Model_ItemMapper();
        $entriesItemImg = $itemImg->findAllItem();
        $this->view->entriesItemImg = $entriesItemImg;
        
        $entriesItem = $itemImg->fetchAll();
		$this->view->entriesItem = $entriesItem;
        $size = sizeof($entriesItem);
		
		for($i=0; $i<$size; $i++){
        	$recipe[$i] = $itemImg->joinItemRecipe($entriesItem[$i]->id);
		}
        $this->view->recipe = $recipe;
        
        /////// heroCombo
        $heroCombo = array();
        $heroCombo = explode(',', $guideHeroDetail[0]->heroCombo);
        $heroComboHero = array();
        $heroComboSkill = array();
        $sizeHeroCombo = sizeof($heroCombo);
        $heroComboId = array();
        $sizeSkill = array();
        for($i=0; $i<$sizeHeroCombo; $i++){
        	$heroComboId = explode('|', $heroCombo[$i]);
        	$heroComboHero[$i] = $heroComboId[0];
        	$heroComboSkill[$i] = explode('+', $heroComboId[1]);
        	$sizeSkill[$i] = sizeof($heroComboSkill[$i]);
        	if($heroComboHero[$i] != 100){
        		for($j=0; $j<$sizeSkill[$i]; $j++){
        			$heroComboSkill[$i][$j] = (($heroComboHero[$i]-1)*4)+$heroComboSkill[$i][$j];
        		}
        	}
        }
        
        $this->view->heroComboHero = $heroComboHero;
        $this->view->heroComboSkill = $heroComboSkill;
        $this->view->sizeSkill = $sizeSkill;
        
        
        /////// hero weak
        $heroWeak = array();
        $heroWeak = explode(',', $guideHeroDetail[0]->heroWeak);
        $this->view->heroWeak = $heroWeak;
        
        /////// img hero
        $heroImg = new Application_Model_HeroMapper();
        $entriesHeroImg = $heroImg->findAllHero();
        $this->view->entriesHeroImg = $entriesHeroImg;
        //Zend_Debug::dump($entriesHeroImg);exit;
        /////// replay
        $replay = array();
        $replay = explode(',', $guideHeroDetail[0]->replayId);
        $this->view->replay = $replay;
        
        $replayMapper = new Application_Model_ReplayMapper();
        $sizeReplay = sizeof($replay);
        $replayDetail = array();
        for($i=0; $i<$sizeReplay; $i++){
        	$replayDetail[$i] = $replayMapper->findReplayDetail($replay[$i]);
        }
        //Zend_Debug::dump($replayDetail);exit;
        $this->view->replayDetail = $replayDetail;
    }
    public function guideherodota2Action()
    {
    	$request = $this->getRequest();
    	$heroId = $request->getParam('heroId');
    	$guideHeroId = $request->getParam('guideHeroId');
    	$this->view->heroId = $heroId;
    	$this->view->guideHeroId = $guideHeroId;
    
    	$hero = new Application_Model_HeroMapper();
    	$entries = $hero->fetchAll('heroId = '.$heroId);
    	$this->view->entries = $entries;
    
    	Eaglet_Utils_Url::processSEOUrl(
    			$this->_request->getRequestUri(),
    			'guideHeroId',
    			Eaglet_Utils_Url::getGuideHeroSlugUrl($entries[0]->name, $entries[0]->lastname),
    			'/guide/guideherodota2/heroId/' . $heroId . '/guideHeroId/' . $guideHeroId
    	);
    
    	$guideHero = new Application_Model_GuideheroMapper();
    	$entriesGuideHero = $guideHero->findAllGuide($heroId);
    	$this->view->entriesGuideHero = $entriesGuideHero;
    
    	$guideHeroDetail = $guideHero->fetchAll('guideHeroId = '.$guideHeroId);
    	$this->view->entriesGuideHeroDetail = $guideHeroDetail;
    
    	/////// skill
    	$skill = array();
    	$skill = explode(',', $guideHeroDetail[0]->skill);
    	$this->view->skill = $skill;
    
    	$skillImg = new Application_Model_SkillMapper();
    	$entriesSkillImg = $skillImg->findSkill($heroId);
    	$entriesSkillImg[4]['name'] = 'stat';
    	$entriesSkillImg[4]['picture2'] = '/resources/replay-parser/images/BTNStatUp.gif';
    	$this->view->entriesSkillImg = $entriesSkillImg;
    
    	$entriesSkill = $skillImg->findAllSkill();
    	$this->view->entriesSkill = $entriesSkill;
    
    	/////// item
    	$item = array();
    	$item = explode(',', $guideHeroDetail[0]->item);
    	$sizeItem = sizeof($item);
    	$this->view->sizeItem = $sizeItem;
    	$this->view->item = $item;
    
    	$itemImg = new Application_Model_ItemMapper();
    	$entriesItemImg = $itemImg->findAllItem();
    	$this->view->entriesItemImg = $entriesItemImg;
    
    	$entriesItem = $itemImg->fetchAll();
    	$this->view->entriesItem = $entriesItem;
    	$size = sizeof($entriesItem);
    
    	for($i=0; $i<$size; $i++){
    		$recipe[$i] = $itemImg->joinItemRecipe($entriesItem[$i]->id);
    	}
    	$this->view->recipe = $recipe;
    
    	/////// heroCombo
    	$heroCombo = array();
    	$heroCombo = explode(',', $guideHeroDetail[0]->heroCombo);
    	$heroComboHero = array();
    	$heroComboSkill = array();
    	$sizeHeroCombo = sizeof($heroCombo);
    	$heroComboId = array();
    	$sizeSkill = array();
    	for($i=0; $i<$sizeHeroCombo; $i++){
    		$heroComboId = explode('|', $heroCombo[$i]);
    		$heroComboHero[$i] = $heroComboId[0];
    		$heroComboSkill[$i] = explode('+', $heroComboId[1]);
    		$sizeSkill[$i] = sizeof($heroComboSkill[$i]);
    		if($heroComboHero[$i] != 100){
    			for($j=0; $j<$sizeSkill[$i]; $j++){
    				$heroComboSkill[$i][$j] = (($heroComboHero[$i]-1)*4)+$heroComboSkill[$i][$j];
    			}
    		}
    	}
    
    	$this->view->heroComboHero = $heroComboHero;
    	$this->view->heroComboSkill = $heroComboSkill;
    	$this->view->sizeSkill = $sizeSkill;
    
    
    	/////// hero weak
    	$heroWeak = array();
    	$heroWeak = explode(',', $guideHeroDetail[0]->heroWeak);
    	$this->view->heroWeak = $heroWeak;
    
    	/////// img hero
    	$heroImg = new Application_Model_HeroMapper();
    	$entriesHeroImg = $heroImg->findAllHero();
    	$this->view->entriesHeroImg = $entriesHeroImg;
    	//Zend_Debug::dump($entriesHeroImg);exit;
    	/////// replay
    	$replay = array();
    	$replay = explode(',', $guideHeroDetail[0]->replayId);
    	$this->view->replay = $replay;
    
    	$replayMapper = new Application_Model_ReplayMapper();
    	$sizeReplay = sizeof($replay);
    	$replayDetail = array();
    	for($i=0; $i<$sizeReplay; $i++){
    		$replayDetail[$i] = $replayMapper->findReplayDetail($replay[$i]);
    	}
    	//Zend_Debug::dump($replayDetail);exit;
    	$this->view->replayDetail = $replayDetail;
    }
	public function itemAction(){
    	$item = new Application_Model_ItemMapper();
        $entries = $item->fetchAll();
		$this->view->entries = $entries;
        $size = sizeof($entries);
		
		for($i=0; $i<$size; $i++){
        	$recipe[$i] = $item->joinItemRecipe($entries[$i]->id);
        	$usein[$i] = $item->joinItemUsein($entries[$i]->id);
		}
		//Zend_Debug::dump($recipe);exit;
        $this->view->recipe = $recipe;
        $this->view->usein = $usein;

    }
    public function itemdota2Action(){
    	$item = new Application_Model_ItemMapper();
    	$entries = $item->fetchAll();
    	$this->view->entries = $entries;
    	$size = sizeof($entries);
    
    	for($i=0; $i<$size; $i++){
    		$recipe[$i] = $item->joinItemRecipe($entries[$i]->id);
    		$usein[$i] = $item->joinItemUsein($entries[$i]->id);
    	}
    	//Zend_Debug::dump($recipe);exit;
    	$this->view->recipe = $recipe;
    	$this->view->usein = $usein;
    
    }
    public function itemnumberAction(){
    	
    }
	public function mapnumberAction(){
    	$map = new Application_Model_MapMapper();
        $entries = $map->fetchAll();
        $this->view->map = $entries;
        $this->view->size = sizeof($entries);
    }
	public function heronumberAction(){
    	$hero = new Application_Model_HeroMapper();
    	$orderby = 'ordinal';
        $entries = $hero->fetchAll(null, $orderby);
        $this->view->entries = $entries;
        $this->view->sizeHeroData = sizeof($entries);
        
        $skill = new Application_Model_SkillMapper();
        $orderby = 'h.ordinal';
        $entriesSkill = $skill->joinHero($orderby);
        //Zend_Debug::dump($entriesSkill);exit;
        $this->view->entriesSkill = $entriesSkill;
    }
	public function technicAction(){
		$request = $this->getRequest();
    	$mode = $request->getParam('mode');
    	$id = $request->getParam('id');
    	$moveId = $request->getParam('moveId');
    	$technic = new Application_Model_TechnicMapper();
    	if($mode == 'move'){
    		$technic->moveOrdinal($id, $moveId);
    	}
    	else if($mode == 'online'){
    		$technic->onlineTechnic($id);
    	}
    	else if($mode == 'offine'){
    		$technic->offineTechnic($id);
    	}
    	$admin = $request->getParam('admin');
    	if(Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId == 1) {
			if($admin == 1) {
	    		Eaglet_Utils_Auth::changeToAdminMode();
	    	}
	    	else if($admin == 2){
	    		Eaglet_Utils_Auth::changeToNormalMode();
	    	}
			if (Zend_Auth::getInstance()->getStorage()->read()->adminMode == 1) {
	    		$where = 'active = 0';
	    	}
	    	else if (Zend_Auth::getInstance()->getStorage()->read()->adminMode == 0){
	    		$where = 'active = 1';
	    	}
    	}
    	else{
    		$where = 'active = 1';
    	}
		if(Eaglet_Utils_Bilingual::isThaiLang()){
	    	$where .= " AND topic <> '"."' ";
	    }
	    else{
	    	$where .= " AND topicEN <> '"."' ";
	    }
    	$data = $technic->fetchAll($where, 'ordinal');
    	$size = sizeof($data);
    	$this->view->size = $size;
    	$this->view->data = $data;
    }
    public function detailAction(){
    	$request = $this->getRequest();
    	$id = $request->getParam('id');
    	
    	$technic = new Application_Model_TechnicMapper();
        $data = $technic->findBy('technicId', $id);
        
        Eaglet_Utils_Url::processSEOUrl(
			$this->_request->getRequestUri(), 
			'id', 
			Eaglet_Utils_Url::convertToSlugUrl($data->topic),
			'/guide/detail/id/' . $id
		);
        
        $this->view->data = $data;
    }
    public function writenewAction(){
    	
    }
    public function processnewsAction(){
    	$request = $this->getRequest();
    	
    	$technic = new Application_Model_TechnicMapper();
    	$data = $technic->fetchAll();
    	$size = sizeof($data);
    	$maxOrdinal= $technic->maxOrdinal();
        //Zend_Debug::dump($maxOrdinal);exit;
        if($request->getParam('mode') == 'addNews'){
	        $technicData = new Application_Model_Technic();
	        $technicData->setTopic($request->getParam('topic'));
	        $technicData->setTopicEN($request->getParam('topicEN'));
	        $technicData->setDetail($request->getParam('detail'));
	        $technicData->setDetailEN($request->getParam('detailEN'));
	        $technicData->setIcon($request->getParam('icon'));
	        $technicData->setOrdinal($maxOrdinal);
	        $technicData->setActive('0');
	        $technic->save($technicData);
	        
			return $this->_redirect('/guide/technic');
        }
    }
	public function editnewsAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');	
		}
		$request = $this->getRequest();
    	$id = $request->getParam('id');
    	$this->view->technicId = $id;
    	
    	$technic = new Application_Model_TechnicMapper();
        $data = $technic->fetchAll('technicId = '.$id);
        $this->view->data = $data;
        
        
	}
	public function processeditnewsAction(){
		$request = $this->getRequest();
    	$technic = new Application_Model_TechnicMapper();
        
        if($request->getParam('mode') == 'editNews'){
	        $id = $request->getParam('technicId');
        	$technic->editNews($id,
        					$request->getParam('topic'),
        					$request->getParam('topicEN'),
        					$request->getParam('icon'),
        					$request->getParam('detail'),
        					$request->getParam('detailEN')
        					);				
        	return $this->_redirect('/guide/technic');
	        
        }
    }
	public function deletenewsAction(){
		$request = $this->getRequest();
    	$id = $request->getParam('id');
    	
    	$technic = new Application_Model_TechnicMapper();
        $technic->delete($id);
        
        return $this->_redirect('/guide/technic');
	}
}