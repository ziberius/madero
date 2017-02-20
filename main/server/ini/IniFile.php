<?php

class IniFile
{

    const DB_HOST = "DB_HOST";
    const DB_NAME = "DB_NAME";
    const DB_USER = "DB_USER";
    const DB_PASSWORD = "DB_PASSWORD";
    const EMBEDLY_KEY = "EMBEDLY_KEY";

    private $ini;
    private $fileName = "config.ini";
    private static $instance;

    private function __construct()
    {
        $path = dirname(__FILE__) . '/' . $this->fileName;

        if (!file_exists($path)) {
            throw new Exception("File not found in path: " . $path);
        }

        $this->ini = parse_ini_file($path);

        if ($this->ini == false) {
            throw new Exception("Syntax Error in file: " . $path);
        }
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function getValue($key)
    {
        if (empty($this->ini)) {
            throw new Exception("Ini file is empty");
        }

        if ($this->ini[$key] == '') {
            throw new Exception("Value not found for the key[" . $key . "]");
        }

        return $this->ini[$key];
    }

    public function __clone()
    {
        return new Exception("This object can not be cloned");
    }

}

