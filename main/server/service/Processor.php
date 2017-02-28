<?php
require_once dirname(__FILE__) . '/Embedly.php';
require_once dirname(__FILE__) . '/../util/Converter.php';
require_once dirname(__FILE__) . '/../response/Category.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');

class Processor
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

    public function processMaps($posts, $resources, $postMetas, $postTags, $categories)
    {
        $postMap = array();
        foreach ($posts as $item) {
            $post = Converter::toPost($item);
            $postMap[$post->getId()] = $post;
        }

        $postMetaMap = array();
        $idPostThumbnailMap = array(); //Map contains key:[idPost] and value:[idPost of _thumbnail_id of metadata]
        $this->createPostMetaAndThumbnailMaps($postMetas, $postMetaMap, $idPostThumbnailMap);

        $resourcesMap = $this->createResourcesMap($resources);

        $this->addThumbnailPost($idPostThumbnailMap, $resourcesMap);

        $postTagsMap = $this->createTagsMap($postTags);

        $categoriesMap = $this->createCategoriesMap($categories);

        foreach ($postMap as $idPost => $post) {

            if (!empty($postMetaMap[$idPost])) {
                $post->setPostMeta($postMetaMap[$idPost]);
            }

            if (!empty($resourcesMap[$idPost])) {
                $post->setResources(Converter::postsToArray($resourcesMap[$idPost]));
            }

            if (!empty($postTagsMap[$idPost])) {
                $post->setTags($postTagsMap[$idPost]);
            }
            if (!empty($categoriesMap[$idPost])) {
                $post->setCategories($categoriesMap[$idPost]);
            }

            $this->getEmbedly($post);

        }
        return $postMap;
    }

    private function getEmbedly(&$post)
    {
        if (!empty($post->getCategories())) {
            foreach ($post->getCategories() as $category) {
                if ($category['name'] == 'EXTERNO') {

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

    }

    private function addThumbnailPost($idPostThumbnailMap, &$resourcesMap)
    {
        foreach ($idPostThumbnailMap as $idPost => $idPostSearched) {

            if (empty($resourcesMap) || empty($resourcesMap[$idPost])) {
                $this->log->debug(sprintf('Getting Post[%s] of metadata, parentPost[%s]', $idPostSearched, $idPost));
                $postObtained = $this->getPostSearched($idPostSearched);
                $resourcesMap[$idPost] = array($postObtained);

            } else {
                $postFound = $this->isIdPostSearchedOnMap($idPostSearched, $resourcesMap[$idPost]);
                if (!$postFound) {
                    $this->log->debug(sprintf('Getting Post[%s] of metadata, parentPost[%s]', $idPostSearched, $idPost));
                    $postObtained = $this->getPostSearched($idPostSearched);
                    array_push($resourcesMap[$idPost], $postObtained);
                }
            }

        }
    }

    private function getPostSearched($idPostSearched)
    {
        $instance = PostsFromId::getInstance();
        $posts = $instance->selectPost($idPostSearched);
        if (!empty($posts)) {
            $this->log->info(sprintf('Post searched of metadata was obtained [%s]', $idPostSearched));
            return Converter::toPost($posts[0]);
        }
        throw new Exception((sprintf('Post of metadata can`t be obtained [%s]', $idPostSearched)));
    }

    private function createTagsMap($tags)
    {
        $tagsMap = array();
        foreach ($tags as $item) {
            $postTag = Converter::toPostTag($item);

            if (empty($tagsMap[$postTag->getIdPost()])) {
                $tagsMap[$postTag->getIdPost()] = array($postTag->getPreparedJsonData());
            } else {
                array_push($tagsMap[$postTag->getIdPost()], $postTag->getPreparedJsonData());
            }

        }

        return $tagsMap;
    }

    private function createCategoriesMap($categories)
    {
        $map = array();
        foreach ($categories as $item) {
            $category = Converter::toCategory($item);

            if (empty($map[$category->getIdPost()])) {
                $map[$category->getIdPost()] = array($category->getPreparedJsonData());
            } else {
                array_push($map[$category->getIdPost()], $category->getPreparedJsonData());
            }

        }

        return $map;
    }

    private function createResourcesMap($resources)
    {
        $resourcesMap = array();
        foreach ($resources as $item) {
            $post = Converter::toPost($item);

            if (empty($resourcesMap[$post->getIdParent()])) {
                $resourcesMap[$post->getIdParent()] = array($post);
            } else {
                array_push($resourcesMap[$post->getIdParent()], $post);
            }

        }

        return $resourcesMap;
    }

    private function createPostMetaAndThumbnailMaps($postMetas, &$postMetaMap, &$idPostThumbnailMap)
    {
        foreach ($postMetas as $item) {
            $postMeta = Converter::toPostMeta($item);

            if (empty($postMetaMap[$postMeta->getIdPost()])) {
                $postMetaMap[$postMeta->getIdPost()] = array($postMeta->getPreparedJsonData());
            } else {
                array_push($postMetaMap[$postMeta->getIdPost()], $postMeta->getPreparedJsonData());
            }

            if ($postMeta->getKey() == '_thumbnail_id') {
                $idPostThumbnailMap[$postMeta->getIdPost()] = $postMeta->getValue();
            }
        }
    }

    private function isIdPostSearchedOnMap($idPostSearched, $postResourcesArray)
    {
        foreach ($postResourcesArray as $post) {

            if ($idPostSearched == $post->getId()) {
                return true;
            }
        }
        return false;
    }
}