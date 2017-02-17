<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/service/Posts.php');


$posts = new Posts();
//echo $posts->getFromCategory('01/02/2016', '28/02/2017',4, 0, 'EXTERNO');
//echo $posts->getFromAuthor('01/02/2016', '28/02/2017', 10, 0, 'asaas');
//print_r($posts->getFromId(16250));
print_r($posts->search(10, 0, 'toconao'));
