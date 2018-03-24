<?php

class Validate   //now not use
{
	public static function resizeImg($string, $long){
	    
	    header('content-type:text/plain');
	    $regex = '/<img\s?[^>]*>/i';
	    preg_match_all($regex, $string, $img_data);
	    print_r($img_data);
	    $width_data = array();
	    $new_img_data = array();
	    $src_array = array();
	    $regex = '/src=[\'"]?([^\'" >]+)[\'" >]/';
	    $size = sizeof($img_data[0]);
	    
	    $pattern = "/(<img\s+).*?src=((\".*?\")|(\'.*?\')|([^\s]*)).*?>/i";
	    for($i=0; $i<$size; $i++){
	        echo "img_data = ".$img_data[0][$i]."\n";
	        preg_match($regex, $img_data[0][$i], $width_data[$i]);
	        array_push($src_array, $width_data[$i][1]);
	        $path = realpath('../'.$width_data[$i][1]);
	        echo "path = ".$path."\n";
	        list($width, $height, $type, $attr) = getimagesize($path);
	        echo "width = ".$width."\n";
	        echo "long = ".$long."\n";
	        if($long < $width){
	            echo "resize\n";
                $replacement = "<img width=".$long." id=img".$i." src=image/load_image.png >";
                $new_img_data[$i] = preg_replace($pattern, $replacement, $img_data[0][$i]);
                echo "newimg_data = ".$new_img_data[$i]."\n";
	            $string = str_replace($img_data[0][$i], $new_img_data[$i], $string);
	        }
	        else if($width > 1){
	            $replacement = "<img id=img".$i." src=image/load_image.png >";
                $new_img_data[$i] = preg_replace($pattern, $replacement, $img_data[0][$i]);
                echo "newimg_data = ".$new_img_data[$i]."\n";
                $string = str_replace($img_data[0][$i], $new_img_data[$i], $string);
	        }
	    }
	    print_r($src_array);
	    echo "\n";
	    print_r($string);
	    exit;
	    return array($string, $size, $src_array);
	    
	}
	
}


?>
