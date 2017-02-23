<?php

require dirname(__FILE__) . '/../../../main/server/service/Posts.php';


$posts = new Posts();
print_r($posts->getFromCategory("02/03/2016", "02/03/2017", 4, 0, "EXTERNO"));
//print_r $posts->getFromAuthor('01/02/2016', '28/02/2017', 10, 0, 'asaas');
//print_r($posts->getFromId(16250));
//print_r($posts->search(10, 0, 'toconao'));
