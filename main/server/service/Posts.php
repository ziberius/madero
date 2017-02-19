<?php
require_once '../database/Query.php';
require_once 'Embedly.php';

require_once '../util/Validate.php';

require_once 'Converter.php';
require_once 'Retriever.php';

require_once '../lib/log4php/Logger.php';
Logger::configure('../log/log4phpConfig.xml');


class Posts
{
    private $log;
    private $retriever;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $this->retriever = Retriever::getInstance();
    }

    public function getFromCategory($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->info(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
            , $startDate, $endDate, $limit, $offset, $category));

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

        if (!is_string($category)) {
            throw new Exception(sprintf('category must be string [%s]', $category));
        }

        $posts = $this->retriever->postsFromCategory($startDate, $endDate, $limit, $offset, $category);

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $this->retriever->postMetaOpinion($post);

                $this->retriever->author($post);

                $this->retriever->embedly($post);

            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

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

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $this->retriever->author($post);

                $this->retriever->embedly($post);

            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

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

        $posts = $this->retriever->postsFromTitleAndContent($limit, $offset, $keyword);

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $this->retriever->postMetaOpinion($post);

                $this->retriever->author($post);

            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

    }


    public function getFromId($idPost)
    {
        $this->log->info(sprintf('parameters: idPost[%s]', $idPost));

        if (!is_numeric($idPost)) {
            throw new Exception(sprintf('idPost must be numeric [%s]', $idPost));
        }

        $posts = $this->retriever->postFromId($idPost);

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {
                $this->retriever->postMetaOpinion($post);

                $this->retriever->author($post);

                $this->retriever->embedly($post);

                if ($idPost > 0) {
                    $this->log->info(sprintf('getting resources idPost[%s]', $idPost));
                    $resources = $this->retriever->postFromIdParent($idPost);
                    $resourcesArray = Converter::postsToArray($resources);
                    $post->setResources($resourcesArray);
                }
            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

    }

}



