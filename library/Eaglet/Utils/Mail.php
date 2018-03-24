<?php

class Eaglet_Utils_Mail
{
	protected $host = 'smtp.gmail.com';
	protected $port = 465;
	protected $username = 'lendota.com@gmail.com';
	protected $password = 'cbjadmin';
	protected $adminName = 'LenDotA.com';
	
	public $adminMail = "admin@lendota.com";
	public $supportMail = "admin@lendota.com";
	
	private $_SEND_MAIL_SUCCESS_MSG = 'ข้อความของคุณได้ถูกส่งเรียบร้อยแล้ว<br />โปรดรอการติดต่อกลับ';
	
	public function sendMail($to, $subject, $body, $resultMessage) {
		$this->addFooter($body);	
		if (empty($resultMessage)) {
			$resultMessage = $this->_SEND_MAIL_SUCCESS_MSG;
		}
		$transport = new Zend_Mail_Transport_Smtp($this->host, array(
		    'auth'     => 'login',
		    'username' => $this->username,
		    'password' => $this->password,
		    'port'     => $this->port,
			'ssl'	   => 'tls'
		));
		Zend_Mail::setDefaultTransport($transport);
		try {
			$mail = new Zend_Mail('UTF-8');
			$mail->setHeaderEncoding(Zend_Mime::ENCODING_BASE64)
				->setFrom($this->adminMail, $this->adminName)
				->addTo($to)
				->setSubject($subject)
				->setBodyHtml($body)
				->send();
		} catch (Exception $e) {
			$resultMessage = 'เกิดข้อผิดพลาด กรุณาลองใหม่อีกครั้ง';
		}
		return $resultMessage;
	}
	
	private function addFooter(&$mailBody)
	{
		$mailBody .= '<br /><br /><a href="http://' . $_SERVER['SERVER_NAME'] . '/' . '">
						<img src="' . $_SERVER['SERVER_NAME'] . '/images/logo.png' . '" title="' . $this->adminName . '" alt="' . $this->adminName . '" /></a>';
	}
	
}