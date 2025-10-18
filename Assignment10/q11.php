<?php
$w = 200; $h = 200;
$img = imagecreate($w, $h);
for ($i = 0; $i < $w; $i++) {
    $col = imagecolorallocate($img, $i, $i, 255);
    imageline($img, $i, 0, $i, $h, $col);
}
header("Content-Type: image/png");
imagepng($img);
imagedestroy($img);
?>
