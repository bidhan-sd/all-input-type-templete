<?php 
    session_start();
 
    // Generate Random Number
	$random_number = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789'),0,8 );
    $_SESSION['captchacode'] = $random_number;
 
    // Insert random number into image
    $captcha_image = imagecreatefromjpeg("img/captcha.jpg");
	$font_size = 24;
    $font_color = imagecolorallocate($captcha_image, 0, 0, 0);
		
	imagefttext($captcha_image, $font_size, -2, 15, 26, $font_color,'fonts/mono.ttf', $random_number);
    imagejpeg($captcha_image);
    imagedestroy($captcha_image);
?>