<?php
$img = imagecreate(400, 60);
$bg = imagecolorallocate($img, 240, 240, 240);
$black = imagecolorallocate($img, 0, 0, 0);
$text = "Generated on " . date("Y-m-d H:i:s");
imagestring($img, 5, 10, 20, $text, $black);
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
