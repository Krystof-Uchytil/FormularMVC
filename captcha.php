<?php
session_start();

header("Content-Type: image/png");

$image = imagecreate(100, 30);
$background = imagecolorallocate($image, 255, 255, 255);
$text_color = imagecolorallocate($image, 0, 0, 0);

$captcha_code = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, 6);
$_SESSION['captcha'] = $captcha_code;

imagestring($image, 5, 10, 5, $captcha_code, $text_color);
imagepng($image);
imagedestroy($image);