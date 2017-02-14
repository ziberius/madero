<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Post.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Author.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/PostMeta.php');

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

    /**
     * @param $item
     * @return Author
     */
    public static function toAuthor($item)
    {
        $element = $item[0];

        $author = new Author();
        $author->setId($element['id']);
        $author->setLogin($element['login']);
        $author->setNicename($element['nicename']);
        $author->setEmail($element['email']);
        $author->setDisplayName($element['display_name']);

        return $author;

    }

    /**
     * @param $item
     * @return Post
     */
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
        $post->setCategory($item['category']);

        $post->setAuthor($item['id_author']);
        return $post;
    }

    /**
     * @param $item
     * @return PostMeta
     */
    public static function toPostMeta($item)
    {
        $postMeta = new PostMeta();
        $postMeta->setId($item['id']);
        $postMeta->setKey($item['meta_key']);
        $postMeta->setValue($item['value']);

        return $postMeta;

    }
}