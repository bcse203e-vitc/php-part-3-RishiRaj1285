<?php
$srcPath = __DIR__ . '/sample.jpg'; // image file
$fontPath = __DIR__ . '/ARIAL.ttf'; // path to a .ttf font (e.g., Arial)

if (!file_exists($srcPath)) {
    header('Content-Type: text/plain');
    echo "Place sample.jpg in the script folder.";
    exit;
}

if (!file_exists($fontPath)) {
    header('Content-Type: text/plain');
    echo "Place arial.ttf in the script folder (any TTF font will do).";
    exit;
}

$img = imagecreatefromjpeg($srcPath);
$black = imagecolorallocate($img, 0, 0, 0);
$white = imagecolorallocate($img, 255, 255, 255);

$text = "VIT Chennai © " . date("Y");
$fontSize = 100;
$angle = 0;

$imageWidth = imagesx($img);
$imageHeight = imagesy($img);
$bbox = imagettfbbox($fontSize, $angle, $fontPath, $text);
$textWidth = abs($bbox[2] - $bbox[0]);
$textHeight = abs($bbox[7] - $bbox[1]);
$x = $imageWidth - $textWidth - 20;
$y = $imageHeight - 20;

imagettftext($img, $fontSize, $angle, $x+2, $y+2, $black, $fontPath, $text);
imagettftext($img, $fontSize, $angle, $x, $y, $white, $fontPath, $text);

header("Content-Type: image/jpeg");
imagejpeg($img);
imagedestroy($img);
?>
