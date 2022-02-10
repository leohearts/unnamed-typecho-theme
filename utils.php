<?php
require_once 'vendor/autoload.php';
use kornrunner\Blurhash\Blurhash;

function encodeBlurhash($file){
    $image = imagecreatefromstring(file_get_contents($file));
    $width = imagesx($image);
    $height = imagesy($image);

    $skip_w = intval($width / min(64, $width));
    $skip_h = intval($height / min(64, $height));

    $pixels = [];
    for ($y = 0; $y < $height; $y += $skip_h) {
        $row = [];
        for ($x = 0; $x < $width; $x += $skip_w) {
            $index = imagecolorat($image, $x, $y);
            $colors = imagecolorsforindex($image, $index);

            $row[] = [$colors['red'], $colors['green'], $colors['blue']];
        }
        $pixels[] = $row;
    }

    $components_x = 4;
    $components_y = 3;
    $blurhash = Blurhash::encode($pixels, $components_x, $components_y);
    return Array("hash"=>$blurhash, "height"=>$height, "width"=>$width);
}