<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/service/News.php');


$news = new News();
//echo $news->getNews(1);
//echo $news->insertOption('CLAUDIO', 'VALUE', 'NO');

//echo $news->getInternationalNews();
echo $news->getNewsFromCategory('01/02/2017', '28/02/2017', 5, 0, 'EXTERNAL');
