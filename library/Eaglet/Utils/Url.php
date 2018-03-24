<?php
class Eaglet_Utils_Url
{
	public static function convertToSlugUrl($title)
	{
		return str_replace(' ', '-', mb_strtolower($title));
	}
	
	public static function getSlugUrlValue($url, $urlKey)
	{
    	$urlArray = explode('/', $url);
    	$keyIndex = 0;
    	for ($i = 0; $i < count($urlArray); $i++) {
    		if ($urlArray[$i] == $urlKey) {
    			$keyIndex = $i;
    			break;
    		}
    	}
    	$slugUrlIndex = $keyIndex + 2;
    	$currentSlugUrlValue = '';
    	if (array_key_exists($slugUrlIndex, $urlArray)) {
    		$currentSlugUrlValue = $urlArray[$slugUrlIndex];
    	}
    	return $currentSlugUrlValue;
	}
	
	public static function processSEOUrl($url, $lastUrlKey, $preferredSlugValue, $gotoUrl)
	{
		$currentSlugUrlValue = Eaglet_Utils_Url::getSlugUrlValue($url, $lastUrlKey);
    	$validSlugUrl = Eaglet_Utils_Url::convertToSlugUrl($preferredSlugValue);
    	if (rawurldecode($currentSlugUrlValue) != $validSlugUrl) {
    		header("HTTP/1.1 301 Moved Permanently");
    		header("Location: " . $gotoUrl . '/' . $validSlugUrl);
    	}
	}
	
	public static function getReplaySlugUrl($matchContest, $sentinelTeamName, $scourgeTeamName)
	{
	    $replaySlugUrlValue = str_replace('${tournament}', $matchContest, Eaglet_Utils_Bilingual::getValue('REPLAY_SLUG_URL_TEMPLATE'));
		$replaySlugUrlValue = str_replace('${team1}', $sentinelTeamName, $replaySlugUrlValue);
		$replaySlugUrlValue = str_replace('${team2}', $scourgeTeamName, $replaySlugUrlValue);
		return self::convertToSlugUrl($replaySlugUrlValue);
	}
	
	public static function getGuideHeroSkillSlugUrl($heroName, $heroLastname)
	{
	    $guideSkillSlugUrlValue = str_replace(
        	'${heroName}', 
            $heroName,
            Eaglet_Utils_Bilingual::getValue('GUIDE_SKILL_SLUG_URL_TEMPLATE')
        );
    	$guideSkillSlugUrlValue = str_replace(
    		'${heroLastname}',
    		$heroLastname,
    		$guideSkillSlugUrlValue
    	);
    	return self::convertToSlugUrl($guideSkillSlugUrlValue);
	}
	
	public static function getFanArtSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('DOWNLOAD_FANART_TITLE'));
	}
	
	public static function getWallpaperSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('DOWNLOAD_WALLPAPER_TITLE'));
	}
	
	public static function getProgramSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('DOWNLOAD_PROGRAM_TITLE'));
	}
	
	public static function getMapSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_PageTitle::getDownloadMapTitle());
	}
	
	public static function getReplayIndexSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('REPLAY_INDEX_TITLE'));
	}
	
	public static function getTechnicIndexSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('GUIDE_TECHNIC_TITLE'));
	}
	
	public static function getHeroIndexSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('GUIDE_INDEX_TITLE'));
	}
	
	public static function getItemIndexSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('GUIDE_ITEM_TITLE'));
	}
	
	public static function getGuideHeroSlugUrl($heroName, $heroLastname)
	{
	    return self::convertToSlugUrl($heroName . ' ' . $heroLastname . ' ' .
	    		Eaglet_Utils_Bilingual::getValue('GUIDE_HERO_SUFFIX')); 
	}
	
	public static function getStrategyIndexSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('STRATEGY_INDEX_TITLE'));
	}
	
	public static function getStrategyChangelogSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('STRATEGY_CHANGELOG_TITLE'));
	}
	
	public static function getStrategyGankSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('STRATEGY_GANK_TITLE'));
	}
	
	public static function getStrategyMapSlugUrl()
	{
	    return self::convertToSlugUrl(Eaglet_Utils_Bilingual::getValue('STRATEGY_MAP_TITLE'));
	}
}