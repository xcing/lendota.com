<?php
class Application_Form_SignUp extends Zend_Form
{
	private $DEFAULT_TEXT_STYLE = 'width: 176px;';
	
	public function init() 
	{
		$email = $this->createElement('text','email')
					->setLabel('Email: *')
					->setRequired(true)
					->addFilter('StringToLower')
					->addFilter('StringTrim')
					->addValidator(new Zend_Validate_EmailAddress(), true)
					->addErrorMessage('กรุณาใส่ email ที่มีอยู่จริง')
					->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
                
	    $stringLengthValidator = new Zend_Validate_StringLength(4, 20);
		$stringLengthValidator->setMessage('กรุณาใส่ Password ขั้นต่ำ 4 ตัวอักษร', Zend_Validate_StringLength::TOO_SHORT);
		$stringLengthValidator->setMessage('กรุณาใส่ Password ไม่เกิน 20 ตัวอักษร', Zend_Validate_StringLength::TOO_LONG);
		$notEmptyValidator = new Zend_Validate_NotEmpty();
		$notEmptyValidator->setMessage('กรุณาใส่ Password', Zend_Validate_NotEmpty::IS_EMPTY);
		
        $password = $this->createElement('password','password')
	        			->setLabel('Password: *')
	                	->setRequired(true)
	                	->addFilter('StringTrim')
	                	->addValidator($notEmptyValidator, true)
	                	->addValidator($stringLengthValidator, true)
	                	->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
                
        $confirmPassword = $this->createElement('password','confirmPassword')
	        					->setLabel('Confirm Password: *')
	                			->setRequired(true)
	                			->addFilter('StringTrim')
	                			->addErrorMessage('กรุณาใส่ Confirm Password')
	                			->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $steamName = $this->createElement('text','steamName')
				        ->setLabel('Steam name: *')
				        ->setRequired(true)
				        ->addFilter('StringTrim')
				        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
	                	
	    $recaptcha = new Zend_Service_ReCaptcha("6LeQ-cQSAAAAAA049QavCjWxf_wWQUUheTR8-lkw",
                        "6LeQ-cQSAAAAAAEawaXXqjhmd6i5V-wbxgCQurz0",
	    				array(
	    					'error' => 'test'
	    				));
	    $recaptcha->setOption('theme', 'blackglass');
        $captcha = $this->createElement('Captcha', 'ReCaptcha',
                		array(
                			'captcha' => array(
	                						'captcha'=>'ReCaptcha',
	                                        'service'=>$recaptcha
                						),
						))
                		->addErrorMessage('กรุณาใส่ Captcha ให้ถูกต้อง');

        $register = $this->createElement('submit', 'register')
	        			->setLabel('Sign up')
	                	->setIgnore(true)
	                	->setAttrib('class', 'submitBtn signupBtn');
                
        $this->addElements(array(
        	$email,
			$password,
			$confirmPassword,
        	$steamName,
//			$captcha,
			$register
        ));
	}
}
