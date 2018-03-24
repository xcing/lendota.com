<?php
class TournamentController extends Zend_Controller_Action
{
	public $_WIDTH_LOGO = 120;
	public $_HEIGHT_LOGO = 120;
	private $_LIMIT_NEWS = 15;
	private $_PAGE_RANGE = 5;
	private $_LIMIT_NEWS_RELATE = 5;

	public function init()
	{
		$this->view->tournamentSelected = 'selected';
	}
	public function indexAction()
	{
		$request = $this->getRequest();
		$register = $request->getParam('register');
		if($register == 'registeam'){
			$errorMessage = $this->view->translate('TOURNAMENT_REGISTER_SUCCESS');
			$this->view->errorMessage = $errorMessage;
		}
		else if($register == 'registour'){
			$errorMessage = $this->view->translate('TOURNAMENT_REGISTER');
			$this->view->errorMessage = $errorMessage;
		}
		$tournamentMapper = new Application_Model_TournamentMapper();
		$tournaments = $tournamentMapper->fetchAll(null, 'tournamentId DESC');
		$this->view->tournaments = $tournaments;
		
		$teamMapper = new Application_Model_TeamMapper();
		$teamData = null;
		foreach ($tournaments as $tournament){
			if($tournament->active == 3)
				$teamData[$tournament->tournamentId] = $teamMapper->fetchAll('teamId = '.$tournament->champId);
			else
				$teamData[$tournament->tournamentId] = null;
		}
		$this->view->teamData = $teamData;
		$relateTourTeamMapper = new Application_Model_RelateTourTeamMapper();
		if(Application_Service_TeamService::getInstance()->hasIdentity()){
            $relateTourTeamData = null;
			foreach ($tournaments as $tournament){
				$relateTourTeamData[$tournament->tournamentId] = $relateTourTeamMapper->fetchAll('tournamentId = '.$tournament->tournamentId.' AND teamId = '.Application_Service_TeamService::getInstance()->getIdentity()->id);
			}
			$this->view->relateTourTeamData = $relateTourTeamData;
		}
		
		if(Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId == 1) {
			$amountTeam = array();
			foreach ($tournaments as $tournament){
				$amountTeam[] = count($relateTourTeamMapper->findListTeam($tournament->tournamentId));
			}
			$this->view->amountTeam = $amountTeam;
		}
	}
	public function createteamAction()
	{
		$form = new Application_Form_SignUpTeam();
		$this->view->form = $form;
		if ($this->_request->getParam('register') && $form->isValid($_POST)) {
			$data = $form->getValues();
			if ($data['password'] != $data['confirmPassword']) {
				$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_PASSWORD_AND_CONFIRM_PASSWORD_NOT_MATCHED');
				return;
			}
			$teamMapper = new Application_Model_TeamMapper();
			if ($teamMapper->findByShortName($data['shortName'])) {
				$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_SHORTNAME_ALREADY_EXISTED');
				return;
			}
			else if($teamMapper->findByEmail($data['email'])){
				$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_EMAIL_ALREADY_EXISTED');
				return;
			}
			$data['password'] = Eaglet_Utils_Password::encode($data['password']);
			unset($data['confirmPassword']);
			//unset($data['ReCaptcha']);
			$data['isAdmin'] = 0;
			
			$data['member'] = $data['member1'].'[--break--]'.$data['member2'].'[--break--]'.$data['member3'].'[--break--]'.$data['member4'].'[--break--]'.$data['member5'];
			if($data['member6'] != ''){
				$data['member'] .= '[--break--]'.$data['member6'];
			}
			if($data['member7'] != ''){
				$data['member'] .= '[--break--]'.$data['member7'];
			}
			
			for($i=1; $i<=7; $i++){
				unset($data['member'.$i]);
			}
			
			if($data['logo'] != ''){
				require_once('resources/php/SimpleImage.php');
			
				$realpath = '/images/logoTeam/';
				$uniqueID = time();
				$data['logo'] = $realpath.'a'.$uniqueID.$data['logo'];
			
				$basepath = 'images/logoTeam/';
			
				$image = new SimpleImage();
				$image->load($basepath . $_FILES["logo"]["name"]);
				$image->resize($this->_WIDTH_LOGO,$this->_HEIGHT_LOGO);
				$image->save($basepath . 'a' .$uniqueID . $_FILES["logo"]["name"]);
				unlink($basepath . $_FILES["logo"]["name"]);
			}
			else{
				$data['logo'] = '/images/logoTeam/unknown.jpg';
			}
			$data['score'] = 1800;
			$teamMapper->insert($data);
			
			$this->_redirect('/tournament/index/register/registeam');
		}
	}
	public function edituserteamAction(){
	
		$team_data = new Application_Model_Team();
		$team = new Application_Model_TeamMapper();
		$form    = new Application_Form_EditUserTeam();
	
		//$teamId = Zend_Auth::getInstance()->getStorage()->read()->userId;  MUST BENZ FIX
		$teamId = Application_Service_TeamService::getInstance()->getIdentity()->id;
	
		$team->find($teamId, $team_data);
	
		$members = explode('[--break--]', $team_data->member);
	
		$form->getElement('id')->setValue($team_data->getId());
		$form->getElement('name')->setValue($team_data->getName());
		$form->getElement('shortName')->setValue($team_data->getShortName());
		$form->getElement('password')->setValue($team_data->getPassword());
		foreach ($members as $index => $member){
			$index++;
			$form->getElement('member'.$index)->setValue($member);
		}
		$form->getElement('tel')->setValue($team_data->getTel());
		$form->getElement('email')->setValue($team_data->getEmail());
		$form->getElement('logo')->setValue($team_data->getLogo());
		$form->getElement('countryCode')->setValue($team_data->getCountryCode());
		$this->view->form = $form;
		
		if ($this->_request->getParam('register') && $form->isValid($_POST)) {
			$data = $form->getValues();
			$team->find($data['id'], $team_data);
			$oldPassword = $team_data->getPassword();
			//$name = $team_data->getName();
			//$shortName = $team_data->getShortName();
	
			//$email = $team_data->getEmail();
			$logo = $team_data->getLogo();
			$password = Eaglet_Utils_Password::decode($oldPassword);
			if($password == $data['oldPassword'] || $data['oldPassword'] == ''){
				if($data['oldPassword'] == '' && $data['password'] != ''){
					$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT')." Old Password";
					return;
				}
				if($data['oldPassword'] != '' && $data['password'] == ''){
					$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT')." New Password";
					return;
				}
				if ($data['password'] != $data['confirmPassword']) {
					$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_PASSWORD_AND_CONFIRM_PASSWORD_NOT_MATCHED');
					return;
				}
				
				$teamMapper = new Application_Model_TeamMapper();
				if ($team_data->shortName != $data['shortName'] && $teamMapper->findByShortName($data['shortName'])) {
					$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_SHORTNAME_ALREADY_EXISTED');
					return;
				}
				else if($team_data->email != $data['email'] && $teamMapper->findByEmail($data['email'])){
					$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_EMAIL_ALREADY_EXISTED');
					return;
				}
				$team_data = new Application_Model_Team($form->getValues());
	
				$member = $data['member1'].'[--break--]'.$data['member2'].'[--break--]'.$data['member3'].'[--break--]'.$data['member4'].'[--break--]'.$data['member5'];
				if($data['member6'] != ''){
					$member .= '[--break--]'.$data['member6'];
				}
				if($data['member7'] != ''){
					$member .= '[--break--]'.$data['member7'];
				}
	
				for($i=1; $i<=7; $i++){
					unset($data['member'.$i]);
				}
	
				$team_data->setMember($member);
	
				if($data['oldPassword'] == ''){
					$team_data->setPassword($oldPassword);
				}
				else{
					$team_data->setPassword(Eaglet_Utils_Password::encode($team_data->getPassword()));
				}
	
				if($data['logo'] != null){
					//Zend_Debug::dump($data['picture']);exit;
					require_once('resources/php/SimpleImage.php');
	
					$realpath = '/images/logoTeam/';
					$uniqueID = time();
	
					if($logo != '/images/logoTeam/unknown.jpg' && $logo != ''){
						$oldPicture = substr($logo, 1);
						unlink($oldPicture);
					}
					$team_data->setLogo($realpath.'a'.$uniqueID.$data['logo']);
	
					$basepath = 'images/logoTeam/';
	
					$image = new SimpleImage();
					$image->load($basepath . $_FILES["logo"]["name"]);
					$image->resize($this->_WIDTH_LOGO,$this->_HEIGHT_LOGO);
					$image->save($basepath . 'a' .$uniqueID . $_FILES["logo"]["name"]);
					unlink($basepath . $_FILES["logo"]["name"]);
				}
				else if($logo == ''){
					$team_data->setLogo('/images/logoTeam/unknown.jpg');
				}
				else{
					$team_data->setLogo($logo);
				}
				$team->editUserTeam($team_data);
				return $this->_redirect('/tournament/profileteam/teamId/'.$data['id']);
	
			}
			else{
				$this->view->errorMessage = "Old Password ไม่ถูกต้อง";
				return;
			}
		}
		else{
			$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_NOT_CHANGE_PASSWORD');
		}
	}
	public function loginteamAction()
	{
		if ($this->getRequest()->isPost()) {
        	$username = $this->_request->getParam('username');
        	$password = $this->_request->getParam('password');
        	$this->view->username = $username;
        	$this->view->password = $password;
        	if (empty($username)) {
        		$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_LOGIN_PLEASE_INPUT_USERNAME');
        		$this->_redirect($this->_request->getParam('referredUri'));
        	}
        	else if(empty($password)){
        		$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_LOGIN_PLEASE_INPUT_PASSWORD');
        		$this->_redirect($this->_request->getParam('referredUri'));
        	}
        	else {
        		$teamMapper = new Application_Model_TeamMapper();
        		$team = $teamMapper->findByShortName($username);
        		if($team == null){
        			$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_LOGIN_WRONG_USERNAME');
        		}
        		else if ($team->getPassword() != Eaglet_Utils_Password::encode($password)) {
        			$this->view->errorMessage = $this->view->translate('TOURNAMENT_VALIDATE_LOGIN_WRONG_PASSWORD');
                } else {
                	// **NO NEED TO ACTIVATE BY MAIL?
                	//if ($team->isAccountActivated()) {
                	Application_Service_TeamService::getInstance()->setIdentity($team);
                	if ($this->_request->getParam('rememberMe')) {
                		Application_Service_TeamService::getInstance()->addRememberMeCookie($username, $password);
                	}
                	//} else {
                	//	$this->_helper->FlashMessenger($this->_ACCOUNT_NOT_ACTIVATED);
                	//}
        		}
				$this->_redirect($this->_request->getParam('referredUri'));
        	}
        }
	}
	public function logoutteamAction()
	{
		Application_Service_TeamService::getInstance()->logout();
		$this->_redirect($this->_request->getParam('referredUri'));
	}
	public function forgetpasswordAction()
	{
		
	}
	public function registertourAction()
	{
		$request = $this->getRequest();
		$data['teamId'] = $request->getParam('teamId');
		$data['tournamentId'] = $request->getParam('tournamentId');
		$relateTourTeamMapper = new Application_Model_RelateTourTeamMapper();
		$relateTourTeamMapper->insert($data);
		
		$this->_redirect('/tournament/index/register/registour');
		//Zend_Debug::dump($data);exit;
	}
	public function canceltourAction()
	{
		$request = $this->getRequest();
		$relateTourTeamMapper = new Application_Model_RelateTourTeamMapper();
		$relateTourTeamMapper->delete($request->getParam('tournamentId'), $request->getParam('teamId'));
		
		$this->_redirect('/tournament');
		//Zend_Debug::dump($data);exit;
	}
	public function viewlistteamAction()
	{
		$request = $this->getRequest();
		$tournamentId = $request->getParam('tournamentId');
		$tournamentMapper = new Application_Model_TournamentMapper();
		$tournament = $tournamentMapper->find($tournamentId);
		$this->view->tournament = $tournament;
		
		$relateTourTeamMapper = new Application_Model_RelateTourTeamMapper();
		$teams = $relateTourTeamMapper->findListTeam($tournamentId);
		$this->view->teams = $teams;
		
		//foreach ($teams as $index => $team){
		//	$members[$index] = explode('[--break--]', $team->member);
		//}
		//$this->view->members = $members;
	}
	public function profileteamAction()
	{
		$request = $this->getRequest();
		$teamId = $request->getParam('teamId');
		if(!Application_Service_TeamService::getInstance()->hasIdentity()){
			$this->view->isMyTeam = false;
		}
		else if($teamId != Application_Service_TeamService::getInstance()->getIdentity()->id){
			$this->view->isMyTeam = false;
		}
		else{
			$this->view->isMyTeam = true;
		}
		
		$team = new Application_Model_TeamMapper();
		$where = 'teamId = '.$teamId;
		$myTeam = $team->fetchAll($where);
		$this->view->myTeam = $myTeam;
		
		$stat = new Application_Model_StattourMapper();
		$data = $stat->findByTeam1Id($teamId);
		
		$member = explode('[--break--]', $myTeam[0]->member);
		//Zend_Debug::dump($member);exit;
		
		$this->view->member = $member;
		$this->view->data = $data;
	}
	public function resetpasswordAction()
	{
		$request = $this->getRequest();
		$teamId = $request->getParam('teamId');
		
		$teamMapper = new Application_Model_TeamMapper();
		$teamMapper->resetPassword($teamId);
		
		$this->_redirect('/tournament/profileteam/teamId/'.$teamId);
	}
	public function rankingAction()
	{
		$request = $this->getRequest();
		$teamMapper = new Application_Model_TeamMapper();
		$limit = $this->_LIMIT_NEWS;
		$this->view->limit = $limit;
		$page = $request->getParam('page', 1);
		$this->view->page = $page;
		$where = '(win != 0 OR lose != 0)';
		$orderBy = array('score DESC', 'win DESC', 'lose');
		$keyword = $request->getParam('keyword', '');
		if ($keyword != '') {
			$keyword = $request->getParam('keyword');
			$where .= ' AND shortName LIKE "%'.$keyword.'%" OR name LIKE "%'.$keyword.'%"';
			$teamsPaginator = $teamMapper->fetchAll($where,$orderBy);
			$searched = true;
		}
		else{
			$teamsPaginator = $teamMapper->findRanking(
					$where,
					$orderBy,
					$limit,
					$page,
					$this->_PAGE_RANGE);
			$searched = false;
		}
		$this->view->keyword = $keyword;
		$this->view->searched = $searched;
		$this->view->teamsPaginator = $teamsPaginator;
	}
	public function ruleAction()
	{
	
	}
	public function faqAction()
	{
	
	}
	public function howtouploadreplayAction()
	{
	
	}
	public function howtoviewreplayAction()
	{
	
	}
	public function createtournamentAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			return $this->_redirect('/tournament');
		}
		if ($this->getRequest()->isPost()) {
			$request = $this->getRequest();
			$data['name'] = $request->getParam('name');
			$data['picture'] = $request->getParam('picture');
			$data['startDate'] = $request->getParam('startDate');
			$data['deadlineDate'] = $request->getParam('deadlineDate');
			$data['award'] = $request->getParam('award');
			$data['gameAmount'] = $request->getParam('gameAmount');
			$data['finalGameAmount'] = $request->getParam('finalGameAmount');
			$data['type'] = $request->getParam('type');
			$data['active'] = 0;
            if ($request->getParam('thirdPlace')) {
                $data['thirdPlace'] = 1;
            } else {
                $data['thirdPlace'] = 0;
            }
			/*
			$realpath = '/images/tournament/';
			$uniqueID = time();
			
			$basepath = 'images/tournament/';
			$newname = $basepath. 'a' .$uniqueID . $_FILES["picture"]["name"];
			
			if ((move_uploaded_file($_FILES['picture']['tmp_name'], $newname))) {
				$data['picture'] = $realpath.'a'.$uniqueID.$_FILES["picture"]["name"];
			}
			else{
				$data['picture'] = '';
			}
			*/
			$tournamentMapper = new Application_Model_TournamentMapper();
			$tournamentMapper->insert($data);
			
			$this->_redirect('/tournament');
		}
	}
	public function edittournamentAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			return $this->_redirect('/tournament');
		}
		$request = $this->getRequest();
		if ($this->getRequest()->isPost()) {
			$tournamentMapper = new Application_Model_TournamentMapper();
			$tournamentModel = $tournamentMapper->find($request->getParam('tournamentId'));
			$tournamentModel->setName($request->getParam('name'));
			$tournamentModel->setPicture($request->getParam('picture'));
			$tournamentModel->setStartDate($request->getParam('startDate'));
			$tournamentModel->setDeadlineDate($request->getParam('deadlineDate'));
			$tournamentModel->setAward($request->getParam('award'));
			$tournamentModel->setGameAmount($request->getParam('gameAmount'));
			$tournamentModel->setFinalGameAmount($request->getParam('finalGameAmount'));
			$tournamentModel->setType($request->getParam('type'));
			$tournamentModel->setActive($request->getParam('active'));
			/*
			$realpath = '/images/tournament/';
			$uniqueID = time();
	
			$basepath = 'images/tournament/';
			$newname = $basepath. 'a' .$uniqueID . $_FILES["picture"]["name"];
	
			if (is_uploaded_file($_FILES['picture']['tmp_name'])) {
				if ((move_uploaded_file($_FILES['picture']['tmp_name'], $newname))) {
					$data['picture'] = $realpath.'a'.$uniqueID.$_FILES["picture"]["name"];
					$tournamentModel->setPicture($data['picture'] );
				}
			}
			*/
			$tournamentMapper->save($tournamentModel);
	
			$this->_redirect('/tournament');
		}
		else{
			$tournamentId = $request->getParam('tournamentId');
			
			$tournamentMapper = new Application_Model_TournamentMapper();
			$tournament = $tournamentMapper->find($tournamentId);
			$this->view->tournament = $tournament;
		}
	}
	public function gentourAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			return $this->_redirect('/tournament');
		}
		$request = $this->getRequest();
		$tournamentId = $request->getParam('tournamentId');
		$tournamentService = new Application_Service_TournamentService();
		$tournamentService->generateTournamentBracket($tournamentId);
		
		$tournamentMapper = new Application_Model_TournamentMapper();
		$tournamentMapper->editActive($tournamentId, 1);
		
		$this->_redirect('/tournament/schedule/tournamentId/'.$tournamentId);
	}
	
	public function showscheduleAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() || !Eaglet_Utils_Auth::isAdmin()) {
			return $this->_redirect('/tournament');
		}
		
		$tournamentId = $this->_getParam('tournamentId');
		
		$tournamentMapper = new Application_Model_TournamentMapper();
		$tournamentMapper->editActive($tournamentId, 2);
		
		$this->_redirect('/tournament/schedule/tournamentId/'.$tournamentId);
	}


	public function scheduleAction()
	{
		$request = $this->getRequest();
        $tournamentId = $request->getParam('tournamentId');
        
        $tournamentService = new Application_Service_TournamentService();
		$tournament = $tournamentService->findTournament($tournamentId);
		
		if ($tournament->active == 1 && !Eaglet_Utils_Auth::isAdmin()) {
			return $this->_redirect('/tournament');
		}
		
        $this->view->tourData = $tournamentService->readTournamentData($tournamentId, $tournament);
		$this->view->tournament = $tournament;
		$this->view->roundSchedules = $tournamentService->getRoundSchedules($tournamentId);
	}
	
	public function matchAction()
	{
		$request = $this->getRequest();
		$matchId = $request->getParam('matchId');
		$this->view->matchId = $matchId;
		//$matchId = '2';
		$matchMapper = new Application_Model_MatchMapper();
		$match = $matchMapper->find($matchId);
		$this->view->match = $match;
		
		$team1 = new Application_Model_Team();
		$team2 = new Application_Model_Team();
		$teamMapper = new Application_Model_TeamMapper();
		
		$teamMapper->find($match->team1Id, $team1);
		$teamMapper->find($match->team2Id, $team2);
		$member1 = explode('[--break--]', $team1->member);
		$member2 = explode('[--break--]', $team2->member);
		$this->view->member1 = $member1;
		$this->view->member2 = $member2;
		$this->view->team1 = $team1;
		$this->view->team2 = $team2;
		
		$tournamentMapper = new Application_Model_TournamentMapper();
		$tournament = $tournamentMapper->find($match->tournamentId);
		$this->view->tournament = $tournament;
		
		$where = 'matchId = '.$matchId;
		$matchResultMapper = new Application_Model_MatchResultMapper();
		$matchResults = $matchResultMapper->fetchAll('matchId = '.$matchId);
		$this->view->matchResults = $matchResults;
		//Zend_Debug::dump($matchResults);exit;
		$appointmentMapper = new Application_Model_AppointmentMapper();
		
		$statMapper = new Application_Model_StattourMapper();
		$stat = $statMapper->findByTeamId($match->team1Id, $match->team2Id);
		//Zend_Debug::dump($stat);exit;
		if($stat == null){
			$stat = new Application_Model_Stattour();
			$stat->setWin(0);
			$stat->setLose(0);
		}
		$this->view->stat = $stat;
		
		$appointments = $appointmentMapper->findAppointment('matchId = '.$matchId);
		$this->view->appointments = $appointments;
		
		$tournamentService = new Application_Service_TournamentService();
		$roundSchedule = $tournamentService->findRoundSchedule($match->getTournamentId(), $match->getRound());
		if(isset($roundSchedule)){
			$this->view->roundSchedule = $roundSchedule;
		}
	}
	public function addcommentAction()
	{
		if ($this->getRequest()->isPost()) {
			$request = $this->getRequest();
			$appointmentMapper = new Application_Model_AppointmentMapper();
			$data['matchId'] = $request->getParam('matchId');
			$data['teamId'] = Application_Service_TeamService::getInstance()->getIdentity()->id;
			$data['detail'] = $request->getParam('detail');
			$data['date'] = date('Y-m-d H:i:s');
		
			$appointmentMapper->insert($data);
		}
		
		$this->_redirect('/tournament/match/matchId/'.$data['matchId']);
	}
	public function matchresultAction()
	{
		$request = $this->getRequest();
		$matchId = $request->getParam('matchId');
		$this->view->matchId = $matchId;
		$game = $request->getParam('game');
		$this->view->game = $game;
		$amount = $request->getParam('amount');
		$this->view->amount = $amount;
		$isFinalRound = $request->getParam('isFinalRound');
		$this->view->isFinalRound = $isFinalRound;
		
		$matchMapper = new Application_Model_MatchMapper();
		$match = $matchMapper->find($matchId);
		$this->view->match = $match;
		
		$team1 = new Application_Model_Team();
		$team2 = new Application_Model_Team();
		$teamMapper = new Application_Model_TeamMapper();
		
		$teamMapper->find($match->team1Id, $team1);
		$teamMapper->find($match->team2Id, $team2);
		$this->view->team1 = $team1;
		$this->view->team2 = $team2;
		
		if ($this->getRequest()->isPost()) {
			$data['result'] = $request->getParam('result');
			$data['matchId'] = $request->getParam('matchId');
			$data['game'] = $request->getParam('game');
            $data['screenshot'] = $this->parseScreenShot($request->getParam('screenshot'));
			$data['replay'] = '';
			
			if($match->result != ''){
				$this->_redirect('/tournament/match/matchId/'.$data['matchId']);
			}
			
			/*
			require_once('resources/php/SimpleImage.php');
			$realpath = '/images/tournament/result/';
			$uniqueID = time();
			
			$basepath = 'images/tournament/result/';
			$newname = $basepath. 'a' .$uniqueID . $_FILES["screenshot"]["name"];
			
			if ((move_uploaded_file($_FILES['screenshot']['tmp_name'], $newname))) {
				$data['screenshot'] = $realpath.'a'.$uniqueID.$_FILES["screenshot"]["name"];
			}
			else{
				$data['screenshot'] = '';
			}
			*/
			
			//insert result table matchResult
			$matchResultMapper = new Application_Model_MatchResultMapper();
			$matchResultMapper->insert($data);
			
			//edit score team
			if($data['result'] == 1){
				$teamWinId = $match->team1Id;
				$teamLoseId = $match->team2Id;
			}
			else{
				$teamWinId = $match->team2Id;
				$teamLoseId = $match->team1Id;
			}
			$teamMapper->editScore($teamWinId, $teamLoseId);
			
			//edit result table match
			$matchMapper = new Application_Model_MatchMapper();
			if($amount == 1){
				$matchMapper->editResult($data['matchId'], $data['result'], $isFinalRound);
			}
			else{
				$result = $matchResultMapper->checkResult($data['matchId'], $amount);
				//Zend_Debug::dump($result);exit;
				if($result != null){
					$matchMapper->editResult($data['matchId'], $result, $isFinalRound);
				}
			}
			
			
			$this->_redirect('/tournament/match/matchId/'.$data['matchId']);
		}
	}
    
    private function parseScreenShot($screenShot)
    {
        if (strpos($screenShot,'<img') !== false) {
            // html code case '<a href=""><img src="" /></a>'
            $doc = new DOMDocument();
            $doc->loadHTML($screenShot);
            $tags = $doc->getElementsByTagName('img');
            $screenShot = $tags->item(0)->getAttribute('src');
        } else if (strpos($screenShot,'[img]') !== false) {
            // bb code case [url][img]xxx[/img][/url]
            $ini = strpos($screenShot, '[img]');
            $ini += strlen('[img]');
            $len = strpos($screenShot, '[/img]', $ini) - $ini;
            $screenShot = substr($screenShot, $ini, $len);
        }
        return $screenShot;
    }
    
	public function cancelresultAction()
	{
		$request = $this->getRequest();
		$matchId = $request->getParam('matchId');
		$matchMapper = new Application_Model_MatchMapper();
		$match = $matchMapper->find($matchId);
		if($match->result == 1){
			$teamWin = $match->team1Id;
			$teamLose = $match->team2Id;
		}
		else if($match->result == 2){
			$teamWin = $match->team2Id;
			$teamLose = $match->team1Id;
		}
		
		// 1.table match -> result = 0, 2.remove teamWin from parentMatch
		$matchMapper->cancelResult($matchId, $match->parentId, $match->ordinal);

		$matchResultMapper = new Application_Model_MatchResultMapper();
		// 3.table matchresult -> delete row match
		$matchResultMapper->deleteByMatchId($matchId);
		
		if($match->result != 0){	
			// 4.revert score team, 5.revert stat tour
			$teamMapper = new Application_Model_TeamMapper();
			$teamMapper->cancelScore($teamWin, $teamLose);
		}
		else{ //(if bothLoseBye)
			$matchParent = $matchMapper->find($match->parentId);
			// 1.table match -> result = 0, 2.remove teamWin from parentMatch
			$matchMapper->cancelResult($match->parentId, $matchParent->parentId, $matchParent->ordinal);
			// 3.table matchresult -> delete row next match 
			$matchResultMapper->deleteByMatchId($match->parentId);
		}
		$this->_redirect('/tournament/match/matchId/'.$matchId);
	}
	public function editscreenshotAction()
	{
		$request = $this->getRequest();
		$matchResultId = $request->getParam('matchResultId');
		$matchResultMapper = new Application_Model_MatchResultMapper();
		$match = $matchResultMapper->find($matchResultId);
		$this->view->match = $match;
		if ($request->isPost()) {
			$screenshot = $this->parseScreenShot($request->getParam('screenshot'));
			$matchResultMapper->editScreenshot($matchResultId, $screenshot);
		
			$this->_redirect('/tournament/match/matchId/'.$match->matchId);
		}
	}
	public function addlinkdownloadreplayAction()
	{
		$request = $this->getRequest();
		$matchId = $request->getParam('matchId');
		$this->view->matchId = $matchId;
		$matchResultId = $request->getParam('matchResultId');
		$this->view->matchResultId = $matchResultId;
	
		$matchResultMapper = new Application_Model_MatchResultMapper();
	
		if ($request->isPost()) {
			$replay = $request->getParam('replay');
	
			//insert result table matchResult
			$matchResultMapper = new Application_Model_MatchResultMapper();
			$matchResultMapper->addlinkreplay($matchResultId, $replay);
	
			$this->_redirect('/tournament/match/matchId/'.$matchId);
		}
	}
	public function bothlosebyeAction()
	{
		$request = $this->getRequest();
		$matchId = $request->getParam('matchId');
		
		$matchMapper = new Application_Model_MatchMapper();
		$result = $matchMapper->bothLoseBye($matchId);
		
		$matchResultMapper = new Application_Model_MatchResultMapper();
		
		// this match
		$data['result'] = 0;
		$data['matchId'] = $matchId;
		$data['game'] = 1;
		$data['screenshot'] = '';
		$matchResultMapper->insert($data);
		
		// next match auto free won
		$data['result'] = $result[0];
		$data['matchId'] = $result[1];
		$data['game'] = 1;
		$data['screenshot'] = '';
		$matchResultMapper->insert($data);
		
		$this->_redirect('/tournament/match/matchId/'.$matchId);
	}
	/*
	public function checkteamnameAction(){
	
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	
		$request = $this->getRequest();
		$teamName = $request->getParam('teamname');
	
		$team = new Application_Model_TeamMapper();
		$team_data = $team->findName($teamName);
		if(!empty($team_data)){
			$message = '<span id="errorTeamName" name="errorTeamName" style="color:red;">';
			$message .= 'ชื่อทีม นี้มีคนใช้แล้ว';
			$message .= '</span>';
		}
		else{
			$message = '<span id="errorTeamName" name="errorTeamName" style="color:green;">';
			$message .= 'ชื่อทีม นี้สามารถใช้ได้';
			$message .= '</span>';
		}
		echo $message;
	
	}
	public function checkteamshortnameAction(){
	
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	
		$request = $this->getRequest();
		$teamShortName = $request->getParam('teamshortname');
	
		$team = new Application_Model_TeamMapper();
		$team_data = $team->findShortName($teamShortName);
		if(!empty($team_data)){
			$message = '<span id="errorTeamShortName" name="errorTeamShortName" style="color:red;">';
			$message .= 'ชื่อย่อ นี้มีคนใช้แล้ว';
			$message .= '</span>';
		}
		else{
			$message = '<span id="errorTeamShortName" name="errorTeamShortName" style="color:green;">';
			$message .= 'ชื่อย่อ นี้สามารถใช้ได้';
			$message .= '</span>';
		}
		echo $message;
	
	}
	*/
}