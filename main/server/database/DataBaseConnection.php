<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/ini/IniFile.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');

class DataBaseConnection
{

    private $log;

    private $dbHost;
    private $dbName;
    private $dbUser;
    private $dbPassword;

    private static $instance;

    private $connection;

    private function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);

        $this->setConnectionParameter();

        $dns = "mysql:host=";
        $dns .= $this->dbHost;
        $dns .= ";dbname=";
        $dns .= $this->dbName;
        $dns .= ";charset=utf8";

        $this->connection = new PDO($dns, $this->dbUser, $this->dbPassword, array(PDO::ATTR_PERSISTENT => true));
        // set the PDO error mode to exception
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->log->debug("DataBase connection successful");

    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function __clone()
    {
        throw new Exception("It is not possible to clone this object");
    }


    private function setConnectionParameter()
    {
        $iniFile = IniFile::getInstance();
        $this->dbHost = $iniFile->getValue(IniFile::DB_HOST);
        $this->dbName = $iniFile->getValue(IniFile::DB_NAME);
        $this->dbUser = $iniFile->getValue(IniFile::DB_USER);
        $this->dbPassword = $iniFile->getValue(IniFile::DB_PASSWORD);

    }

    public function getConnection()
    {
        return $this->connection;
    }


}