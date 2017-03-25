<?php
require dirname(__FILE__) . '/../../../main/server/service/Iframely.php';

$url = "https://www.youtube.com/watch?v=0AHtsbsEJtg";
$oembed = new Iframely();
print_r ($oembed->getOembeds($url));

//print_r($oembed->getOEmbedsWithWidthHeight($urls, 200, 50));