<?php
require_once dirname(__FILE__) . '/Embedly.php';

require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/Retriever.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class Posts
{
    private $log;
    private $retriever;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $this->retriever = Retriever::getInstance();
    }

    public function getFromCategory($startDate, $endDate, $limit, $offset, $idCategories)
    {
        $this->log->info(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idCategories[%s]'
            , $startDate, $endDate, $limit, $offset, $idCategories));

        if (!Validate::date($startDate)) {
            throw new Exception(sprintf('startDate must be formatted as dd/mm/yyyy [%s]', $startDate));
        }

        if (!Validate::date($endDate)) {
            throw new Exception(sprintf('endDate must be formatted as dd/mm/yyyy [%s]', $endDate));
        }

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_string($idCategories)) {
            throw new Exception(sprintf('category must be string [%s]', $idCategories));
        }

        $posts = $this->retriever->postsFromCategory($startDate, $endDate, $limit, $offset, $idCategories);
        return Converter::postsToArray($posts);

    }

    public function getFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->info(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
            , $startDate, $endDate, $limit, $offset, $idAuthor));


        if (!Validate::date($startDate)) {
            throw new Exception(sprintf('startDate must be formatted as dd/mm/yyyy [%s]', $startDate));
        }

        if (!Validate::date($endDate)) {
            throw new Exception(sprintf('endDate must be formatted as dd/mm/yyyy [%s]', $endDate));
        }

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_numeric($idAuthor)) {
            throw new Exception(sprintf('idAuthor must be numeric [%s]', $idAuthor));
        }

        $posts = $this->retriever->postsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);

        return Converter::postsToArray($posts);


    }

    public function getFromId($idPost)
    {
        $this->log->info(sprintf('parameters: idPost[%s]', $idPost));

        if (!is_numeric($idPost)) {
            throw new Exception(sprintf('idPost must be numeric [%s]', $idPost));
        }

        $posts = $this->retriever->postFromId($idPost);

        return Converter::postsToArray($posts);

    }

    public function search($limit, $offset, $keyword)
    {

        $this->log->info(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_string($keyword)) {
            throw new Exception(sprintf('keyword must be string [%s]', $keyword));
        }

        $posts = $this->retriever->postFromSearch($limit, $offset, $keyword);
        return Converter::postsToArray($posts);

    }

    public function getFromIdTag($limit, $offset, $idTag)
    {

        $this->log->info(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_numeric($idTag)) {
            throw new Exception(sprintf('idTag must be numeric [%s]', $idTag));
        }

        $posts = $this->retriever->postFromTag($limit, $offset, $idTag);
        return Converter::postsToArray($posts);

    }

}



