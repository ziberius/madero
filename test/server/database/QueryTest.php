<?php
require dirname(__FILE__) . '/../../../main/server/database/Query.php';

$query = Query::getInstance();

//print_r($query->selectPostFromCategory('01/02/2017', '28/02/2017', 0, 0, 'EXTERNO'));

//print_r($query->selectAuthor(4));

print_r($query->selectPostMetaOpinion(16755));

//print_r($query->selectPostFromAuthor('01/08/2015', '28/10/2016', 5, 0, 4));

//print_r($query->selectPostFromId('-23'));


//print_r($query->selectPostFromIdParent(0));

//print_r($query->selectPostFromTitleAndContent(10, 0, 'toconao'));
