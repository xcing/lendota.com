<?php

class UserController extends Zend_Controller_Action
{
	
	public $_INPUT_USERNAME_AND_PASSWORD = 'กรุณาใส่ username และ password';
	public $_WRONG_USERNAME_OR_PASSWORD = 'Username หรือ Password ไม่ถูกต้อง<br />กรุณาลองใหม่อีกครั้ง';
	public $_PASSWORD_AND_CONFIRM_PASSWORD_NOT_MATCHED = 'Password และ Confirm password ไม่ตรงกัน';
	public $_USERNAME_ALREADY_EXISTED = 'Username นี้ได้ถูกใช้แล้ว';
	public $_EMAIL_ALREADY_EXISTED = 'Email นี้ได้ถูกใช้แล้ว';
	public $_ACCOUNT_NOT_ACTIVATED = 'User ของคุณยังไม่ถูกเปิดใช้งาน<br />
									    กรุณาทำการยืนยัน account จาก email ที่ได้ทำการลงทะเบียนไว้<br />
									  ( mail อาจจะเข้าไปอยู่ใน junk )<br />
									    หากไม่ได้รับ email สามารถแจ้งได้ <a class="underline" href="/contact">ที่นี่</a>';
	public $_USERNAME_VALID = 'Username นี้สามารถใช้ได้';
	public $_EMAIL_VALID = 'Email นี้สามารถใช้ได้';
	
	
	public function init()
	{
		//$this->view->homeSelected = 'selected';
	}
	
	public function indexAction()
	{
		/* top 5 replay
		$replayMapper = new Application_Model_ReplayMapper();
		$this->view->replays = $replayMapper->getTopDownloadLastMonth(
		    Application_Model_Replay::TOP_REPLAY_AMOUNT
	    );
	    */
		$advertiseMapper = new Application_Model_AdvertiseMapper();
		$advertisesBR = $advertiseMapper->fetchAll('position = 2 AND active = 1'); // bottom right
	    //shuffle($advertisesBR);
	    $this->view->advertisesBR = $advertisesBR;
	    
	    $advertisesTour = $advertiseMapper->find(7); // top right
	    $this->view->advertisesTour = $advertisesTour;
	    
	    $advertisesStore = $advertiseMapper->find(8); // top right
	    $this->view->advertisesStore = $advertisesStore;
	    
	    $equipmentMapper = new Application_Model_EquipmentMapper();
	    $bundles = $equipmentMapper->fetchAll('type = 1', '1 DESC', 10);
	    $this->view->bundles = $bundles;
	    
	    if(Eaglet_Utils_Bilingual::isThaiLang())
	    	$language = 'TH';
	    else
	    	$language = 'EN';
	    $this->view->language = $language;
	    
	    $streamMapper = new Application_Model_StreamMapper();
	    $where = 'live = 1';
	    if(isset(Zend_Auth::getInstance()->getStorage()->read()->userId)){
	    	$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
	    }
	    else{
	    	$userId = 0;
	    }
	    if(Zend_Auth::getInstance()->getStorage()->read()->rankId == 1)
	    	$where = '1=1';
	    else
	    	$where .= ' OR ownerId = '.$userId;
	    	
	    $streams = $streamMapper->fetchAll($where);
	    $this->view->streams = $streams;
	}
	
