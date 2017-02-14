<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');

class Something
{

    private $log;

    public function __construct()
    {
        return $this->log = Logger::getLogger(__CLASS__);
    }

    public function run()
    {
        $this->log->info("INFORMACION");

    }
}

$logger = new Something();
$logger->run();
