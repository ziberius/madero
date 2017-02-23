<?php
require_once dirname(__FILE__) . '/../../../main/server/database/PostsFromCategory.php';

$query = PostsFromCategory::getInstance();

//print_r($query->selectPosts("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS"));

print_r($query->selectResources("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS"));

//print_r($query->selectPostMetas("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS"));
