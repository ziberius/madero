<?php

require_once dirname(__FILE__) . '/../database/PostsFromCategory.php';
require_once dirname(__FILE__) . '/../database/PostsFromAuthor.php';
require_once dirname(__FILE__) . '/../database/PostsFromId.php';
require_once dirname(__FILE__) . '/../database/SearchPosts.php';
require_once dirname(__FILE__) . '/Embedly.php';
require_once dirname(__FILE__) . '/../util/Converter.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');

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
        $instance = PostsFromCategory::getInstance();
        $posts = $instance->selectPosts($startDate, $endDate, $limit, $offset, $category);
        $resources = $instance->selectResources($startDate, $endDate, $limit, $offset, $category);
        $postMetas = $instance->selectPostMetas($startDate, $endDate, $limit, $offset, $category);

        return $this->processMaps($posts, $resources, $postMetas);

    }

    public function postsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $instance = PostsFromAuthor::getInstance();
        $posts = $instance->selectPosts($startDate, $endDate, $limit, $offset, $idAuthor);
        $resources = $instance->selectResources($startDate, $endDate, $limit, $offset, $idAuthor);
        $postMetas = $instance->selectPostMetas($startDate, $endDate, $limit, $offset, $idAuthor);

        return $this->processMaps($posts, $resources, $postMetas);

    }

    public function postFromId($idPost)
    {
        $instance = PostsFromId::getInstance();
        $posts = $instance->selectPost($idPost);
        $resources = $instance->selectResources($idPost);
        $postMetas = $instance->selectPostMetas($idPost);

        return $this->processMaps($posts, $resources, $postMetas);
    }

    public function postFromSearch($limit, $offset, $keyword)
    {
        $instance = SearchPosts::getInstance();
        $posts = $instance->selectPosts($limit, $offset, $keyword);
        $resources = $instance->selectResources($limit, $offset, $keyword);
        $postMetas = $instance->selectPostMetas($limit, $offset, $keyword);

        return $this->processMaps($posts, $resources, $postMetas);
    }

    private function processMaps($posts, $resources, $postMetas)
    {
        $postMap = array();
        foreach ($posts as $item) {
            $post = Converter::toPost($item);
            $postMap[$post->getId()] = $post;
        }

        $resourcesMap = array();
        foreach ($resources as $item) {
            $post = Converter::toPost($item);

            if (empty($resourcesMap[$post->getIdParent()])) {
                $resourcesMap[$post->getIdParent()] = array($post->getPreparedJsonData());
            } else {
                array_push($resourcesMap[$post->getIdParent()], $post->getPreparedJsonData());
            }

        }

        $postMetaMap = array();
        foreach ($postMetas as $item) {
            $postMeta = Converter::toPostMeta($item);

            if (empty($postMetaMap[$postMeta->getIdPost()])) {
                $postMetaMap[$postMeta->getIdPost()] = array($postMeta->getPreparedJsonData());
            } else {
                array_push($postMetaMap[$postMeta->getIdPost()], $postMeta->getPreparedJsonData());
            }
        }

        foreach ($postMap as $idPost => $post) {

            if (!empty($resourcesMap[$idPost])) {
                $post->setResources($resourcesMap[$idPost]);
            }

            if (!empty($postMetaMap[$idPost])) {
                $post->setPostMeta($postMetaMap[$idPost]);
            }

            $this->getEmbedly($post);

        }
        return $postMap;
    }

    private function getEmbedly(&$post)
    {
        if ($post->getCategory() == 'EXTERNO') {

            $url = $post->getContent();
            $url = trim($url);

            if (filter_var($url, FILTER_VALIDATE_URL)) {
                $this->log->debug(sprintf('content is a validated url [%s]', $url));

                $embedly = new Embedly();
                $oembeds = $embedly->getOembeds(array($url));
                $this->log->debug($oembeds);
                $post->setEmbedly($oembeds);

            }
        }
    }

}