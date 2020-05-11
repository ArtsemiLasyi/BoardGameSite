<?php

  session_start();
 
  $randomNumber = rand(1000, 9999);
  $_SESSION['randomNumber'] = md5($randomNumber);
 
  $imageCaptcha = imagecreatetruecolor(150, 50);
  $colorWhite = imagecolorallocate($imageCaptcha, 255, 255, 255);
  $colorGrey = imagecolorallocate($imageCaptcha, 128, 128, 128);
  $colorBlack = imagecolorallocate($imageCaptcha, 0, 0, 0);
 
  imagefilledrectangle($imageCaptcha, 0, 0, 150, 50, $colorBlack);
  $font = dirName(__FILE__).'/font/karate/Karate.ttf';
 

  $angle = 10;
  $sizeGrey = 30;
  $sizeWhite = 25;

  imagettftext($imageCaptcha, $sizeGrey, $angle, 22, 44, $colorGrey, $font, $randomNumber); 
  imagettftext($imageCaptcha, $sizeWhite, $angle, 15, 46, $colorWhite, $font, $randomNumber);
 
  header("Expires: Wed, 1 Jan 1997 00:00:00 GMT");    // для запрета кэширования
  header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
  header("Cache-Control: no-store, no-cache, must-revalidate");
  header("Cache-Control: post-check=0, pre-check=0", false);
  header("Pragma: no-cache");
 
  header ("Content-type: image/gif");
  imagegif($imageCaptcha);
  imagedestroy($imageCaptcha);