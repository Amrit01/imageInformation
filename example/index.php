<?php
require '../src/imageInfo/ImageInformation.php';
use imageInfo\ImageInformation;


$img = new ImageInformation();
$imageInfo = $img->getInformation("../assets/img/test.jpg");
if ($camera) {
    echo '<img src="../assets/img/test.jpg" alt="" height="250" /> <br />';
    echo "Camera Used: " . $imageInfo['model'] . "<br />";
    echo "Maker: " . $imageInfo['maker'] . "<br />";
    echo "Exposure Time: " . $imageInfo['exposure'] . "<br />";
    echo "Aperture: " . $imageInfo['aperture'] . "<br />";
    echo "ISO: " . $imageInfo['iso'] . "<br />";
    echo "FocalLength: " . $imageInfo['focalLength'] . "<br />";
    echo "Date Taken: " . $imageInfo['date'] . "<br />";
} else {
    echo '<span style="color: red;">Image not found</span>';

}