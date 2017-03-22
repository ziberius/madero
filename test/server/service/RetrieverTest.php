<?php

require_once dirname(__FILE__) . '/../../../main/server/service/Retriever.php';

$retriever = Retriever::getInstance();

// CALL sp_select_post_from_category('13/12/2016', '13/12/2016', 10, 0, '23,11', '28,69,24,11');
print_r($retriever->postsFromCategory('13/12/2016', '13/12/2016', 10, 0, '23,11',''));
//print_r($retriever->postFromId(16673));