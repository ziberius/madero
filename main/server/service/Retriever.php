<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/database/Query.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Embedly.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Converter.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');

class Retriever
{
    private $log;

    private static $instance;

    private function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function postsFromCategory($startDate, $endDate, $limit, $offset, $category)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromCategory($startDate, $endDate, $limit, $offset, $category);

        $posts = array();
        foreach ($results as $item) {
            $post = Converter::toPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }

    public function postsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);

        $posts = array();
        foreach ($results as $item) {
            $post = Converter::toPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }

    public function postFromId($idPost)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromId($idPost);
        $posts = array();
        foreach ($results as $item) {
            $post = Converter::toPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }

    public function postFromIdParent($idParent)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromIdParent($idParent);
        $posts = array();
        foreach ($results as $item) {
            $post = Converter::toPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }

    public function postsFromTitleAndContent($limit, $offset, $keyword)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromTitleAndContent($limit, $offset, $keyword);

        $posts = array();
        foreach ($results as $item) {
            $post = Converter::toPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }


    public function postMetaOpinion(&$post)
    {
        $query = Query::getInstance();

        $idPost = $post->getId();

        $results = $query->selectPostMetaOpinion($idPost);
        if (!empty($results)) {
            $postMetas = array();
            foreach ($results as $item) {
                $postMeta = Converter::toPostMeta($item);
                array_push($postMetas, $postMeta->getPreparedJsonData());
            }

            $post->setPostMeta($postMetas);
        }
    }

    public function author(&$post)
    {
        $query = Query::getInstance();

        $idAuthor = $post->getAuthor();
        $result = $query->selectAuthor($idAuthor);
        if (!empty($result)) {
            $author = Converter::toAuthor($result);
            $post->setAuthor($author);
        }
    }

    public function embedly(&$post)
    {
        $url = $post->getContent();
        $url = trim($url);
        //TODO validar la categoria=EXTERNO tambien!!!


        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->log->debug(sprintf('content is a validated url [%s]', $url));

            $embedly = new Embedly();
            $oembeds = $embedly->getOembeds(array($url));
            $this->log->debug($oembeds);
            $post->setEmbedly($oembeds);

        }
    }


}