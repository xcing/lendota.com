<?php

class ReplayController extends Zend_Controller_Action
{
	private $_replayDir = 'upload/replay/';
	private $_MAX_UPLOAD_SIZE = 5000000;
	private $_LIMIT_REPLAY = 30;
	private $_PAGE_RANGE = 5;
	
	public function init()
	{
		$this->view->replaySelected = 'selected';
	}
	
	public function indexAction()
	{
		if ($this->getRequest()->getParam('search')) {
			$this->_request->clearParams();
		}
		
		$team = trim($this->getRequest()->getParam('searchTeam'));
		$matchContest = trim($this->getRequest()->getParam('searchMatch'));
		$heroId = $this->getRequest()->getParam('heroId');
		$criterias = array();
		if ($team) {
			$criterias['sentinelTeamName LIKE ? OR scourgeTeamName LIKE ?'] = '%'.$team.'%';
		}
		if ($matchContest) {
			$criterias['matchContest LIKE ?'] = '%'.$matchContest.'%';
		}
		if ($heroId) {
			$criterias['heroId = ?'] = $heroId;
		}
		
		if(Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId == 1) {
			$admin = $this->getRequest()->getParam('admin');
			if($admin == 1){
	    		Eaglet_Utils_Auth::changeToNormalMode();
	    	}
	    	else if($admin == 3){
	    		Eaglet_Utils_Auth::changeToAdminMode();
	    	}
		}
		else{
			$admin = 1;
		}
		$this->view->admin = $admin;
		
		$limit = 10;
		$offset = 0;
		$replayMapper = new Application_Model_ReplayMapper();
		$replayPaginator = $replayMapper->findReplayList(
								$criterias, 
								'r.uploadedDate DESC',
								$this->_LIMIT_REPLAY, 
								$this->getRequest()->getParam('page', 1),
								$this->_PAGE_RANGE);
		$heroType = $this->getRequest()->getParam('heroType', 1);
		$heroMapper = new Application_Model_HeroMapper();
		$queryValues = array('heroId', 'name', 'picIcon');
		$orderBy = 'ordinal';
		$strHeroes = $heroMapper->findBy('type', 1, $queryValues, $orderBy);
		$agiHeroes = $heroMapper->findBy('type', 2, $queryValues, $orderBy);
		$intHeroes = $heroMapper->findBy('type', 3, $queryValues, $orderBy);
		
		$strClass = $agiClass = $intClass = '';
		switch ($heroType) {
			case 1:
				$strClass = 'selected';
				break;
			case 2:
				$agiClass = 'selected';
				break;
			case 3:
				$intClass = 'selected';
				break;
			default:
				$strClass = 'selected';
				$heroType = 1;
				break;
		}

		$this->view->replayPaginator = $replayPaginator;
		$this->view->heroType = $heroType;
		$this->view->strHeroes = $strHeroes;
		$this->view->agiHeroes = $agiHeroes;
		$this->view->intHeroes = $intHeroes;
		$this->view->strClass = $strClass;
		$this->view->agiClass = $agiClass;
		$this->view->intClass = $intClass;
		$this->view->replayDir = $this->_replayDir;
		$this->view->searchTeam = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchTeam');
		$this->view->searchMatch = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchMatch');
		$this->view->searchHero = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchHero');
		$this->view->heroId = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'heroId');
		$this->view->search = $this->getRequest()->getQuery();
	}
	
	public function index2Action()
	{
		if ($this->getRequest()->getParam('search')) {
			$this->_request->clearParams();
		}
	
		$team = trim($this->getRequest()->getParam('searchTeam'));
		$matchContest = trim($this->getRequest()->getParam('searchMatch'));
		$heroId = $this->getRequest()->getParam('heroId');
		//Zend_Debug::dump($heroId);exit;
		$criterias = array();
		if ($team) {
			$criterias['team1 LIKE ? OR team2 LIKE ?'] = '%'.$team.'%';
		}
		if ($matchContest) {
			$criterias['matchContest LIKE ?'] = '%'.$matchContest.'%';
		}
		if ($heroId) {
			$criterias['heroId = ?'] = $heroId;
		}
	
		if(Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId == 1) {
			$admin = $this->getRequest()->getParam('admin');
			if($admin == 1){
				Eaglet_Utils_Auth::changeToNormalMode();
			}
			else if($admin == 3){
				Eaglet_Utils_Auth::changeToAdminMode();
			}
		}
		else{
			$admin = 1;
		}
		$this->view->admin = $admin;
	
		$limit = 10;
		$offset = 0;
		$replayMapper = new Application_Model_Replay2Mapper();
		$replayPaginator = $replayMapper->findReplayList(
				$criterias,
				'r.uploadedDate DESC',
				$this->_LIMIT_REPLAY,
				$this->getRequest()->getParam('page', 1),
				$this->_PAGE_RANGE);
		$heroType = $this->getRequest()->getParam('heroType', 1);
		$heroMapper = new Application_Model_HeroMapper();
		$heroData = $heroMapper->findAllHero();
		$this->view->heroData = $heroData;
		$queryValues = array('heroId', 'name2', 'picIcon2');
		$orderBy = 'ordinal';
		$filter = " and picIcon2 != ''";
		$strHeroes = $heroMapper->findBy('type', 1, $queryValues, $orderBy, $filter);
		$agiHeroes = $heroMapper->findBy('type', 2, $queryValues, $orderBy, $filter);
		$intHeroes = $heroMapper->findBy('type', 3, $queryValues, $orderBy, $filter);
	
		$strClass = $agiClass = $intClass = '';
		switch ($heroType) {
			case 1:
				$strClass = 'selected';
				break;
			case 2:
				$agiClass = 'selected';
				break;
			case 3:
				$intClass = 'selected';
				break;
			default:
				$strClass = 'selected';
			$heroType = 1;
			break;
		}
		//Zend_Debug::dump($replayPaginator);exit;
		$this->view->replayPaginator = $replayPaginator;
		$this->view->heroType = $heroType;
		$this->view->strHeroes = $strHeroes;
		$this->view->agiHeroes = $agiHeroes;
		$this->view->intHeroes = $intHeroes;
		$this->view->strClass = $strClass;
		$this->view->agiClass = $agiClass;
		$this->view->intClass = $intClass;
		$this->view->replayDir = $this->_replayDir;
		$this->view->searchTeam = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchTeam');
		$this->view->searchMatch = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchMatch');
		$this->view->searchHero = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'searchHero');
		$this->view->heroId = Eaglet_Utils_Form::getValueFromRequestOrGET($this->_request, 'heroId');
		$this->view->search = $this->getRequest()->getQuery();
	}
	
	public function viewAction()
	{
		@require("resources/replay-parser/reshine.php");
		$request = $this->getRequest();
		$replayId = $request->getParam('replayId');
		$replayFile = $request->getParam('file');
		$replayMapper = new Application_Model_ReplayMapper();
		if($replayId == ''){
			$replay = $replayMapper->findUniqueBy('replayFileName', $replayFile, array('*'));
			
			Eaglet_Utils_Url::processSEOUrl(
				$this->_request->getRequestUri(), 
				'file', 
				 Eaglet_Utils_Url::getReplaySlugUrl(
				     $replay->getMatchContest(),
				     $replay->getSentinelTeamName(),
				     $replay->getScourgeTeamName()
			     ), 
				'/replay/view/file/' . $replayFile
			);
		} else{
			$replay = $replayMapper->findUniqueBy('replayId', $replayId, array('*'));
			
			Eaglet_Utils_Url::processSEOUrl(
				$this->_request->getRequestUri(), 
				'replayId', 
				 Eaglet_Utils_Url::getReplaySlugUrl(
				     $replay->getMatchContest(),
				     $replay->getSentinelTeamName(),
				     $replay->getScourgeTeamName()
			     ), 
				'/replay/view/replayId/' . $replayId
			);
		}
		
		if ($request->isPost() && $this->_getParam('saveEditReplay')) {
			//update replay db
			$replay->setMatchContest($this->_getParam('matchContest'));
			$replay->setSentinelTeamName($this->_getParam('sentinelTeamName'));
			$replay->setScourgeTeamName($this->_getParam('scourgeTeamName'));
			$replay->setRate($this->_getParam('rate'));
			$replayMapper->save($replay);
			//update replay serialize file
			$serializeFileName = $this->_replayDir . $replay->getReplayFileName() . '.txt';
			if (file_exists($serializeFileName)) {
		        $txt_file = fopen($serializeFileName, 'r');
		        $data = "";
		        while (($buff = fgets($txt_file)) != null) {
		            $data .= $buff;
		        }
		        fclose($txt_file);
		        $replayFileData = unserialize($data);
		            
		        if ($this->_getParam('replay_winner')) {
		        	$replayFileData->extra['winner'] = ($this->_getParam('replay_winner') == "Sentinel" ? 
		        											$this->_getParam('sentinelTeamName') : $this->_getParam('scourgeTeamName'));
		        }
		        $replayFileData->extra['text'] = $this->_getParam('replay_text');
		        
		        $txt_file = fopen($serializeFileName, 'w');
	        	flock($txt_file, 2);
	        	fputs($txt_file, serialize($replayFileData));
	        	flock($txt_file, 3);
	        	fclose($txt_file);
			}		
		}
		
		$replayTitle = ($replay->getMatchContest() ? '['.$replay->getMatchContest().'] ' : '');
		$replayTitle .= $replay->getSentinelTeamName().' VS '.$replay->getScourgeTeamName();
		if($replayId == ''){
			$replayId = $replay->getId();
			$this->view->replayId = $replayId;
			$this->view->replayFile = $replayFile;
		}
		else{
			$this->view->replayId = $replayId;
			$this->view->replayFile = $replay->getReplayFileName();
		}
		$this->view->totalView = $replay->getTotalView();
		$this->view->totalDownload = $replay->getTotalDownload();

//		if ($replay->getTotalView()) {
//			$currentView = $replay->getTotalView();
//		} else {
//			$currentView = 0;
//		}
		$replay->setTotalView($replay->getTotalView() + 1);
		$replayMapper->save($replay);
		
		$this->view->replayDir = $this->_replayDir;
		$this->view->replayTitle = $replayTitle;
		$this->view->replayPageTitle = 'Replay ' . $replayTitle;
		$this->view->matchContest = $replay->getMatchContest();
		$this->view->sentinelTeam = $replay->getSentinelTeamName();
		$this->view->scourgeTeam = $replay->getScourgeTeamName();
		$this->view->replayRate = $replay->getRate();
		$this->view->description = 'Replay เกมการแข่งขันรายการ ' . $replay->getMatchContest() . 
									' ระหว่างทีม ' . $replay->getSentinelTeamName() . ' และทีม ' . $replay->getScourgeTeamName();

        ///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	
	public function view2Action()
	{
		@require("resources/replay-parser/reshine.php");
		$request = $this->getRequest();
		$replayId = $request->getParam('replay2Id');
		$replayMapper = new Application_Model_Replay2Mapper();
		$replay = $replayMapper->findUniqueBy('replay2Id', $replayId, array('*'));
		if ($request->isPost() && $this->_getParam('saveEditReplay')) {
			//update replay db
			$replay->setMatchContest($this->_getParam('matchContest'));
			$replay->setTeam1($this->_getParam('team1'));
			$replay->setTeam2($this->_getParam('team2'));
			$replay->setRate($this->_getParam('rate'));
			$replay->setWin($this->_getParam('win'));
			$replay->setFirstPick($this->_getParam('firstPick'));
			$replay->setReplayMatchId($this->_getParam('replayMatchId'));
			$replay->setLink($this->_getParam('link'));
			$replay->setBanTeam1($this->_getParam('team1Bans'));
			$replay->setBanTeam2($this->_getParam('team2Bans'));
			$allHero = $this->_getParam('team1Picks').','.$this->_getParam('team2Picks');
			$oldAllHero = $replay->getChosenTeam1().','.$replay->getChosenTeam2();
			$replay->setChosenTeam1($this->_getParam('team1Picks'));
			$replay->setChosenTeam2($this->_getParam('team2Picks'));
			
			$replayMapper->save($replay);
			if($allHero != $oldAllHero){
				$replayHeroMapper = new Application_Model_RelateReplayHero2Mapper();
				$replayHeroMapper->delete($replayId);
				
				$heroMapper = new Application_Model_HeroMapper();
				
				$heroIds = explode(",", $allHero);
				//Zend_Debug::dump($heroIds);exit;
				foreach ($heroIds as $heroId) {
					try {
						$replayHeroModel = new Application_Model_RelateReplayHero2();
						$replayHeroModel->setHeroId($heroId);
						$replayHeroModel->setReplay2Id($replayId);
						$replayHeroMapper->save($replayHeroModel);
					} catch (Exception $e) {
						$logger = Zend_Registry::get('logger');
						$logger->log('Insert relatereplayhero2 problem at hero name : ' . $heroName . ', for replay : ' . $replayId, Zend_Log::ERR);
					}
				}
			}
		}
	
		$replayTitle = ($replay->getMatchContest() ? '['.$replay->getMatchContest().'] ' : '');
		$replayTitle .= $replay->getTeam1().' VS '.$replay->getTeam2();

		$this->view->replayId = $replayId;
		
		$this->view->totalView = $replay->getTotalView();
	
		$replay->setTotalView($replay->getTotalView() + 1);
		$replayMapper->save($replay);
	
		$this->view->replayTitle = $replayTitle;
		$this->view->replayPageTitle = 'Replay ' . $replayTitle;
		$this->view->matchContest = $replay->getMatchContest();
		$this->view->team1 = $replay->getTeam1();
		$this->view->team2 = $replay->getTeam2();
		$this->view->chosenTeam1 = $replay->getChosenTeam1();
		$this->view->chosenTeam2 = $replay->getChosenTeam2();
		$this->view->banTeam1 = $replay->getBanTeam1();
		$this->view->banTeam2 = $replay->getBanTeam2();
		$this->view->laneTeam1 = $replay->getLaneTeam1();
		$this->view->laneTeam2 = $replay->getLaneTeam2();
		$this->view->heroIdChosenTeam1 = explode(",", $replay->getChosenTeam1());
		$this->view->heroIdChosenTeam2 = explode(",", $replay->getChosenTeam2());
		$this->view->heroIdBanTeam1 = explode(",", $replay->getBanTeam1());
		$this->view->heroIdBanTeam2 = explode(",", $replay->getBanTeam2());
		$this->view->win = $replay->getWin();
		if($replay->getWin() == 1){
			$this->view->teamWin = $replay->getTeam1();
		}
		else if($replay->getWin() == 2){
			$this->view->teamWin = $replay->getTeam2();
		}
		else{
			$this->view->teamWin = 'Unknown';
		}
		$this->view->firstPick = $replay->getFirstPick();
		if($replay->getFirstPick() == 1){
			$this->view->firstPickName = 'Radiant';
		}
		else{
			$this->view->firstPickName = 'Dire';
		}
		$this->view->uploadedDate = $replay->getUploadedDate();
		$this->view->replayMatchId = $replay->getReplayMatchId();
		$this->view->link = $replay->getLink();
		$this->view->replayRate = $replay->getRate();
		$this->view->description = 'Replay เกมการแข่งขันรายการ ' . $replay->getMatchContest() .
		' ระหว่างทีม ' . $replay->getTeam1() . ' และทีม ' . $replay->getTeam2();
	
		$heroMapper = new Application_Model_HeroMapper();
		$heroData = $heroMapper->findAllHero();
		$this->view->heroData = $heroData;
        
        $orderby = 'ordinal';
        $entries = $heroMapper->fetchAll(null, $orderby);
        $this->view->entries = $entries;
        $this->view->sizeHeroData = sizeof($entries);
        
		///////////////////// login and advertising ///////////////////////
		$this->_helper->actionStack('index', 'user');
	}
	
	public function uploadAction()
	{
		if (Zend_Auth::getInstance()->hasIdentity() && Eaglet_Utils_Auth::isAdmin()) {
			$this->view->maxUploadSize = $this->_MAX_UPLOAD_SIZE;
			if ($this->getRequest()->isPost()) {
			    if (empty($_FILES['replay_file']) && empty($_POST['replay_winner'])) {
					$this->view->uploadErrorMsg = "กรุณากรอกข้อมูลที่จำเป็นให้ครบ";
			    } else {
			    	$matchContest = trim($_POST['matchContest']);
					$sentinelTeam = trim($_POST['sentinelTeamName']);
					$scourgeTeam = trim($_POST['scourgeTeamName']);
                    if (empty($matchContest) && empty($sentinelTeam) && empty($scourgeTeam)) {
                        // parse data from replay name (for easy upload)
                        // example replay name [TESL]_SVR_ES_vs_Perfect_G2_20120914.w3g
                        $replayName = $_FILES["replay_file"]["name"];
                        $matches = array();
                        preg_match('#\[(.*?)\]#', $replayName, $matches);
                        $matchContest = $matches[1];
                        preg_match('#_(.*?)_vs#', $replayName, $matches);
                        $sentinelTeam = $matches[1];
                        preg_match('#vs_(.*?)_G#', $replayName, $matches);
                        $scourgeTeam = $matches[1];
                    }
					$enjoymentRate = $_POST['rate'];
			       	$winner = htmlspecialchars(trim($_POST['replay_winner']));
			       	$text = htmlspecialchars(trim($_POST['replay_text']));
			
					// Check that we have a file
	       			$replayUploaded = false;
	       			$replayFile = "";
			       
			       	if ((!empty($winner) && !empty($_FILES["replay_file"])) && ($_FILES['replay_file']['error'] == 0)) {
						//Check if the file is JPEG image and it's size is less than 350Kb
			          	$filename = basename($_FILES['replay_file']['name']);
			          	$ext = substr($filename, strrpos($filename, '.') + 1);
			          	$uniqueID = time();
			          
			          	if (($ext == "w3g") && $_FILES["replay_file"]["size"] < $this->_MAX_UPLOAD_SIZE) {
							//Determine the path to which we want to save this file
			              	$newname = $this->_replayDir.$uniqueID.'.'.$ext;
			              	//Check if the file with the same name is already exists on the server
			              	if (!file_exists($newname)) {
			                	//Attempt to move the uploaded file to it's new place
				                if ((move_uploaded_file($_FILES['replay_file']['tmp_name'], $newname))) {
				                   $replayFile = $uniqueID.'.'.$ext;
				                   $replayUploaded = true;
				                } else {
				                   $this->view->uploadErrorMsg = "ไม่สามารถ upload replay ได้ กรุณาลองใหม่อีกครั้ง";
				                }
			              	} else {
			                 $this->view->uploadErrorMsg = "Error: File ".$_FILES["replay_file"]["name"]." already exists";
							}
			          	} else {
			             $this->view->uploadErrorMsg = "รับไฟล์ประเภท .w3g ที่ขนาดน้อยกว่า 3 MB เท่านั้น";
			          	}
					} else {
			            $this->view->uploadErrorMsg = "กรุณากรอกข้อมูลที่จำเป็นให้ครบ";
			        }
			
			        // If the replay was uploadead successfully, process it
			        if ($replayUploaded) {
			        	@require("resources/replay-parser/reshine.php");
	
			        	$replay = new replay($this->_replayDir.$replayFile);
	
			        	/* Determine the winner
			        	 * If the uploader chose "Automatic" then check if the parser was able to determine a winner,
			        	 * otherwise the winner is set to "Unknown"
			        	 * Alternatively the uploader can set the winner manually
			        	 */
			        	if("Automatic" != $winner) {
			        		$replay->extra['winner'] = ($winner == "Sentinel" ? $sentinelTeam : $scourgeTeam);
			        	} else if(isset($replay->extra['parsed_winner'])) {
			        		$replay->extra['winner'] = $replay->extra['parsed_winner'];
			        	} else {
			        		$replay->extra['winner'] = "Unknown";
			        	}
	
			        	$replay->extra['text'] = $text;
			        	$replay->extra['original_filename'] = $filename;
	
			        	$txt_file = fopen($this->_replayDir.$replayFile.'.txt', 'a');
	
			        	flock($txt_file, 2);
			        	fputs($txt_file, serialize($replay));
			        	flock($txt_file, 3);
			        	fclose($txt_file);
			        	if ($replay->extra['parsed'] == false) {
			        		$this->view->uploadErrorMsg = 'ไม่สามารถ parse replay เพื่อดูรายละเอียดได้';
			        	} else {
			        		//Save replay data to replay and relatreplayhero table for search replay later.
			        		$replayModel = new Application_Model_Replay();
			        		$replayModel->setReplayFileName($replayFile);
			        		$replayModel->setMatchContest($matchContest);
			        		$replayModel->setSentinelTeamName($sentinelTeam);
			        		$replayModel->setScourgeTeamName($scourgeTeam);
			        		$replayModel->setRate($enjoymentRate);
			        		$replayModel->setUploadedDate(Eaglet_Utils_Date::getDateTime());
			        		$replayModel->setTotalView(0);
			        		$replayModel->setTotalDownload(0);
			        		$replayModel->setTotalComment(0);
			        		
			        		$replayMapper = new Application_Model_ReplayMapper();
			        		$replayMapper->save($replayModel);
			        		
			        		$heroMapper = new Application_Model_HeroMapper();
			        		$replayHeroMapper = new Application_Model_RelateReplayHeroMapper();
			        		
			        		$heroNames = $replay->getAllHeroNames();
							foreach ($heroNames as $heroName) {
								try {
									$hero = $heroMapper->findUniqueBy('name', $heroName, array('heroId'));
									$replayHeroModel = new Application_Model_RelateReplayHero();
									$replayHeroModel->setHeroId($hero->getId());
									$replayHeroModel->setReplayId($replayModel->getId());
					        		$replayHeroMapper->save($replayHeroModel);
								} catch (Exception $e) {
									$logger = Zend_Registry::get('logger');
									$logger->log('Insert relatereplayhero problem at hero name : ' . $heroName . ', for replay : ' . $replayFile, Zend_Log::ERR);
								}
							}
			        		
			        		$this->view->uploadSuccessMsg = 'Replay uploaded successfully. <a href="/replay/upload">Upload more replay</a>';
			        		$this->view->printReplayInfo = true;
			        		$this->view->title = $sentinelTeam.' VS '.$scourgeTeam;
			        		$this->view->replay = $replay;
			        		$this->view->replayFile = $replayFile;
			        	}
			        }
			    }
			}
		} else {
			$this->_redirect('replay');
		}
	}
	
	public function downloadAction()
	{
		$this->view->layout()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
		
		$replayFileName = $this->getRequest()->getParam('f');
		$replayMapper = new Application_Model_ReplayMapper();
		$replay = $replayMapper->findUniqueBy('replayFileName', $replayFileName, array('*'));
		$replay->setTotalDownload($replay->getTotalDownload() + 1);
		$replayMapper->save($replay);
		
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename="'. $this->getRequest()->getParam('fc') . '"');
		readfile($this->_replayDir . $replayFileName);
	}
	
	
	
    
    public function deleteAction()
    {
    	if (Zend_Auth::getInstance()->hasIdentity() && Eaglet_Utils_Auth::isAdmin()) {
	    	$replayFileName = $this->_getParam('file');
	    	
	    	$replayMapper = new Application_Model_ReplayMapper();
	    	$replayMapper->deleteReplay($replayFileName);
	    	
	    	$replayUploadPath = realpath(APPLICATION_PATH . '/../public/upload/replay');
	    	unlink($replayUploadPath . '/' . $replayFileName);
	    	unlink($replayUploadPath . '/' . $replayFileName . '.txt');
	    	
	    	$this->_forward('index');
    	} else {
    		$this->_redirect('replay');
    	}
    }
    
    public function delete2Action()
    {
    	if (Zend_Auth::getInstance()->hasIdentity() && Eaglet_Utils_Auth::isAdmin()) {
    		$replayId = $this->_getParam('replay2Id');
    
    		$replayMapper = new Application_Model_Replay2Mapper();
    		$replayMapper->delete($replayId);
   
    		$this->_forward('index2');
    	} else {
    		$this->_redirect('/replay/index2');
    	}
    }
    
    public function addreplay2Action()
    {
    	if (Zend_Auth::getInstance()->hasIdentity() && Eaglet_Utils_Auth::isAdmin()) {
    		if ($this->getRequest()->isPost()) {
    			$request = $this->getRequest();
    			//Zend_Debug::dump($request);exit;
    			$heroId = $request->getParam('heroId');
    			$replayModel2 = new Application_Model_Replay2();
    			$replayModel2->setMatchContest($request->getParam('matchContest'));
    			$replayModel2->setTeam1($request->getParam('team1'));
    			$replayModel2->setTeam2($request->getParam('team2'));
    			$replayModel2->setRate($request->getParam('rate'));
    			$replayModel2->setWin($request->getParam('win'));
    			$replayModel2->setUploadedDate(Eaglet_Utils_Date::getDateTime());
    			$replayModel2->setTotalView(0);
    			$replayModel2->setTotalComment(0);
    			$replayModel2->setFirstPick($request->getParam('firstPick'));
    			$replayModel2->setReplayMatchId($request->getParam('replayMatchId'));
    			$replayModel2->setLink($request->getParam('link'));
                $replayModel2->setBanTeam1($request->getParam('team1Bans'));
                $replayModel2->setBanTeam2($request->getParam('team2Bans'));
                $replayModel2->setChosenTeam1($request->getParam('team1Picks'));
                $replayModel2->setChosenTeam2($request->getParam('team2Picks'));
    			
    			$replay2Mapper = new Application_Model_Replay2Mapper();
    			$replay2Mapper->save($replayModel2);
    			
    			$heroMapper = new Application_Model_HeroMapper();
    			$replayHeroMapper = new Application_Model_RelateReplayHero2Mapper();
    			$allHero = $request->getParam('team1Picks').','.$request->getParam('team2Picks');
    			$heroIds = explode(",", $allHero);
    			//Zend_Debug::dump($heroIds);exit;
    			foreach ($heroIds as $heroId) {
    				try {
    					$replayHeroModel = new Application_Model_RelateReplayHero2();
    					$replayHeroModel->setHeroId($heroId);
    					$replayHeroModel->setReplay2Id($replayModel2->getId());
    					$replayHeroMapper->save($replayHeroModel);
    				} catch (Exception $e) {
    					$logger = Zend_Registry::get('logger');
    					$logger->log('Insert relatereplayhero2 problem at hero name : ' . $heroName . ', for replay : ' . $replayModel2->getId(), Zend_Log::ERR);
    				}
    			}
    			return $this->_redirect('/replay/index2');
    		} 
    		else {
                $hero = new Application_Model_HeroMapper();
                $orderby = 'ordinal';
                $entries = $hero->fetchAll(null, $orderby);
                $this->view->entries = $entries;
                $this->view->sizeHeroData = sizeof($entries);
            }
    	}
    	else {
    		$this->_redirect('replay');
    	}
    }
    
    public function addreplay2linkAction()
    {
        if (Zend_Auth::getInstance()->hasIdentity() && Eaglet_Utils_Auth::isAdmin()) {
    		if ($this->getRequest()->isPost()) {
    			
                $replayLink = $this->_getParam('replayLink');
                $htmlContent = file_get_contents($replayLink);
                if ($htmlContent) {
                    $matches = array();
                    preg_match('#<div id="cont">(.*)<a name="comments">#s', $htmlContent, $matches);
                    $replayContent = $matches[1];
                    
                    preg_match('#<td>Event<td>(.*?)<tr>#s', $replayContent, $matches);
                    $event = trim($matches[1]);
                    if ($event) {
                        preg_match('#title="The Radiant">(.*?)<td><font style="font-size:13px;font-weight:bold;">(.*?)</font>#s', $replayContent, $matches);
                        $radiantTeam = trim($matches[2]);

                        preg_match('#title="The Dire">(.*?)<td><font style="font-size:13px;font-weight:bold;">(.*?)</font>#s', $replayContent, $matches);
                        $direTeam = trim($matches[2]);

                        preg_match('#<div id="winner" style="display:none;">(.*?)</div>#s', $replayContent, $matches);
                        $winner = trim($matches[1]);
                        $win = null;
                        if ($winner == $radiantTeam) {
                            $win = 1;
                        } else if ($winner == $direTeam) {
                            $win = 2;
                        }

                        preg_match('#<td>First Pick<td>(.*?)</span>#s', $replayContent, $matches);
                        $firstPick = trim($matches[1]);
                        if ($firstPick == $radiantTeam) {
                            $firstPick = 1;
                        } else if ($firstPick == $direTeam) {
                            $firstPick = 2;
                        }

                        preg_match('#<td>Match ID<td>(.*?)</span>#s', $replayContent, $matches);
                        $matchId = trim(strip_tags($matches[1]));
                        
                        

                        preg_match('#<embed src="(.*?)/v/(.*?)"#', $replayContent, $matches);
                        $vodId = $matches[2];
                        if ($vodId) {
                            $vodLink = '<iframe width="560" height="315" src="http://www.youtube.com/embed/' . $vodId . '" frameborder="0" allowfullscreen></iframe>';
                        } else {
                            preg_match('#<object (.*?)</object>#', $replayContent, $matches);
                            $vodLink = $matches[0];
                        }

                        preg_match('#<td>Current: <b>(.*?)</b>#', $replayContent, $matches);
                        $currentRating = $matches[1];
                        $rate = 0;
                        if ($currentRating >= 8 && $currentRating < 9) {
                            $rate = 1;
                        } else if ($currentRating >= 9) {
                            $rate = 2;
                        }

                        $team1Bans = '';
                        $team2Bans = '';
                        $team1Picks = '';
                        $team2Picks = '';
                        $team1Lanes = '';
                        $team2Lanes = '';

                        preg_match("#<td class='cont_middle_alt'>(.*)</table>#s", $replayContent, $matches);
                        $heroesAndPlayers = trim($matches[1]);

                        preg_match_all('#alt="(.*?)"#s', $replayContent, $matches);
                        $totalHeroes = $matches[1];
                        for ($i = 2; $i <= 21; $i++) {
                            $heroId = Eaglet_Utils_Hero::getHeroId($matches[1][$i]);
                            if ($i >= 2 && $i <= 4) {
                                // radiant ban #1
                                $team1Bans .= $heroId . ',';
                            } else if ($i >= 5 && $i <= 7) {
                                // dire ban #1
                                $team2Bans .= $heroId . ',';
                            } else if ($i >= 8 && $i <= 9) {
                                // radiant ban #2
                                $team1Bans .= $heroId . ',';
                            } else if ($i >= 10 && $i <= 11) {
                                // dire ban #2
                                $team2Bans .= $heroId . ',';
                            } else if ($i >= 12 && $i <= 14) {
                                // radiant pick #1
                                $team1Picks .= $heroId . ',';
                            } else if ($i >= 15 && $i <= 17) {
                                // dire pick #1
                                $team2Picks .= $heroId . ',';
                            } else if ($i >= 18 && $i <= 19) {
                                // radiant pick #2
                                $team1Picks .= $heroId . ',';
                            } else if ($i >= 20 && $i <= 21) {
                                // dire pick #2
                                $team2Picks .= $heroId . ',';
                            }
                        }

                        preg_match_all('#alt="(.*?)" border="0" />(.*)<br />#', $heroesAndPlayers, $matches);
                        $laneHeroes = $matches[1];
                        $lanePlayers = $matches[2];
                        for ($i = count($laneHeroes) - 10; $i < count($laneHeroes); $i++) {
                            if ($i < count($laneHeroes) - 5) {
                                $team1Lanes .= $laneHeroes[$i] . '|' . trim($lanePlayers[$i]) . ',';
                            } else {
                                $team2Lanes .= $laneHeroes[$i] . '|' . trim($lanePlayers[$i]) . ',';
                            }
                        }
                        $team1Bans = rtrim($team1Bans, ',');
                        $team2Bans = rtrim($team2Bans, ',');
                        $team1Picks = rtrim($team1Picks, ',');
                        $team2Picks = rtrim($team2Picks, ',');
                        $team1Lanes = rtrim($team1Lanes, ',');
                        $team2Lanes = rtrim($team2Lanes, ',');
                        if ($team1Lanes == '|,|,|,|,|') {
                            // new gosu's replay 2 layout (no hero lane info)
                            $team1Lanes = null;
                            $team2Lanes = null;
                        } else if (count($totalHeroes) < 30) {
                            // ap mode
                            $team1Picks = $team1Bans;
                            $team2Picks = $team2Bans;
                            $team1Bans = null;
                            $team2Bans = null;
                        }
                        
                        $replayModel2 = new Application_Model_Replay2();
                        $replayModel2->setMatchContest($event);
                        $replayModel2->setTeam1($radiantTeam);
                        $replayModel2->setTeam2($direTeam);
                        $replayModel2->setRate($rate);
                        $replayModel2->setWin($win);
                        $replayModel2->setUploadedDate(Eaglet_Utils_Date::getDateTime());
                        $replayModel2->setTotalView(0);
                        $replayModel2->setTotalComment(0);
                        $replayModel2->setFirstPick($firstPick);
                        $replayModel2->setReplayMatchId($matchId);
                        $replayModel2->setLink($vodLink);
                        $replayModel2->setBanTeam1($team1Bans);
                        $replayModel2->setBanTeam2($team2Bans);
                        $replayModel2->setChosenTeam1($team1Picks);
                        $replayModel2->setChosenTeam2($team2Picks);
                        $replayModel2->setLaneTeam1($team1Lanes);
                        $replayModel2->setLaneTeam2($team2Lanes);

                        $replay2Mapper = new Application_Model_Replay2Mapper();
                        $replay2Mapper->save($replayModel2);

                        $replayHeroMapper = new Application_Model_RelateReplayHero2Mapper();
                        $allHero = $team1Picks . ',' . $team2Picks;
                        $heroIds = explode(",", $allHero);
                        foreach ($heroIds as $heroId) {
                            try {
                                $replayHeroModel = new Application_Model_RelateReplayHero2();
                                $replayHeroModel->setHeroId($heroId);
                                $replayHeroModel->setReplay2Id($replayModel2->getId());
                                $replayHeroMapper->save($replayHeroModel);
                            } catch (Exception $e) {
                                $logger = Zend_Registry::get('logger');
                                $logger->log('Insert relatereplayhero2 problem at hero name : ' . $heroName . ', for replay : ' . $replayModel2->getId(), Zend_Log::ERR);
                            }
                        }
                        
                        return $this->_redirect('/replay/index2');
                    } else {
                        $this->view->message = 'ใส่ link เหี้ยไรมาครับ!';
                    }
                } else {
                    $this->view->message = 'ใส่ link เหี้ยไรมาครับ!';
                }
            }
        } else {
            $this->_redirect('replay');
        }
    }
    
	public function tutorialviewreplayAction(){
		
	}
	public function testAction(){
		/* Stat Replay*/
		$matchId = 37629117;
		if($matchId != ''){
			$replayStatLink = 'https://dotabuff.com/matches/'.$matchId;
			$htmlContentStat = file_get_contents($replayStatLink);
			if ($htmlContentStat) {
				preg_match('#<div class="team-results">(.*)</div>#s', $htmlContentStat, $teamResult);
		
				preg_match('#<section class="radiant">(.*)</section>#s', $teamResult[1], $radiant);
				preg_match('#<section class="dire">(.*)</section>#s', $teamResult[1], $dire);
		
				preg_match('#<tbody>(.*?)</tbody>#s', $radiant[1], $playerRadiant);
				preg_match('#<tbody>(.*?)</tbody>#s', $dire[1], $playerDire);
		
				// filter name
				preg_match_all('#<td class="cell-extramedium"><a href="(.*?)">(.*?)</a></td>#s', $playerRadiant[1], $matches);
				$radiant_name = $matches[2];
				preg_match_all('#<td class="cell-extramedium"><a href="(.*?)">(.*?)</a></td>#s', $playerDire[1], $matches);
				$dire_name = $matches[2];
				$name = array_merge($radiant_name, $dire_name);
		
				//filter heroId
				preg_match_all('#<td class="cell-mediumlarge"><a href="(.*?)" class="hero-link">(.*?)</a></td>#s', $playerRadiant[1], $matches);
				$radiant_hero = $matches[2];
				preg_match_all('#<td class="cell-mediumlarge"><a href="(.*?)" class="hero-link">(.*?)</a></td>#s', $playerDire[1], $matches);
				$dire_hero = $matches[2];
				$hero = array_merge($radiant_hero, $dire_hero);
				$heroId = array();
				foreach ($hero as $heroName){
					$heroId[] = Eaglet_Utils_Hero::getHeroId_dotabuff($heroName);
				}
		
				//filter stat
				preg_match_all('#<td class="cell-centered">(.*?)</td>#s', $playerRadiant[1], $matches);
				$radiant_stat = $matches[1];
				preg_match_all('#<td class="cell-centered">(.*?)</td>#s', $playerDire[1], $matches);
				$dire_stat = $matches[1];
				$stats = array_merge($radiant_stat, $dire_stat);
		
				$level = array();
				$kill = array();
				$die = array();
				$assist = array();
				$gold = array();
				$lastshot = array();
				$denie = array();
				$xpm = array();
				$gpm = array();
				foreach ($stats as $statIdx =>$stat){
					switch ($statIdx % 9) {
						case 0:
							$level[] = $stat;
							break;
						case 1:
							$kill[] = $stat;
							break;
						case 2:
							$die[] = $stat;
							break;
						case 3:
							$assist[] = $stat;
							break;
						case 4:
							$gold[] = $stat;
							break;
						case 5:
							$lastshot[] = $stat;
							break;
						case 6:
							$denie[] = $stat;
							break;
						case 7:
							$xpm[] = $stat;
							break;
						case 8:
							$gpm[] = $stat;
							break;
					}
				}
		
				//filter item
				preg_match_all('#<tr>(.*?)</tr>#s', $playerRadiant[1], $matches);
				$itemRadiant = array();
				foreach ($matches[1] as $item){
					preg_match_all('#<img alt="(.*?)" class="image-icon image-item" (.*?) title="(.*?)" />#s', $item, $items);
					foreach ($items[3] as $itemName){
						$itemId[] = Eaglet_Utils_Item::getItemId($itemName);
					}
					$itemRadiant[] = implode(",", $itemId);
					unset($itemId);
				}
				preg_match_all('#<tr>(.*?)</tr>#s', $playerDire[1], $matches);
				$itemDire = array();
				foreach ($matches[1] as $item){
					preg_match_all('#<img alt="(.*?)" class="image-icon image-item" (.*?) title="(.*?)" />#s', $item, $items);
					foreach ($items[3] as $itemName){
						$itemId[] = Eaglet_Utils_Item::getItemId($itemName);
					}
					$itemDire[] = implode(",", $itemId);
					unset($itemId);
				}
				$item = array_merge($itemRadiant, $itemDire);
		
				//insert db
				$replayStatMapper = new Application_Model_Replay2StatMapper();
				foreach ($name as $insertIdx => $names){
					$replayStatModel = new Application_Model_Replay2Stat();
					$replayStatModel->setReplayMatchId($matchId);
					$replayStatModel->setName($name[$insertIdx]);
					$replayStatModel->setHeroId($heroId[$insertIdx]);
					$replayStatModel->setLevel($level[$insertIdx]);
					$replayStatModel->setKill($kill[$insertIdx]);
					$replayStatModel->setDie($die[$insertIdx]);
					$replayStatModel->setAssist($assist[$insertIdx]);
					$replayStatModel->setGold($gold[$insertIdx]);
					$replayStatModel->setLastshot($lastshot[$insertIdx]);
					$replayStatModel->setDenie($denie[$insertIdx]);
					$replayStatModel->setXpm($xpm[$insertIdx]);
					$replayStatModel->setGpm($gpm[$insertIdx]);
					$replayStatModel->setItemId($item[$insertIdx]);
					$replayStatMapper->save($replayStatModel);
				}
			}
		}
		/* End Stat Replay */
		
	}
}