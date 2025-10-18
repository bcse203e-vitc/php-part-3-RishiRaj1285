<?php
$img = imagecreate(250, 250);
$bg = imagecolorallocate($img, 255, 255, 255);
for ($i = 0; $i < 10; $i++) {
    $color = imagecolorallocate($img, rand(0,255), rand(0,255), rand(0,255));
    imagefilledellipse($img, rand(20,230), rand(20,230), 50, 50, $color);
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
