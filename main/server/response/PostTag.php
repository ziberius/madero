<?php

class PostTag
{
    private $id;
    private $id_post;
    private $name;
    private $slug;

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

    public function getIdPost()
    {
        return $this->id_post;
    }

    public function setIdPost($id_post)
    {
        $this->id_post = $id_post;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getSlug()
    {
        return $this->slug;
    }

    public function setSlug($slug)
    {
        $this->slug = $slug;
    }

}