<?php

class FeedController extends Zend_Controller_Action
{
	const NEWS_FEED_LIMIT = 10;
	const HTTP = 'http://';
	const FEED_ENCODING = 'UTF-8';

    public function init()
    {
    	Zend_Layout::getMvcInstance()->disableLayout();
        $this->_helper->viewRenderer->setNoRender(true);
    }

    public function indexAction()
    {
    	$this->_forward('atom');
    }
    
    public function atomAction()
    {
    	$bootstrap = $this->getInvokeArg('bootstrap');
		$config = $bootstrap->getOptions();
    	$config = $config['web'];
    	$feed = $this->getFeed();
        $feed->addAuthor($config['name'], $config['mail'], self::HTTP . $_SERVER['SERVER_NAME'] . '/');
        $feed->setFeedLink(self::HTTP . $_SERVER['SERVER_NAME'] . '/feed/atom', 'atom');

        echo $feed->export('atom'); 
    }
    
    private function getFeed()
    {
    	$config = $this->getInvokeArg('bootstrap')->getOptions();
    	
    	$feed = new Zend_Feed_Writer_Feed;
        $feed->setTitle('DotA News Feed');
        $feed->setLink(self::HTTP . $_SERVER['SERVER_NAME'] . '/');
        $feed->setDescription('DotA News from ' . $config['web']['name']);
        $feed->setEncoding(self::FEED_ENCODING);
        $feed->setCopyright($config['web']['name']);
        
        $newsMapper = new Application_Model_NewsMapper();
        $news = $newsMapper->fetchAll(array('active' => 1), array('date DESC'), self::NEWS_FEED_LIMIT);
        
        $lastUpdated = new DateTime(reset($news)->getDate());
        $feed->setDateModified($lastUpdated->format('U'));

        foreach($news as $new) {
            $entry = $feed->createEntry();
            $entry->setTitle($new->getTopic());
            $entry->setLink(self::HTTP . $_SERVER['SERVER_NAME'] . '/index/detail/id/' . $new->getId());
            $description = $new->splitDetail($new->getDetail());
            if ($new->getPicture()) {
                $picture = '<img width="150" height="150" src="' . $new->getPicture() . '" /> ';
                $description = $picture . $description;
            }
            $entry->setDescription($this->escapeTextForFeed($description));
            $newsDate = new DateTime($new->getDate());
            $entry->setDateModified($newsDate->format('U'));
            $entry->setDateCreated($newsDate->format('U'));
            $entry->setEncoding(self::FEED_ENCODING);
            
            $feed->addEntry($entry);
        }
        return $feed;
    }
    
    private function escapeTextForFeed($textWithSpecialChar)
    {
    	return str_replace("&", "&amp;", (html_entity_decode($textWithSpecialChar, ENT_QUOTES, self::FEED_ENCODING)));
    }
    
}

