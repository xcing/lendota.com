<?php
 
class SimpleImage {
   
   var $image;
   var $image_type;
 
   function load($filename, $type = 'png') {
      $image_info = getimagesize($filename);
      $this->image_type = substr($image_info['mime'], 6);
      if( $this->image_type == 'jpeg' ) {
         $this->image = imagecreatefromjpeg($filename);
         return true;
      } elseif( $this->image_type == 'gif' ) {
         $this->image = imagecreatefromgif($filename);
         return true;
      } elseif( $this->image_type == 'png' ) {
         $this->image = imagecreatefrompng($filename);
         return true;
      }
      else{
          return false;
      }
      
   }
   function save($filename, $compression=75, $permissions=null) {
      if( $this->image_type == 'jpeg' ) {
         imagejpeg($this->image,$filename,$compression);
      } 
      elseif( $this->image_type == 'gif' ) {
         imagegif($this->image,$filename);         
      } 
      elseif( $this->image_type == 'png' ) {
         imagepng($this->image,$filename);
      }   
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         header('Content-Type: image/jpeg');
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         header('Content-Type: image/gif');
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         header('Content-Type: image/png');
         imagepng($this->image);
      }   
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;   
   }      
}
?>