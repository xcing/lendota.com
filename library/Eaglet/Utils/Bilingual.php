<?php
class Eaglet_Utils_Bilingual
{
    const THAI_LANG = '_th';
    const ENG_LANG  = '_en';
	
	private static $SEARCH_ENGINE_AGENTS = array(
		"Googlebot",
		"slurp",
		"msn",
		"Lycos",
		"Teoma",
		"ZyBorg",
		"Mediapartners"
	);
    
    private static $languageCookie = '_lingual';
    private static $rememberSeconds = 31104000; //1 year
    
    public static function isThaiLang()
    {
		if (self::isSearchEngine()) {
			return true;
		}
        if (!isset($_COOKIE[self::$languageCookie])) {
            return self::isUserFromThai();
        } 
        if ($_COOKIE[self::$languageCookie] == self::THAI_LANG) {
            return true;
        } else {
            return false;
        }
    }
	
	private static function isSearchEngine()
	{
		$userAgent = $_SERVER['HTTP_USER_AGENT'];
		foreach (self::$SEARCH_ENGINE_AGENTS as $searchEngineAgent) {
			if (stripos($userAgent, $searchEngineAgent) !== false) {
				return true;
			}
		}
		return false;
	}


	private static function isUserFromThai()
    {
		$clientResult = file_get_contents('http://freegeoip.net/json/' . $_SERVER['REMOTE_ADDR']);
        if ($clientResult) {
			$clientValue = json_decode($clientResult);
			$clientCountryCode = $clientValue->country_code;
			return strcasecmp($clientCountryCode, 'TH') == 0;
        }
        return true;
    }
    
    /**
     * เก็บภาษาที่ user เลือกไว้ใน cookie 
     * @param ภาษาของ user จาก constant class นี้นี่แหละ
     * <p><b>ตัวอย่างการใช้งานสำหรับเลือกภาษาอังกฤษ</b>
     * <p>Eaglet_Utils_Bilingual::setUserDefaultLanguage(Eaglet_Utils_Bilingual::ENG_LANG);</p>
     * </p>
     */
    public static function setUserDefaultLanguage($userLang)
    {
        setcookie(self::$languageCookie, $userLang, time() + self::$rememberSeconds, '/');
    }
    
    public static function setCookieLangIfNotExist($isThaiLang)
    {
        if (isset($_COOKIE[self::$languageCookie])) {
            return;
        }
        if ($isThaiLang) {
            self::setUserDefaultLanguage(self::THAI_LANG);
        } else {
            self::setUserDefaultLanguage(self::ENG_LANG);
        }
    }
    
    public static function getValue($translateKey)
    {
    	$translate = Zend_Registry::get('Zend_Translate');
	    return $translate->_($translateKey);
    }
}