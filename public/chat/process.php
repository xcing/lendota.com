
<?php
    $function = $_GET['function'];

    $clanId = $_GET['clanId'];
    $log = array();
    
    switch($function) {
    	 
    	 case('getState'):
        	 if(file_exists('txt/chatlog'.$clanId.'.txt')){
                 $lines = file('txt/chatlog'.$clanId.'.txt');
        	 }
             $log['state'] = count($lines); 
        	 break;	
    	
    	 case('update'):
        	 $state = $_GET['state'];
        	 if(file_exists('txt/chatlog'.$clanId.'.txt')){
        	     $lines = file('txt/chatlog'.$clanId.'.txt');
        	 }
        	 $count =  count($lines);
        	 if($state == $count){
        		 $log['state'] = $state;
        		 $log['text'] = false;
        	 }
        	 else{
        		 $text= array();
        		 $log['state'] = $state + count($lines) - $state;
        		 foreach ($lines as $line_num => $line){
        		     if($line_num >= $state){
                        $text[] =  $line = str_replace("\n", "", $line);
        		     }
                 }
        		 $log['text'] = $text; 
        	 }
             break;
    	 
    	 case('send'):
		  	 $nickname = htmlentities(strip_tags($_GET['nickname']));
			 $reg_exUrl = "/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/";
			 //$message = htmlentities(strip_tags($_POST['message']));
			 $message = $_GET['message'];
		 	 if(($message) != "\n"){
        		if(preg_match($reg_exUrl, $message, $url)) {
       				$message = preg_replace($reg_exUrl, '<a href="'.$url[0].'" target="_blank" style="color:black;">'.$url[0].'</a>', $message);
			 	} 
			 	$message = str_replace("\n", " ", $message);
        	 	fwrite(fopen('txt/chatlog'.$clanId.'.txt', 'a'), "<span>". $nickname . "</span>" . $message . "\n"); 
		 	 }
        	 break;
    	
    }
    
    echo json_encode($log);

?>