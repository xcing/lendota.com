<?php
class Application_Form_EditUserTeam extends Zend_Form
{
	private $DEFAULT_TEXT_STYLE = 'width: 176px;';
	
	public function init() 
	{
		$translator = $this->getTranslator();
		
		$this->setAttrib('enctype', 'multipart/form-data');
		
		$id = $this->CreateElement('hidden','id');
		
		$stringLengthValidator = new Zend_Validate_StringLength(2, 100);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_NAME').''.$translator->translate('TOURNAMENT_VALIDATE_AT_LEAST').' 2 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_SHORT);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_NAME').''.$translator->translate('TOURNAMENT_VALIDATE_MAXIMUM').' 100 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_LONG);
		$notEmptyValidator = new Zend_Validate_NotEmpty();
		$notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_NAME'), Zend_Validate_NotEmpty::IS_EMPTY);
		
        $name = $this->createElement('text','name')
	        			->setLabel($translator->translate('TOURNAMENT_CREATE_TEAM_NAME').': *')
	        			->setRequired(true)
	        			->addFilter('StringTrim')
	        			->addValidator($notEmptyValidator, true)
	        			->addValidator($stringLengthValidator, true)
	        			->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
                
	    $stringLengthValidator = new Zend_Validate_StringLength(2, 10);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_SHORT_NAME').''.$translator->translate('TOURNAMENT_VALIDATE_AT_LEAST').' 2 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_SHORT);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_SHORT_NAME').''.$translator->translate('TOURNAMENT_VALIDATE_MAXIMUM').' 10 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_LONG);
		$notEmptyValidator = new Zend_Validate_NotEmpty();
		$notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_TEAM_SHORT_NAME'), Zend_Validate_NotEmpty::IS_EMPTY);
		
		$shortName = $this->createElement('text','shortName')
						->setLabel($translator->translate('TOURNAMENT_CREATE_TEAM_SHORT_NAME').': * '.$translator->translate('TOURNAMENT_CREATE_TEAM_FOR_LOGIN'))
						->setRequired(true)
						->addFilter('StringTrim')
						->addValidator($notEmptyValidator, true)
						->addValidator($stringLengthValidator, true)
						->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
		
		$stringLengthValidator = new Zend_Validate_StringLength(4, 20);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' Password '.$translator->translate('TOURNAMENT_VALIDATE_AT_LEAST').' 4 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_SHORT);
		$stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' Password '.$translator->translate('TOURNAMENT_VALIDATE_MAXIMUM').' 20 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_LONG);
		$notEmptyValidator = new Zend_Validate_NotEmpty();
		$notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' Password', Zend_Validate_NotEmpty::IS_EMPTY);
		
        $oldPassword = $this->createElement('password','oldPassword')
	        			->setLabel('Old Password: *')
	                	->addFilter('StringTrim')
	                	->addValidator($stringLengthValidator, true)
	                	->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $password = $this->createElement('password','password')
				        ->setLabel('New Password: *')
				        ->addFilter('StringTrim')
				        ->addValidator($stringLengthValidator, true)
				        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
                
        $confirmPassword = $this->createElement('password','confirmPassword')
        					->setLabel('Confirm Password: *')
                			->addFilter('StringTrim')
                			->addValidator($stringLengthValidator, true)
                			->setAttrib('style', $this->DEFAULT_TEXT_STYLE);

        $stringLengthValidator = new Zend_Validate_StringLength(1, 100);
        $stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' Password '.$translator->translate('TOURNAMENT_VALIDATE_AT_LEAST').' 1 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_SHORT);
        $stringLengthValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' Password '.$translator->translate('TOURNAMENT_VALIDATE_MAXIMUM').' 100 '.$translator->translate('TOURNAMENT_VALIDATE_CHARACTER'), Zend_Validate_StringLength::TOO_LONG);
        $notEmptyValidator = new Zend_Validate_NotEmpty();
        $notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_MEMBER').' 1', Zend_Validate_NotEmpty::IS_EMPTY);
        
        $member1 = $this->createElement('text','member1')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 1: *')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $notEmptyValidator = new Zend_Validate_NotEmpty();
        $notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_MEMBER').' 2', Zend_Validate_NotEmpty::IS_EMPTY);
        
        $member2 = $this->createElement('text','member2')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 2: *')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $notEmptyValidator = new Zend_Validate_NotEmpty();
        $notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_MEMBER').' 3', Zend_Validate_NotEmpty::IS_EMPTY);
        
        $member3 = $this->createElement('text','member3')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 3: *')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $notEmptyValidator = new Zend_Validate_NotEmpty();
        $notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_MEMBER').' 4', Zend_Validate_NotEmpty::IS_EMPTY);
        
        $member4 = $this->createElement('text','member4')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 4: *')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $notEmptyValidator = new Zend_Validate_NotEmpty();
        $notEmptyValidator->setMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_CREATE_MEMBER').' 5', Zend_Validate_NotEmpty::IS_EMPTY);
        
        $member5 = $this->createElement('text','member5')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 5: *')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $member6 = $this->createElement('text','member6')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 6:')
        ->addFilter('StringTrim')
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $member7 = $this->createElement('text','member7')
        ->setLabel($translator->translate('TOURNAMENT_CREATE_MEMBER').' 7:')
        ->addFilter('StringTrim')
        ->addValidator($stringLengthValidator, true)
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
        $tel = $this->createElement('text','tel')
        ->setLabel('Tel: * ('.$translator->translate('TOURNAMENT_VALIDATE_UNDISCLOSED').')')
        ->setRequired(true)
        ->addFilter('StringTrim')
        ->addValidator($notEmptyValidator, true)
        ->addValidator($stringLengthValidator, true)
        ->addErrorMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_VALIDATE_TEL'))
        ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);
        
	    $email = $this->createElement('text','email')
	        		->setLabel('Email: *')
	                ->setRequired(true)
	                ->addFilter('StringToLower')
	                ->addFilter('StringTrim')
	                ->addValidator(new Zend_Validate_EmailAddress(), true)
	                ->addErrorMessage($translator->translate('TOURNAMENT_VALIDATE_PLEASE_INPUT').' '.$translator->translate('TOURNAMENT_VALIDATE_FORMAT_EMAIL'))
	                ->setAttrib('style', $this->DEFAULT_TEXT_STYLE);

	    $logo = $this->createElement('file','logo')
	    				->setDestination('images/logoTeam')
	    				->setLabel('Logo: ')
	    				->setAttrib('style', 'width: 179px;');
	    
	    $countryCode = $this->createElement('select','countryCode')
					    ->setLabel('Country : *')
					    ->addMultiOptions(Eaglet_Utils_Country::getCountryArray());
	                    
	    $this->addPrefixPath('Eaglet_Form', 'Eaglet/Form/');

        $register = $this->createElement('submit', 'register')
	        			->setLabel('Save')
	                	->setIgnore(true)
	                	->setAttrib('class', 'submitBtn signupBtn');
                
        $this->addElements(array(
        	$id,
			$name,
			$shortName,
        	$oldPassword,
        	$password,
        	$confirmPassword,
        	$member1,
        	$member2,
        	$member3,
        	$member4,
        	$member5,
        	$member6,
        	$member7,
        	$tel,
			$email,
			$logo,
        	$countryCode,
			$register
        ));
	}
}
