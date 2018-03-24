<?php
class Eaglet_Utils_Form
{
	public static function getOldValue($elementName)
	{
		echo isset($_POST[$elementName]) ? $_POST[$elementName] : '';
	}
	
	public static function getOldValueGET($elementName)
	{
		echo isset($_GET[$elementName]) ? $_GET[$elementName] : '';
	}
	
	public static function getValueFromRequestOrGET(Zend_Controller_Request_Abstract $request, $paramName)
	{
		if ($request->getParam($paramName)) {  
			$value = $request->getParam($paramName);
		} else if (isset($_GET[$paramName])) {
			$value = $_GET[$paramName];
		} else {
			$value = '';
		}
		return $value;
	}
	
}