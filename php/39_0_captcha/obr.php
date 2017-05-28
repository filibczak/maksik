<?php
$pool = '1234567890qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
$img_width = 600;
$img_height = 300;
$pool_length = 7;
$pool_length = 1;

$text = "Jestes rzwyciesca";

$str = '';
for($i = 0; $i < $pool_length; $i++){
	$str.= substr($pool, mt_rand(0, strlen($pool) -1), 1);
}

$string = $str;

$im = imagecreate($img_width, $img_height);
$bg_color = imagecolorallocate($im, 52, 238, 141);
$grid_color   = imagecolorallocate($im,31,0,0);
$font_color   = imagecolorallocate($im,252,252,252);

imagefill($im, 0, 0, $bg_color);
imagesetthickness($im, 75);
imageline($im, 0, 0, 600, 300, $grid_color);

for($i = 0; $i < strlen($text); $i++){
	$char = substr($text, $i, 1);
	imagestring($im, 5, ($i*30), ($i*15)+8, $char, $font_color);
}

header("Content-type: image/gif");
imagegif($im);
imagedestroy($im);
?>