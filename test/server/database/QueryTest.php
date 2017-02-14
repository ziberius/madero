<?php
require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/database/Query.php');

$query = Query::getInstance();

print_r($query->selectPostFromCategory('01/02/2017', '28/02/2017', 0, 0, 'EXTERNO'));

//print_r($query->selectAuthor(4));

//print_r( $query->selectPostMeta(77));

//print_r($query->selectPostFromAuthor('01/08/2015', '28/10/2016', 5, 0, 4));

