<?php

require_once dirname(__FILE__) . '/service/Posts.php';

$postId = $_GET['id_post'];
$posts = new Posts();
$result =  $posts->getFromId($postId);


echo "<html><head>"
. "<meta property='og:title' content='". $result[0]['title']  ."' />"
. "<meta property='og:description' content='' />"
. "<meta property='og:image' content='". $result[0]['resources'][0]['guid'] ."' />"
. "<meta property='og:url' content='http://". $_SERVER[HTTP_HOST]. $_SERVER[REQUEST_URI] ."' />"
. "</head>"
. "<body><body></html>";
