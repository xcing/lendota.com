<?php
class Eaglet_Utils_Date
{
	const BUDDIST_ERA_OVERLAP = 543;
	const DATE_FORMAT = 'YYYY-MM-dd';
	const DATE_TIME_FORMAT = 'YYYY-MM-dd H:m:s';
	const DATE_FORMAT_FOR_APP = 'dd-MM-YYYY';
	const DATE_TIME_FORMAT_FOR_APP = 'dd-MM-YYYY H:m:s';
	
	public static function getDate($dateFormat = null)
	{
		$date = new Zend_Date();
    	$date = $date->addYear(self::BUDDIST_ERA_OVERLAP);
    	if (isset($dateFormat)) {
    		$format = $dateFormat;
    	} else {
    		$format = self::DATE_FORMAT;
    	}
    	return $date->get($format);
	}
	
	public static function getDateTime($dateTimeFormat = null)
	{
		return Eaglet_Utils_Date::getDate(self::DATE_TIME_FORMAT);
	}
	
	public static function formatDateString($dateString, $dateFormat = null)
	{
		try {
			$date = new Zend_Date($dateString);
			if (isset($dateFormat)) {
	    		$format = $dateFormat;
	    	} else {
	    		$format = self::DATE_FORMAT_FOR_APP;
	    	}
			return $date->get($format);
		} catch (Exception $e) {
			return null;
		}
	}
	public static function calRaceDateTournament($date, $round)
	{
		$result = mktime(0,0,0,date('m', strtotime($date)),date('d', strtotime($date))+($round-1),date('Y', strtotime($date)));
		return date("d/m/Y", $result);
	}
}