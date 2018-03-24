<?php

class StrategyController extends Zend_Controller_Action
{
	private $_LIMIT_NEWS = 5;
	private $_PAGE_RANGE = 5;
	private $_LIMIT_NEWS_RELATE = 5;
	
	public function init()
	{
		$this->view->strategySelected = 'selected';
	}
	
	public function indexAction()
	{
        
        $news_data = new Application_Model_News();
        $news = new Application_Model_NewsMapper();
        
        $where = 'replayType = 1 AND n.active = 1';
        if(Eaglet_Utils_Bilingual::isThaiLang()){
        	$where .= " AND topic <> '"."' ";
        }
        else{
        	$where .= " AND topicEN <> '"."' ";
        }
        $orderBy = '1 DESC';
        
        $replayRecommendPaginator = $news->findNewsList(
								$where,
								$orderBy,
								$this->_LIMIT_NEWS,
								$this->getRequest()->getParam('rrPage', 1),
								$this->_PAGE_RANGE);
		$listHero = array();
		$detail = array();
		$i = 0;
		foreach($replayRecommendPaginator as $value){
			$listHero[$i] = $news_data->splitDetail($value->detail);
			$detail[$i] = $news_data->splitDetailAfter($value->detail);
			$i++;
		}

		$this->view->listHero = $listHero;
		$this->view->detail = $detail;
		$this->view->replayRecommendPaginator = $replayRecommendPaginator;
		
		$where = 'replayType = 2 AND n.active = 1';
		if(Eaglet_Utils_Bilingual::isThaiLang()){
			$where .= " AND topic <> '"."' ";
		}
		else{
			$where .= " AND topicEN <> '"."' ";
		}
        
        $replayAnalysisPaginator = $news->findNewsList(
								$where,
								$orderBy,
								$this->_LIMIT_NEWS,
								$this->getRequest()->getParam('raPage', 1),
								$this->_PAGE_RANGE);
		
		foreach($replayAnalysisPaginator as $value){
			$value->detail = $news_data->splitDetail($value->detail);
			$value->detailEN = $news_data->splitDetail($value->detailEN);
		}
		$this->view->replayAnalysisPaginator = $replayAnalysisPaginator;
		
		$this->view->tab = $this->getRequest()->getParam('tab');
	}
	
	public function changelogAction()
	{
		$changelog = new Application_Model_ChangelogMapper();
		$orderBy = array('heroId', 'mapId DESC', 'changelogId');
		$data = $changelog->findAllData($orderBy);
		$this->view->data = $data;
		$this->view->sizeData = sizeof($data);
		
		$orderBy = 'ordinal';
		$hero = new Application_Model_HeroMapper();
		$heroData = new Application_Model_Hero();
		$heroData = $hero->fetchAll(null, $orderBy);
		$this->view->heroData = $heroData;
		$this->view->sizeHeroData = sizeof($heroData);
	}
	public function changelogmapAction()
	{
		$changelog = new Application_Model_ChangelogMapper();
		$orderBy = array('mapId DESC', 'heroId', 'changelogId');
		$groupBy = 'm.mapId';
		$map = $changelog->findAllData($orderBy, $groupBy);
		$this->view->map = $map;
		
		$data = $changelog->findAllData($orderBy);
		$this->view->data = $data;
		$this->view->sizeData = sizeof($data);
	}
	
	public function detailAction()
	{
		$news_data = new Application_Model_News();
        $news = new Application_Model_NewsMapper();
        $id = $this->getRequest()->getParam('newsId');
        
        $data = $news->fetchAll('newsId = '.$id);
        $data[0]->detail = $news_data->escapeBreak($data[0]->detail);
        $this->view->data = $data;
	}
}
?>