<?php

class Eaglet_Utils_Message
{
	private static $messageFile = "/messages/messages.html";
		
	public static function getMessage($messageKey, Array $replace = array()) {
		$messageContent = parse_ini_file(APPLICATION_PATH . Eaglet_Utils_Message::$messageFile);
		$messageValue = $messageContent[$messageKey];
		if (!empty($replace)) {
			foreach ($replace as $key => $value) {
				$messageValue = str_replace($key, $value, $messageValue);
			}
		}
		return $messageValue;
	}
}