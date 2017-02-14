<?php

class Data
{

    private $posts;

    public function getPreparedJsonData()
    {
        $var = get_object_vars($this);
        print_r($var);
        echo '================';
        foreach ($var as &$value) {
            print_r($value);
            echo '###########';

            echo 'is_object($value): ' . is_object($value);


            if (is_object($value) && method_exists($value, 'getPreparedJsonData')) {
                echo 'TRUE';
                $value = $value->getPreparedJsonData();
            }
        }
        return $var;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function setPosts($posts)
    {
        $this->posts = $posts;
    }

}