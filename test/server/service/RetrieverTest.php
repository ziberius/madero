<?php

require_once dirname(__FILE__) . '/../../../main/server/service/Retriever.php';

$retriever = Retriever::getInstance();

print_r($retriever->postsFromCategory("02/03/2016", "02/03/2017", 4, 0, "EXTERNO"));