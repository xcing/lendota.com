<?php
class Application_Form_EditUser extends Zend_Form
{
	private $DEFAULT_TEXT_STYLE = 'width: 176px;';
	
	public function init() 
	{
		
		$id = $this->CreateElement('hidden','userId');
		
		$steamName = $this->createElement('text','steamName')
						->setLabel('Steam name: *')
						->setRequired(true)
						->addFilter('StringTrim')
						->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
		
		$stringLengthValidator = new Zend_Validate_StringLength(4, 20);
		$stringLengthValidator->setMessage('กรุณาใส่ Password ขั้นต่ำ 4 ตัวอักษร', Zend_Validate_StringLength::TOO_SHORT);
		$stringLengthValidator->setMessage('กรุณาใส่ Password ไม่เกิน 20 ตัวอักษร', Zend_Validate_StringLength::TOO_LONG);
		$notEmptyValidator = new Zend_Validate_NotEmpty();
		$notEmptyValidator->setMessage('กรุณาใส่ Password', Zend_Validate_NotEmpty::IS_EMPTY);
		
		$oldPassword = $this->createElement('password','oldPassword')
	        			->setLabel('Old Password: *')
	                	//->setRequired(true)
	                	->addFilter('StringTrim')
	                	//->addValidator($notEmptyValidator, true)
	                	//->addValidator($stringLengthValidator, true)
	                	->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
		
        $password = $this->createElement('password','password')
	        			->setLabel('New Password: *')
	                	//->setRequired(true)
	                	->addFilter('StringTrim')
	                	->addValidator($notEmptyValidator, true)
	                	->addValidator($stringLengthValidator, true)
	                	->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
                
        $confirmPassword = $this->createElement('password','confirmPassword')
	        					->setLabel('Confirm Password: *')
	                			//->setRequired(true)
	                			->addFilter('StringTrim')
	                			->addErrorMessage('กรุณาใส่ Confirm Password')
	                			->setAttrib('style', $this->DEFAULT_TEXT_STYLE);

        

        $register = $this->createElement('submit', 'register')
	        			->setLabel('Save')
	                	->setIgnore(true)
	                	->setAttrib('style', 'margin: 20px auto auto; display: block;');
                
        $this->addElements(array(
        	$id,
        	$steamName,
        	$oldPassword,
			$password,
			$confirmPassword,
			$register
        ));
	}
}
