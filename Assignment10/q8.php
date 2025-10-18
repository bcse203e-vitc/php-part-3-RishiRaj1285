<?php
$srcFile = 'sample.jpg';
if (!file_exists($srcFile)) { echo "Place sample.jpg in same folder."; exit; }
$src = imagecreatefromjpeg($srcFile);
$origW = imagesx($src);
$origH = imagesy($src);

$maxW = 400; $maxH = 300;
$ratio = min($maxW / $origW, $maxH / $origH);
$newW = (int)($origW * $ratio);
$newH = (int)($origH * $ratio);

$dst = imagecreatetruecolor($newW, $newH);
imagecopyresampled($dst, $src, 0,0,0,0, $newW, $newH, $origW, $origH);
header('Content-Type: image/jpeg');
imagejpeg($dst);
imagedestroy($src);
imagedestroy($dst);
?>