	public function changelangAction()
	{
		$request = $this->getRequest();
		if($request->getParam('lang')){
			$lang = Eaglet_Utils_Bilingual::THAI_LANG;
		}
		else{
			$lang = Eaglet_Utils_Bilingual::ENG_LANG;
		}
		Eaglet_Utils_Bilingual::setUserDefaultLanguage($lang);
		$this->_redirect($request->getParam('referredUri'));
	}
	public function loginAction() {
		if ($this->getRequest()->isPost()) {
			$email = $this->_request->getParam('email');
			$password = $this->_request->getParam('password');
			if (empty($email) || empty($password)) {
	
			}
			else {
				$userMapper = new Application_Model_UserMapper();
				$user = $userMapper->findByEmail($email);
				if ($user->getEmail() && $user->getPassword() == Eaglet_Utils_Password::encode($password)) {
					Eaglet_Utils_Auth::login($userMapper->getDbTable()->getAdapter(), $email, $password);
					if ($this->_request->getParam('rememberMe')) {
						Eaglet_Utils_Auth::addRememberMeCookie($email, $password);
					}
				} else {
					$this->_helper->FlashMessenger('Email หรือ Password ไม่ถูกต้องกรุณาใส่ใหม่อีกครั้ง');
					$this->_redirect($this->_request->getParam('referredUri'));
				}
				$this->_redirect($this->_request->getParam('referredUri'));
			}
		} else {
			$this->_redirect($this->_request->getParam('referredUri'));
		}
	}
	public function logoutAction()
    {
		Eaglet_Utils_Auth::logout();
		$request = $this->getRequest();
		$this->_redirect('/store/index');
        //$this->_redirect($request->getParam('referredUri'));
    }
    
    
    public function editadvertiseAction()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity() && (Zend_Auth::getInstance()->getStorage()->read()->rankId == 1)){
    		$this->_redirect('/index');
    	}
    	$request = $this->getRequest();
    	$advertiseId = $request->getParam('advertiseId');
    	$advertiseMapper = new Application_Model_AdvertiseMapper();
    	$advertise = $advertiseMapper->find($advertiseId);
    	
    	$this->view->advertise = $advertise;
    }
    public function updateadvertiseAction()
    {
    	if(!Zend_Auth::getInstance()->hasIdentity() && (Zend_Auth::getInstance()->getStorage()->read()->rankId == 1)){
    		$this->_redirect('/index');
    	}
    	$request = $this->getRequest();
    	$data = $request->getParam('data');
    	$advertiseMapper = new Application_Model_AdvertiseMapper();
    	$advertise = $advertiseMapper->find($data['advertiseId']);
    	
    	if ($request->isPost()) {
    		if(!isset($data['active'])){
    			$data['active'] = 0;
    		}
    		$deleteClick = $request->getParam('deleteClick');
    		if(isset($deleteClick)){
    			$data['click'] = 0;
    		}
    		
    		$realpath = '/images/adver/';
    		$basepath = 'images/adver/';
    		$newname = $basepath . $_FILES['data']['name']["image"];
    		if ((move_uploaded_file($_FILES['data']['tmp_name']["image"], $newname))) {
    			$data['image'] = $realpath . $_FILES['data']['name']["image"];
    			$oldPicture = substr($advertise->image, 1);
    			unlink($oldPicture);
    		}
    		else{
    			$data['image'] = $advertise->image;
    		}
    
    		$advertiseMapper->update($data);
    
    		$this->_redirect('/index');
    	}
    }
    public function counteradvertiseAction()
    {
    	$request = $this->getRequest();
    	$advertiseId = $request->getParam('advertiseId');
    
    	$advertiseMapper = new Application_Model_AdvertiseMapper();
    	$url = $advertiseMapper->plusplus($advertiseId);
    
    	$this->_redirect($url);
    }
    public function editstreamAction()
    {
    	$request = $this->getRequest();
    	$streamId = $request->getParam('streamId');
    	$streamMapper = new Application_Model_StreamMapper();
    	$stream = $streamMapper->find($streamId);
    	if(!Zend_Auth::getInstance()->hasIdentity() && (Zend_Auth::getInstance()->getStorage()->read()->rankId == 1 || Zend_Auth::getInstance()->getStorage()->read()->userId != $stream->ownerId)){
    		$this->_redirect('/index');
    	}
    	$this->view->stream = $stream;
    }
    public function updatestreamAction()
    {
    	$request = $this->getRequest();
    	$data = $request->getParam('data');
    	$streamMapper = new Application_Model_StreamMapper();
    	$stream = $streamMapper->find($data['streamId']);
    	if(!Zend_Auth::getInstance()->hasIdentity() && (Zend_Auth::getInstance()->getStorage()->read()->rankId == 1 || Zend_Auth::getInstance()->getStorage()->read()->userId != $stream->ownerId)){
    		$this->_redirect('/index');
    	}
    	if ($request->isPost()) {
    		if(!isset($data['live'])){
    			$data['live'] = 0;
    		}
    		
    		$realpath = '/images/stream/';
    		$basepath = 'images/stream/';
    		$uniqueID = time();
    		$newname = $basepath . 'a' .$uniqueID . $_FILES['data']['name']["image"];
    		if ((move_uploaded_file($_FILES['data']['tmp_name']["image"], $newname))) {
    			$data['image'] = $realpath . 'a' .$uniqueID . $_FILES['data']['name']["image"];
    			$oldPicture = substr($stream->image, 1);
    			unlink($oldPicture);
    		}
    		else{
    			$data['image'] = $stream->image;
    		}
    		
    		$streamMapper->update($data);
    	
    		$this->_redirect('/index');
    	}
    }
    public function counterstreamAction()
    {
    	$request = $this->getRequest();
    	$streamId = $request->getParam('streamId');
    
    	$streamMapper = new Application_Model_StreamMapper();
    	$url = $streamMapper->plusplus($streamId);
    
    	$this->_redirect($url);
    }
    public function signupAction()  
    {
    	
    		$this->view->mode = 'create';
	        $form = new Application_Form_SignUp();
	        $this->view->form = $form;
            if ($this->_request->getParam('register') && $form->isValid($_POST)) {
                $data = $form->getValues();
                if ($data['password'] != $data['confirmPassword']) {
                    $this->view->errorMessage = $this->_PASSWORD_AND_CONFIRM_PASSWORD_NOT_MATCHED;
                    return;
                }
		    	$userMapper = new Application_Model_UserMapper();
                if ($userMapper->findByEmail($data['email'])->getEmail()) {
                	$this->view->errorMessage = $this->_EMAIL_ALREADY_EXISTED;
                    return;
                }
                $password = $data['password'];
                $data['password'] = Eaglet_Utils_Password::encode($data['password']);
                unset($data['confirmPassword']);
                unset($data['ReCaptcha']);
                $data['rankId'] = 2;
                
                $userMapper->insert($data);
                
                $result = 'ยินดีต้อนรับเข้าสู่เว็บ lendota.com <br> user ของคุณสามารถ login ได้แล้วครับ';
		    	$this->_helper->FlashMessenger($result);
		    	
                $this->_redirect('/store/index');
            }
    }
    /*
    public function validateusernameAction()  // not use
    {
    	$this->_helper->viewRenderer->setNoRender();
    	$this->_helper->layout->disableLayout();
    	$userMapper = new Application_Model_UserMapper();
    	if ($userMapper->findByUsername($this->getRequest()->getParam('username'))->getUsername()) {
    		echo '<span class="errorMsg"><br />' . $this->_USERNAME_ALREADY_EXISTED . '</span>';
        } else {
        	echo '<span class="successMsg"><br />' . $this->_USERNAME_VALID . '</span>';
        }
    }
    */
    public function validatemailAction()
    {
    	$this->_helper->viewRenderer->setNoRender();
    	$this->_helper->layout->disableLayout();
    	$userMapper = new Application_Model_UserMapper();
    	if ($userMapper->findByEmail($this->getRequest()->getParam('email'))->getEmail()) {
    		echo '<span class="errorMsg"><br />' . $this->_EMAIL_ALREADY_EXISTED . '</span>';
        } else {
        	echo '<span class="successMsg"><br />' . $this->_EMAIL_VALID . '</span>';
        }
    }
    
    
    
	public function forgetpassAction(){  // not use
		$request = $this->getRequest();
    	$mode = $request->getParam('mode');
    	if($mode ==''){
    		$mode = 'normal';
    	}
    	$this->view->mode = $mode;
    	
    	if($mode == 'sendmail'){
    		$mail = $request->getParam('email');
    		
    		$user = new Application_Model_UserMapper();
    		$user_data = $user->findByEmail($mail);
    		
    		$subject = Eaglet_Utils_Message::getMessage('forgetpass_subject');
    		$body = Eaglet_Utils_Message::getMessage('forgetpass_body', 
					    		array(
					    			'[firstname]' => $user_data->firstname,
					    			'[lastname]' => $user_data->lastname,
					    			'[username]' => $user_data->username,
					    			'[password]' => Eaglet_Utils_Password::decode($user_data->password),
					    			'[site]' => 'www.allcen.com'
				    			));
			$resultMessage = Eaglet_Utils_Message::getMessage('forgetpass_result_message');
    		
    		$mailUtil = new Eaglet_Utils_Mail();
		    $result = $mailUtil->sendMail($mail, $subject, $body, $resultMessage);
		    return $this->_redirect('/index/message/message/ข้อมูล username password ของท่านจะถูกส่งไปที่ Email');
    	}
    	///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	/*
	public function activateuserAction(){  // not use
		//return $this->_redirect('/index');
		$request = $this->getRequest();
    	$userEncode = $request->getParam('user');
    	$username = Eaglet_Utils_Password::decode($userEncode);
    	
    	$user = new Application_Model_UserMapper();
    	$userId = $user->findByUsername($username)->getId();
    	if(!empty($userId)){
    		$user->activateUser($userId);
    		return $this->_redirect('/index');
    	}
	}
	*/
	public function edituserAction(){ 
		
		if (Zend_Auth::getInstance()->hasIdentity()) {
			$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
			$orderMapper = new Application_Model_OrderMapper();
			$detailorderMapper = new Application_Model_DetailorderMapper();
		
			$cart = $orderMapper->findByUserId($userId);
			if($cart->orderId != 0){
				$notiCart = $detailorderMapper->findNotiByOrderId($cart->orderId);
				$this->view->notiCart = $notiCart;
			}
			else{
				$this->view->notiCart = 0;
			}
		
			$notiOrder = $orderMapper->findNotiByUserId($userId);
			$this->view->notiOrder = $notiOrder;
		}
		
		$user = new Application_Model_UserMapper();
		$form    = new Application_Form_EditUser();
		
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		
		$user_data = $user->find($userId);
		
		$form->getElement('userId')->setValue($user_data->getUserId());
		$form->getElement('steamName')->setValue($user_data->getSteamName());
		$this->view->form = $form;
		
		if ($this->_request->getParam('register') && $form->isValid($_POST)) {
			$data = $form->getValues();
			$user_data = $user->find($data['userId']);
			//Zend_Debug::dump($user_data);exit;
			$oldPassword = $user_data->getPassword();
			$password = Eaglet_Utils_Password::decode($oldPassword);
			if($password == $data['oldPassword'] || $data['oldPassword'] == ''){
				if($data['oldPassword'] == '' && $data['password'] != ''){
					$this->view->errorMessage = "กรุณาใส่ Old Password ด้วยครับ";
                	return;
				}
				if($data['oldPassword'] != '' && $data['password'] == ''){
					$this->view->errorMessage = "กรุณาใส่ New Password ด้วยครับ";
                	return;
				}
				if ($data['password'] != $data['confirmPassword']) {
                    $this->view->errorMessage = $this->_PASSWORD_AND_CONFIRM_PASSWORD_NOT_MATCHED;
                    return;
                }
                
	            //$user_data = new Application_Model_User($form->getValues());
	            if($data['oldPassword'] == ''){
                	$user_data->setPassword($oldPassword);
                }
	            else{
	            	$user_data->setPassword(Eaglet_Utils_Password::encode($data['password']));
	            }
	            $user_data->setSteamName($data['steamName']);
	            Zend_Auth::getInstance()->getStorage()->read()->steamName = $data['steamName'];
	            $user->save($user_data);
	            return $this->_redirect('/user/edituser');
	            
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
	/*
	public function createclanAction(){  // not use
		
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');	
		}
		
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		$request = $this->getRequest();
		$mode = $request->getParam('mode');
		
		
		$realpath = '/images/iconClan/';
		$uniqueID = time();
		
		if($mode =='create'){
			
			require_once('resources/php/SimpleImage.php');
			
			$member1 = $request->getParam('member1');
			$member2 = $request->getParam('member2');
			$member3 = $request->getParam('member3');
			$member4 = $request->getParam('member4');
			$tag = $request->getParam('tag');
			$name = $request->getParam('name');
			$icon = $realpath.'a'.$uniqueID.$_FILES["icon"]["name"];
			$description = $request->getParam('description');
			
			//insert clan
			$clan = new Application_Model_ClanMapper();
			$clan_data = new Application_Model_Clan();
			$clan_data->setClanName($name);
			$clan_data->setClanTag($tag);
			$clan_data->setChieftainId($userId);
			$clan_data->setAmount(1);
			$clan_data->setClanImg($icon);
			$clan_data->setDescription($description);
			$clan_data->setClanActive(0);
			$clan->save($clan_data);
			
			$clan_data = $clan->findByTag($tag);
			$clanId = $clan_data->getId();
			
			//update clanId user
			$user = new Application_Model_UserMapper();
			$user->accessClan($userId, $clanId);
			$user->accessChieftain($userId);
			$userSession = Zend_Auth::getInstance()->getStorage()->read();
    		$userSession->clanId = $clanId;
    		$userSession->rankClanId = 1;
			
			$userId = $user->findByUsername($member1)->getId();
			$user->accessClan($userId, $clanId);
			$userId = $user->findByUsername($member2)->getId();
			$user->accessClan($userId, $clanId);
			$userId = $user->findByUsername($member3)->getId();
			$user->accessClan($userId, $clanId);
			$userId = $user->findByUsername($member4)->getId();
			$user->accessClan($userId, $clanId);
			
			$basepath = 'images/iconClan/';
			
			
			if($_FILES["icon"]["error"] == 0 ){
			    //////////////// move file //////////////////////
			    if ($_FILES["icon"]["error"] > 0){
			        //echo "Return Code: " . $_FILES["icon"]["error"] . "<br>";
			    }
			    else{
			        //echo "Upload: " . $_FILES["icon"]["name"] . "<br>";
			        //echo "Type: " . $_FILES["icon"]["type"] . "<br>";
			        //echo "Size: " . ($_FILES["icon"]["size"] / 1024) . " Kb<br>";
			        //echo "Temp file: " . $_FILES["icon"]["tmp_name"] . "<br>";
			        if (file_exists($realpath . $_FILES["icon"]["name"])){
			            //echo $_FILES["icon"]["name"] . " already exists. ";
			        }
			        else{
			            move_uploaded_file($_FILES["icon"]["tmp_name"],$basepath . $uniqueID . $_FILES["icon"]["name"]);
			            //echo "Stored in: " . $realpath . $_FILES["icon"]["name"];
			            
			            $image = new SimpleImage();
					    $image->load($basepath . $uniqueID . $_FILES["icon"]["name"]);
					    $image->resize(20,20);
					    $image->save($basepath . 'a' .$uniqueID . $_FILES["icon"]["name"]);
					    
					    unlink($basepath . $uniqueID . $_FILES["icon"]["name"]);
			        }
					
			    }
			}
			return $this->_redirect('/index/message/message/Clan จะสามารถใช้งานได้เมื่อ เพื่อนของคุณ 4 คน ตอบรับเข้า Clan ครบทั้ง 4 คน');
		}
		///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	public function checkuserclanAction(){  // not use
		
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$request = $this->getRequest();
    	$username = $request->getParam('username');
    	$index = $request->getParam('index');
    	
    	$user = new Application_Model_UserMapper();
    	$user_data = $user->findByUsername($username);
    	$userId = $user_data->getId();
    	$clanId = $user_data->getClanId();
    	$active = $user_data->getActive();
    	
    	
    	if(empty($userId)){
    		$message = '<span id="user'.$index.'" name="user'.$index.'" style="color:red;">';
    		$message .= 'ไม่พบ username '.$username;
    		$message .= '</span>';
    	}
    	else if($active == 0){
    		$message = '<span id="user'.$index.'" name="user'.$index.'" style="color:red;">';
    		$message .= 'username นี้ยังไม่ได้ยืนยันตัวตนที่ Email';
    		$message .= '</span>';
    	}
    	else if($clanId == 0){
    		$message = '<span id="user'.$index.'" name="user'.$index.'" style="color:green;">';
    		$message .= $this->_USERNAME_VALID;
    		$message .= '</span>';
    	}
    	else{
    		$message = '<span id="user'.$index.'" name="user'.$index.'" style="color:red;">';
    		$message .= 'username นี้มี clan อยู่แล้ว';
    		$message .= '</span>';
    	}
    	
		echo $message;
    	
	}
	
	public function checktagclanAction(){  // not use
		
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
		
		$request = $this->getRequest();
    	$tag = $request->getParam('tag');
    	
    	$clan = new Application_Model_ClanMapper();
    	$clan_data = $clan->findByTag($tag);
    	$clanName = $clan_data->getClanName();
    	
    	if(!empty($clanName)){
    		$message = '<span id="errorTag" name="errorTag" style="color:red;">';
    		$message .= 'ชื่อ Tag นี้มีคนใช้แล้ว';
    		$message .= '</span>';
    	}
    	else{
    		$message = '<span id="errorTag" name="errorTag" style="color:green;">';
    		$message .= 'ชื่อ Tag นี้สามารถใช้ได้';
    		$message .= '</span>';
    	}
    	
		echo $message;
    	
	}
	
	public function myclanAction(){  // not use
		
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			return $this->_redirect('/index');	
		}
		
		fopen('chat/txt/chatlog'.Zend_Auth::getInstance()->getStorage()->read()->clanId.'.txt', 'a');
		
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		$this->view->userId = $userId;
		$user_data = new Application_Model_User();
		$user = new Application_Model_UserMapper();
		
		$request = $this->getRequest();
    	$mode = $request->getParam('mode');
    	
		$user->find($userId, $user_data);
		$this->view->userRankClanId = $user_data->getRankClanId();
		$this->view->username = $user_data->getUsername();
		$clanId = $user_data->getClanId();
		$clan = new Application_Model_ClanMapper();
		$clan_data = new Application_Model_Clan();
		
		if($mode == 'demote'){
			$id = $request->getParam('userId');
    		$user->demote($id);
    	}
    	else if($mode == 'promote'){
    		$id = $request->getParam('userId');
    		$user->promote($id);
    	}
    	else if($mode == 'delete'){
    		$id = $request->getParam('userId');
    		$user->leaveClan($id);
    	}
    	else if($mode == 'changeChieftain'){
    		$id = $request->getParam('userId');
    		$user->changeChieftain($id, $userId);
    		$userSession = Zend_Auth::getInstance()->getStorage()->read();
    		$userSession->rankClanId = '2';
    		$this->view->userRankClanId = '2';
    	}
    	else if($mode == 'invite'){
			$member1 = $request->getParam('member1');
			
			$userId = $user->findByUsername($member1)->getId();
			$user->accessClan($userId, $clanId);

			return $this->_redirect('/index/message/message/เพื่อนของคุณจะเป็นสมาชิก Clan เมื่อเค้ากดตอบรับการเข้าแคลนที่หน้าเว็บ');
		}
		else if($mode == 'updateDes'){
			$description = $request->getParam('description');
			$clan->editDescription($clanId, $description);
		}
		else if($mode == 'updateImg'){
			
			require_once('resources/php/SimpleImage.php');
			
			
			$realpath = '/images/iconClan/';
			$uniqueID = time();
			$icon = $realpath.'a'.$uniqueID.$_FILES["icon"]["name"];
			
			$basepath = 'images/iconClan/';

			if($_FILES["icon"]["error"] == 0 ){
			    //////////////// move file //////////////////////
			    if ($_FILES["icon"]["error"] > 0){
			        //echo "Return Code: " . $_FILES["icon"]["error"] . "<br>";
			    }
			    else{
			        //echo "Upload: " . $_FILES["icon"]["name"] . "<br>";
			        //echo "Type: " . $_FILES["icon"]["type"] . "<br>";
			        //echo "Size: " . ($_FILES["icon"]["size"] / 1024) . " Kb<br>";
			        //echo "Temp file: " . $_FILES["icon"]["tmp_name"] . "<br>";
			        if (file_exists($realpath . $_FILES["icon"]["name"])){
			            //echo $_FILES["icon"]["name"] . " already exists. ";
			        }
			        else{
			            move_uploaded_file($_FILES["icon"]["tmp_name"],$basepath . $uniqueID . $_FILES["icon"]["name"]);
			            //echo "Stored in: " . $realpath . $_FILES["icon"]["name"];
			            
			            $image = new SimpleImage();
					    $image->load($basepath . $uniqueID . $_FILES["icon"]["name"]);
					    $image->resize(20,20);
					    $image->save($basepath . 'a' .$uniqueID . $_FILES["icon"]["name"]);
			        }
					
			    }
			}
			
			$clan->find($clanId, $clan_data);
			$clanImg = $clan_data->getClanImg();
			$imageClan = substr($clanImg, 1);
			unlink($imageClan);   //delete old file
			
			
			$clan->editImage($clanId, $icon);
			unlink($basepath . $uniqueID . $_FILES["icon"]["name"]);
		}
		
		
		
		$clan->find($clanId, $clan_data);
		$this->view->clanData = $clan_data;
		
		$user_data = $user->fetchAll('clanId = '.$clanId.' and rankClanId <> 0', 'rankClanId');
		$this->view->userData = $user_data;
		
		///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	public function closeclanAction(){  // not use
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		$user_data = new Application_Model_User();
		$user = new Application_Model_UserMapper();
		
		$user->find($userId, $user_data);
		$clanId = $user_data->getClanId();
		
		$clan = new Application_Model_ClanMapper();

    	$user->leaveClan($userId);
    	$user->closeClan($clanId);
    	$userSession = Zend_Auth::getInstance()->getStorage()->read();
    	$userSession->clanId = '0';
    	$userSession->rankClanId = '0';
    	$clan->delete($clanId);
    	return $this->_redirect('/index');

	}
	public function leaveclanAction(){  // not use
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		$user_data = new Application_Model_User();
		$user = new Application_Model_UserMapper();
		
		$clanId = Zend_Auth::getInstance()->getStorage()->read()->clanId;
		$clan = new Application_Model_ClanMapper();
		$clan->plusplus($clanId, 'amount', true);
		
		$user->leaveClan($userId);
    	$userSession = Zend_Auth::getInstance()->getStorage()->read();
    	$userSession->clanId = '0';
    	$userSession->rankClanId = '0';
    	return $this->_redirect('/index');

	}
	public function accessclanAction(){  // not use
		
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		$user_data = new Application_Model_User();
		$user = new Application_Model_UserMapper();
		
		$user->find($userId, $user_data);
		$clanId = $user_data->getClanId();
		
		$clan_data = new Application_Model_Clan();
		$clan = new Application_Model_ClanMapper();
		
		$request = $this->getRequest();
    	$agree = $request->getParam('agree');
    	if($agree == 'yes'){
    		$user->acceptClan($userId);
    		$clan->plusplus($clanId, 'amount', false);
    		$userSession = Zend_Auth::getInstance()->getStorage()->read();
    		$userSession->rankClanId = '3';
    		return $this->_redirect('/index');
    	}
    	else if($agree == 'no'){
    		$user->denyClan($userId);
    		$userSession = Zend_Auth::getInstance()->getStorage()->read();
    		$userSession->clanId = '0';
    		return $this->_redirect('/index');
    	}
		
		
		
		
		
		$clan->find($clanId, $clan_data);
		$this->view->clanTag = $clan_data->getClanTag();
		
		$chieftainId = $clan_data->getChieftainId();
		$user->find($chieftainId, $user_data);
		
		$this->view->usernameChieftain = $user_data->getUsername();
		
		///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'user');
	}
	public function messageAction(){  // not use
		$request = $this->getRequest();
    	$message = $request->getParam('message');
    	$this->view->message = $message;
    	
    	///////////////////// login and advertising ///////////////////////
        $this->_helper->actionStack('index', 'adminlendota');
	}
	*/
}