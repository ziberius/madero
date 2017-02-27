<?php

class Post
{

    private $id;
    private $title;
    private $content;
    private $date;
    private $date_gmt;
    private $status;
    private $type;
    private $name;
    private $id_parent;
    private $guid;
    private $mime_type;
    private $modified;
    private $modified_gmt;

    private $embedly;

    private $categories;

    private $author;
    private $resources;
    private $post_meta;
    private $tags;

    public function getPreparedJsonData()
    {
        $var = get_object_vars($this);
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value, 'getPreparedJsonData')) {
                $value = $value->getPreparedJsonData();
            }
        }
        return $var;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function getDateGmt()
    {
        return $this->date_gmt;
    }

    public function setDateGmt($date_gmt)
    {
        $this->date_gmt = $date_gmt;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getIdParent()
    {
        return $this->id_parent;
    }

    public function setIdParent($id_parent)
    {
        $this->id_parent = $id_parent;
    }

    public function getGuid()
    {
        return $this->guid;
    }

    public function setGuid($guid)
    {
        $this->guid = $guid;
    }

    public function getMimeType()
    {
        return $this->mime_type;
    }

    public function setMimeType($mime_type)
    {
        $this->mime_type = $mime_type;
    }

    public function getModified()
    {
        return $this->modified;
    }

    public function setModified($modified)
    {
        $this->modified = $modified;
    }

    public function getModifiedGmt()
    {
        return $this->modified_gmt;
    }

    public function setModifiedGmt($modified_gmt)
    {
        $this->modified_gmt = $modified_gmt;
    }

    public function getCategories()
    {
        return $this->categories;
    }

    public function setCategories($categories)
    {
        $this->categories = $categories;
    }

    public function getAuthor()
    {
        return $this->author;
    }

    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getResources()
    {
        return $this->resources;
    }

    public function setResources($resources)
    {
        $this->resources = $resources;
    }

    public function getPostMeta()
    {
        return $this->post_meta;
    }

    public function setPostMeta($post_meta)
    {
        $this->post_meta = $post_meta;
    }

    public function getEmbedly()
    {
        return $this->embedly;
    }

    public function setEmbedly($embedly)
    {
        $this->embedly = $embedly;
    }

    public function getTags()
    {
        return $this->tags;
    }

    public function setTags($tags)
    {
        $this->tags = $tags;
    }

}