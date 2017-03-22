<?php
require_once dirname(__FILE__) . '/../../../main/server/database/PostsFromCategory.php';

$query = PostsFromCategory::getInstance();

// CALL sp_select_post_from_category('13/12/2016', '13/12/2016', 10, 0, '23,11', '28,69,24,11');

//print_r($query->selectPosts('13/12/2016', '13/12/2016', 10, 0, "23,11", "28,24"));
print_r($query->selectResources('13/12/2016', '13/12/2016', 10, 0, "23,11", "28,24"));

//print_r($query->selectPostMetas("02/03/2016", "02/03/2017", 10, 0, "NOTICIAS"));
