<?php

require_once dirname(__FILE__) . '/../database/PostsFromCategory.php';
require_once dirname(__FILE__) . '/../database/PostsFromAuthor.php';
require_once dirname(__FILE__) . '/../database/PostsFromId.php';
require_once dirname(__FILE__) . '/../database/SearchPosts.php';
require_once dirname(__FILE__) . '/../database/PostsFromTag.php';
require_once dirname(__FILE__) . '/Processor.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');

class Retriever
{
    private $log;

    private static $instance;
    private $processor;

    private function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $this->processor = Processor::getInstance();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function postsFromCategory($startDate, $endDate, $limit, $offset, $idCategories)
    {
        $instance = PostsFromCategory::getInstance();
        $posts = $instance->selectPosts($startDate, $endDate, $limit, $offset, $idCategories);
        $resources = $instance->selectResources($startDate, $endDate, $limit, $offset, $idCategories);
        $postMetas = $instance->selectPostMetas($startDate, $endDate, $limit, $offset, $idCategories);
        $postTags = $instance->selectPostTags($startDate, $endDate, $limit, $offset, $idCategories);
        $categories = $instance->selectCategories($startDate, $endDate, $limit, $offset, $idCategories);

        return $this->processor->processMaps($posts, $resources, $postMetas, $postTags, $categories);

    }

    public function postsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $instance = PostsFromAuthor::getInstance();
        $posts = $instance->selectPosts($startDate, $endDate, $limit, $offset, $idAuthor);
        $resources = $instance->selectResources($startDate, $endDate, $limit, $offset, $idAuthor);
        $postMetas = $instance->selectPostMetas($startDate, $endDate, $limit, $offset, $idAuthor);
        $postTags = $instance->selectPostTags($startDate, $endDate, $limit, $offset, $idAuthor);
        $categories = $instance->selectCategories($startDate, $endDate, $limit, $offset, $idAuthor);

        return $this->processor->processMaps($posts, $resources, $postMetas, $postTags, $categories);

    }

    public function postFromId($idPost)
    {
        $instance = PostsFromId::getInstance();
        $posts = $instance->selectPost($idPost);
        $resources = $instance->selectResources($idPost);
        $postMetas = $instance->selectPostMetas($idPost);
        $postTags = $instance->selectPostTags($idPost);
        $categories = $instance->selectCategories($idPost);

        return $this->processor->processMaps($posts, $resources, $postMetas, $postTags, $categories);
    }

    public function postFromSearch($limit, $offset, $keyword)
    {
        $instance = SearchPosts::getInstance();
        $posts = $instance->selectPosts($limit, $offset, $keyword);
        $resources = $instance->selectResources($limit, $offset, $keyword);
        $postMetas = $instance->selectPostMetas($limit, $offset, $keyword);
        $postTags = $instance->selectPostTags($limit, $offset, $keyword);
        $categories = $instance->selectCategories($limit, $offset, $keyword);

        return $this->processor->processMaps($posts, $resources, $postMetas, $postTags, $categories);
    }


    public function postFromTag($limit, $offset, $idTag)
    {
        $instance = PostsFromTag::getInstance();
        $posts = $instance->selectPosts($limit, $offset, $idTag);
        $resources = $instance->selectResources($limit, $offset, $idTag);
        $postMetas = $instance->selectPostMetas($limit, $offset, $idTag);
        $postTags = $instance->selectPostTags($limit, $offset, $idTag);
        $categories = $instance->selectCategories($limit, $offset, $idTag);

        return $this->processor->processMaps($posts, $resources, $postMetas, $postTags, $categories);
    }

}