<?php


require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/service/News.php');


$news = new News();
//echo $news->getNews(1);
//echo $news->insertOption('CLAUDIO', 'VALUE', 'NO');

//echo $news->getInternationalNews();
//echo $news->getNewsFromCategory('01/02/2016', '28/02/2017',4, 0, 'EXTERNO');
echo $news->getNewsFromAuthor('01/02/2016', '28/02/2017', 10, 0, 'asaas');
