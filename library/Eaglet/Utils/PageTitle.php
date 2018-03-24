<?php
class Eaglet_Utils_PageTitle
{
	public static function getDownloadMapTitle()
	{
		return Eaglet_Utils_Bilingual::getValue('DOWNLOAD_MAP') . ' ' .
				Eaglet_Utils_Bilingual::getValue('LASTEST_MAP') . ' ' .
				Eaglet_Utils_Bilingual::getValue('DOWNLOAD');
	}
	
	public static function getGuideHeroTitle($heroName, $heroLastname)
	{
	    return addslashes($heroName) . ' ' . addslashes($heroLastname) . ' ' . 
	    		Eaglet_Utils_Bilingual::getValue('GUIDE_HERO_SUFFIX'); 
	}
}