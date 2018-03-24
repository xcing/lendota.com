<?php

class StoreController extends Zend_Controller_Action {
	
	private $_LIMIT_NEWS = 12;
	private $_PAGE_RANGE = 5;
	
	public function init()
	{
		$this->view->storeSelected = 'selected';
		if ($this->_helper->FlashMessenger->hasMessages()) {
			$this->view->flashMessages = $this->_helper->FlashMessenger->getMessages();
		}
		if (Zend_Auth::getInstance()->hasIdentity()) {
			$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
			$orderMapper = new Application_Model_OrderMapper();
			$detailorderMapper = new Application_Model_DetailorderMapper();
			
			$orderId = $orderMapper->findByUserId($userId);
			if($orderId != 0){
				$notiCart = $detailorderMapper->findNotiByOrderId($orderId);
				$this->view->notiCart = $notiCart;
			}
			else{
				$this->view->notiCart = 0;
			}
			
			$notiOrder = $orderMapper->findNotiByUserId($userId);
			$this->view->notiOrder = $notiOrder;
			if(Zend_Auth::getInstance()->getStorage()->read()->userId == 1){
				$notiAdmin = $orderMapper->findNotiByStatus(3);
				$this->view->notiAdmin = $notiAdmin;
			}
		}
	}
	
	public function indexAction() 
	{
		$request = $this->getRequest();
		
		$categoryId = $request->getParam('categoryId', 0);
		$this->view->categoryId = $categoryId;
		
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$where = 'active = 0 AND category = '.$categoryId;
		
		$heroId = $request->getParam('heroId', 0);
		if($heroId != 0){
			$where .= ' AND heroId = '.$heroId;
		}
		$this->view->heroId = $heroId;
		
		$rarityId = $request->getParam('rarityId', 'all');
		if($rarityId != 'all'){
			$where .= ' AND rarity = '.$rarityId;
		}
		$this->view->rarityId = $rarityId;
		
		$sort = $request->getParam('sort', 0);
		if($sort == 0){
			$orderBy = 'equipmentId DESC';
		}
		else{
			$orderBy = 'equipmentId';
		}
		$this->view->sort = $sort;
		
		$page = $request->getParam('page', 1);
		$this->view->page = $page;
		
		$equipmentsPaginator = $equipmentMapper->findEquipmentList(
				$where,
				$orderBy,
				$this->_LIMIT_NEWS,
				$page,
				$this->_PAGE_RANGE);
		
		$this->view->equipmentsPaginator = $equipmentsPaginator;
		$heroMapper = new Application_Model_HeroMapper();
		$heros = $heroMapper->findAllHero();
		$this->view->heros = $heros;
		
		$orderby = 'ordinal';
		$entries = $heroMapper->fetchAll(null, $orderby);
		$this->view->entries = $entries;
		$this->view->sizeHeroData = sizeof($entries);
	}
	public function additemAction() 
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			$this->_redirect('/store');
		}
		$hero = new Application_Model_HeroMapper();
		$orderby = 'ordinal';
		$entries = $hero->fetchAll(null, $orderby);
		$this->view->entries = $entries;
		$this->view->sizeHeroData = sizeof($entries);
		
		$request = $this->getRequest();
		$page = $request->getParam('page', 1);
		$this->view->page = $page;
		
		$categoryId = $request->getParam('categoryId', 0);
		$this->view->categoryId = $categoryId;
		
		$slots = Eaglet_Utils_Store::getSlot();
		$this->view->slots = $slots;
		
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$chests = $equipmentMapper->fetchAll('type = 2', '1 DESC');
		$this->view->chests = $chests;
		
		$heroMapper = new Application_Model_HeroMapper();
		$heros = $heroMapper->findAllHero();
		$this->view->heros = $heros;
	}
	public function detailAction()
	{
		$request = $this->getRequest();
		$categoryId = $request->getParam('categoryId', 0);
		$this->view->categoryId = $categoryId;
		
		$equipmentId = $request->getParam('equipmentId');
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$equipment = $equipmentMapper->findDetail($equipmentId);
		//Zend_Debug::dump($equipment);exit;
		$this->view->equipment = $equipment;
		
		$heroMapper = new Application_Model_HeroMapper();
		$heros = $heroMapper->findAllHero();
		$this->view->heros = $heros;
		if($equipment[0]['bundleId'] != 0){
			$bundle = $equipmentMapper->find($equipment[0]['bundleId']);
			$this->view->bundle = $bundle;
		}
		if($equipment[0]['chestId'] != 0){
			if(preg_match("/,/i", $equipment[0]['chestId'])){
				$chests = explode(',', $equipment[0]['chestId']);
				$where = '';
				$or = '';
				foreach ($chests as $idxChest => $chest){
					if($idxChest != 0) $or = ' OR ';
					$where .= $or.'equipmentId = '.$chest;
				}
				$chests = $equipmentMapper->fetchAll($where);
			}
			else{
				$chest = $equipmentMapper->find($equipment[0]['chestId']);
				$chests = array($chest);
			}
			$this->view->chests = $chests;
		}
		
		if($equipment[0]['type'] == 1){
			$parts = $equipmentMapper->fetchAll('bundleId = '.$equipment[0]['equipmentId']);
			$this->view->parts = $parts;
		}
		else if($equipment[0]['type'] == 2){
			$partsChest = $equipmentMapper->fetchAll('chestId = '.$equipment[0]['equipmentId']);
			$this->view->partsChest = $partsChest;
		}
	}
	public function insertAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			$this->_redirect('/store');
		}
		if ($this->getRequest()->isPost()) {
			$equipmentMapper = new Application_Model_EquipmentMapper();
		
			$request = $this->getRequest();
			$data = $request->getParam('data');
			$page = $request->getParam('page', 1);
			$categoryId = $request->getParam('categoryId', 0);
			
			$realpath = '/images/store/';
			$basepath = 'images/store/';
			$newname = $basepath . $data['name'].'.png';
			if ((move_uploaded_file($_FILES['data']['tmp_name']["image"], $newname))) {
				$data['image'] = $realpath . $data['name'].'.png';
			}
			else{
				$data['image'] = '';
			}
			$equipmentMapper->insert($data);
			
			$this->_redirect('/store/index/page/'.$page.'/categoryId/'.$categoryId);
		}
	}
	public function edititemAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$equipmentId = $request->getParam('equipmentId');
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$equipment = $equipmentMapper->find($equipmentId);
		//Zend_Debug::dump($equipment);exit;
		$this->view->equipment = $equipment;
		
		$hero = new Application_Model_HeroMapper();
		$orderby = 'ordinal';
		$entries = $hero->fetchAll(null, $orderby);
		$this->view->entries = $entries;
		$this->view->sizeHeroData = sizeof($entries);
		
		$categoryId = $request->getParam('categoryId', 0);
		$this->view->categoryId = $categoryId;
		
		$slots = Eaglet_Utils_Store::getSlot();
		$this->view->slots = $slots;
		
		$bundles = $equipmentMapper->fetchAll('heroId = '.$equipment->heroId.' AND type = 1', '1 DESC');
		$this->view->bundles = $bundles;
		
		$chests = $equipmentMapper->fetchAll('type = 2', '1 DESC');
		$this->view->chests = $chests;
		
		$heroMapper = new Application_Model_HeroMapper();
		$heros = $heroMapper->findAllHero();
		$this->view->heros = $heros;
	}
	public function updateAction()
	{
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->rankId != 2) {
			$this->_redirect('/store');
		}
		if ($this->getRequest()->isPost()) {
			$equipmentMapper = new Application_Model_EquipmentMapper();
	
			$request = $this->getRequest();
			$data = $request->getParam('data');
			$categoryId = $request->getParam('categoryId', 0);
			
			$oldData = $equipmentMapper->find($data['equipmentId']);
			$oldPicture = substr($oldData->image, 1);
	
			$realpath = '/images/store/';
			$basepath = 'images/store/';
			$newname = $basepath . $data['name'].'.png';
			if ((move_uploaded_file($_FILES['data']['tmp_name']["image"], $newname))) {
				$data['image'] = $realpath . $data['name'].'.png';
			}
			else{
				$data['image'] = $oldData->image;
			}
			$equipmentMapper->update($data);
	
			$this->_redirect('/store/detail/equipmentId/'.$data['equipmentId'].'/categoryId/'.$categoryId);
		}
	}
	public function changeheroAction(){
		$this->_helper->layout->disableLayout();
		$this->_helper->viewRenderer->setNoRender(true);
	
		$request = $this->getRequest();
		$heroId = $request->getParam('heroId');
	
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$bundles = $equipmentMapper->fetchAll('heroId = '.$heroId.' AND type = 1', '1 DESC');
		$message = '<select name="data[bundleId]">';
		$message .= '<option value="0">N/A</option>';
		foreach ($bundles as $bundle){
			$message .= '<option value="'.$bundle->equipmentId.'">'.$bundle->name.'</option>';
		}
		$message .= '</select>';
	
		echo $message;
	}
	public function addtocartAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$equipmentId = $request->getParam('equipmentId');
		$equipmentMapper = new Application_Model_EquipmentMapper();
		$equipment = $equipmentMapper->find($equipmentId);
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		
		$orderMapper = new Application_Model_OrderMapper();
		$detailorderMapper = new Application_Model_DetailorderMapper();
		$orderId = $orderMapper->findByUserId($userId);
		if($orderId == '0'){
			$data = array();
			$data['userId'] = $userId;
			$data['status'] = 1;
			$orderMapper->insert($data);
			
			$orderId = $orderMapper->getLastOrderById($userId);
			$data = array();
			$data['equipmentId'] = $equipmentId;
			$data['amount'] = 1;
			$data['orderId'] = $orderId;
			$detailorderMapper->insert($data);
		}
		else{
			$detailorder = $detailorderMapper->findAlreadyEquipment($orderId, $equipmentId);
			$data = array();
			if($detailorder != '0'){
				$data['detailorderId'] = $detailorder->detailorderId;
				$data['equipmentId'] = $equipmentId;
				$data['amount'] = $detailorder->amount+1;
				$data['orderId'] = $orderId;
				$detailorderMapper->update($data);
			}
			else{
				$data['equipmentId'] = $equipmentId;
				$data['amount'] = 1;
				$data['orderId'] = $orderId;
				$detailorderMapper->insert($data);
			}
		}
		
		$this->_redirect('/store/cart/orderId/'.$orderId);
	}
	public function changeamountAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$detailorderId = $request->getParam('detailorderId');
		$detailorderMapper = new Application_Model_DetailorderMapper();
		$amount = $request->getParam('amount');
		$detailorder = $detailorderMapper->find($detailorderId);
		if($amount == 0){
			$detailorderMapper->delete($detailorderId);
		}
		else{
			$detailorder->setAmount($amount);
			$detailorderMapper->save($detailorder);
		}
		$this->_redirect('/store/cart/orderId/'.$detailorder->orderId);
	}
	public function delfromcartAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$detailorderId = $request->getParam('detailorderId');
		$orderId = $request->getParam('orderId');
		
		$detailorderMapper = new Application_Model_DetailorderMapper();
		$detailorderMapper->delete($detailorderId);
		
		$this->_redirect('/store/cart/orderId/'.$orderId);
	}
	public function cartAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$orderId = $request->getParam('orderId', 0);
		
		if($orderId == 0){
			$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		
			$orderMapper = new Application_Model_OrderMapper();
			$orderId = $orderMapper->findByUserId($userId);
		}
		if($orderId != 0){
			$detailorderMapper = new Application_Model_DetailorderMapper();
			$detailorders = $detailorderMapper->findOrder($orderId);
			$this->view->detailorders = $detailorders;
		}
		$this->view->orderId = $orderId;
		//Zend_Debug::dump($orders);exit;
	}
	public function orderAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$userId = Zend_Auth::getInstance()->getStorage()->read()->userId;
		
		$orderMapper = new Application_Model_OrderMapper();
		$orders = $orderMapper->fetchAll('userId = '.$userId.' AND status != 1', 'status');
		$this->view->orders = $orders;
		
		if(count($orders) != 0){
			$detailorderMapper = new Application_Model_DetailorderMapper();
			foreach ($orders as $order){
				$detailorders[] = $detailorderMapper->findOrder($order->orderId);
			}
			$this->view->detailorders = $detailorders;
		}
		//Zend_Debug::dump($detailorders);exit;
	}
	public function checkoutAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$orderId = $request->getParam('orderId');
		$totalPrice = $request->getParam('totalPrice');
		$totalPriceTruemoney = $request->getParam('totalPriceTruemoney');
		
		$orderMapper = new Application_Model_OrderMapper();
		$orderMapper->checkout($orderId, $totalPrice, $totalPriceTruemoney);
		
		$this->_redirect('/store/detailinform/orderId/'.$orderId);
	}
	public function detailinformAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$orderId = $request->getParam('orderId');
		$this->view->orderId = $orderId;
		
		$detailorderMapper = new Application_Model_DetailorderMapper();
		$detailorders = $detailorderMapper->findOrder($orderId);
		
		$orderMapper = new Application_Model_OrderMapper();
		$order = $orderMapper->find($orderId);
		$totalPrice = $order->totalPrice;
		$this->view->totalPrice = $totalPrice;
		$totalPriceTruemoney = $order->totalPriceTruemoney;
		$this->view->totalPriceTruemoney = $totalPriceTruemoney;
	}
	public function paymentinformAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$orderId = $request->getParam('orderId');
		
		$orderMapper = new Application_Model_OrderMapper();
		$order = $orderMapper->find($orderId);
		$this->view->order = $order;
		
		$detailorderMapper = new Application_Model_DetailorderMapper();
		$detailorders = $detailorderMapper->findOrder($orderId);
		$this->view->detailorders = $detailorders;
	}
	public function submitpaymentinformAction(){
		if (!Zend_Auth::getInstance()->hasIdentity()) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$data = $request->getParam('data');
		
		$orderMapper = new Application_Model_OrderMapper();
		$order = $orderMapper->find($data['orderId']);
		$order->setStatus($data['status']);
		if($data[paymentType] == 1){
			$order->setBank($data['bank']);
			$data['transferDateTime'] =  date('Y-m-d H:i:s', strtotime($data['transferDateTime']));
			$order->setTransferDateTime($data['transferDateTime']);
		}
		else{
			$order->setTruemoney($data['truemoney']);
		}
		$order->setNote($data['note']);
		
		$orderMapper->save($order);
		
		$this->_redirect('/store/paymentinform/orderId/'.$data['orderId']);
	}
	public function adminAction(){
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->userId != 1) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$status = $request->getParam('status', 3);
		$this->view->status = $status;
		
		$orderMapper = new Application_Model_OrderMapper();
		$where = 'status = '.$status;
		$orderBy = 'orderId';
		$orders = $orderMapper->findOrderUser($where, $orderBy);
		$this->view->orders = $orders;
		if($orders != '0'){
			$detailorderMapper = new Application_Model_DetailorderMapper();
			foreach ($orders as $order){
				$detailorders[] = $detailorderMapper->findOrder($order->orderId);
			}
			$this->view->detailorders = $detailorders;
		}
	}
	public function adminchangestatusAction(){
		if (!Zend_Auth::getInstance()->hasIdentity() && Zend_Auth::getInstance()->getStorage()->read()->userId != 1) {
			$this->_redirect('/store');
		}
		$request = $this->getRequest();
		$orderId = $request->getParam('orderId');
		$newstatus = $request->getParam('newstatus');
		$currentStatus = $request->getParam('currentStatus');
		$orderMapper = new Application_Model_OrderMapper();
		$orderMapper->changeStatus($orderId, $newstatus);
		
		$this->_redirect('/store/admin/status/'.$currentStatus);
	}
	public function tutorialAction(){
		
	}
}
?>