<?php
session_start();
$captcha = rand(1000, 9999);
$_SESSION['captcha'] = $captcha;

$width = 100; $height = 35;
$image = imagecreate($width, $height);
$bg = imagecolorallocate($image, 255, 255, 255);
$textcol = imagecolorallocate($image, 0, 0, 0);
imagestring($image, 5, 15, 8, $captcha, $textcol);
header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);
?>
