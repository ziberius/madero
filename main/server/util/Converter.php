<?php
require_once dirname(__FILE__) . '/../response/Post.php';
require_once dirname(__FILE__) . '/../response/Author.php';
require_once dirname(__FILE__) . '/../response/PostMeta.php';
require_once dirname(__FILE__) . '/../response/PostTag.php';
require_once dirname(__FILE__) . '/../response/Category.php';

class Converter
{
    /**
     * @param $posts
     * @return array
     */
    public static function postsToArray($posts)
    {
        $results = array();
        foreach ($posts as $post) {
            array_push($results, $post->getPreparedJsonData());

        }
        return $results;
    }

    public static function toPost($item)
    {
        $post = new Post();
        $post->setId($item['id']);
        $post->setTitle($item['title']);
        $post->setContent($item['content']);
        $post->setDate($item['date']);
        $post->setDateGmt($item['date_gmt']);
        $post->setStatus($item['status']);
        $post->setType($item['type']);
        $post->setName($item['name']);
        $post->setIdParent($item['id_parent']);
        $post->setGuid($item['guid']);
        $post->setMimeType($item['mime_type']);
        $post->setModified($item['modified']);
        $post->setModifiedGmt($item['modified_gmt']);

        $author = new Author();
        $author->setId($item['id_author']);
        $author->setLogin($item['login']);
        $author->setNicename($item['nicename']);
        $author->setEmail($item['email']);
        $author->setDisplayName($item['display_name']);
        $post->setAuthor($author);
        return $post;
    }

    public static function toPostMeta($item)
    {
        $postMeta = new PostMeta();
        $postMeta->setId($item['id']);
        $postMeta->setIdPost($item['id_post']);
        $postMeta->setKey($item['meta_key']);
        $postMeta->setValue($item['value']);

        return $postMeta;

    }

    public static function toPostTag($item)
    {
        $postTag = new PostTag();
        $postTag->setId($item['id_tag']);
        $postTag->setIdPost($item['id_post']);
        $postTag->setName($item['name']);
        $postTag->setSlug($item['slug']);

        return $postTag;

    }

    public static function toCategory($item)
    {
        $category = new Category();
        $category->setId($item['id_category']);
        $category->setIdPost($item['id_post']);
        $category->setName($item['name']);

        return $category;

    }


}