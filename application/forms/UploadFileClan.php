<?php
class Application_Form_UploadFileClan extends Zend_Form
{
	
	public function init() 
	{
		//$this->addElementPrefixPath('App', 'App/');
        //parent::__construct($options);
        $this->setName('upload');
        $this->setAttrib('enctype', 'multipart/form-data');
		
		
		$icon = $this->createElement('file','icon')
        			 ->setAttribs(array("size"=>20))
		        	 ->setRequired(true)
		             ->setDestination('images/iconClan')
		             ->addValidator('Size', false, 102400) // limit to 100K
		             ->setMaxFileSize(102400) // limits the filesize on the client side
		             ->addValidator('Extension', false, 'jpg,png,gif'); 
		
                
        $this->addElements(array(
        	$icon
        ));
	}
}
