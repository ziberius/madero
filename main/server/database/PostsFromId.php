<?php

require_once dirname(__FILE__) . '/DataBaseConnection.php';
require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class PostsFromId
{

    private $log;
    private $connection;

    private static $instance;

    private function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $dataBaseConnection = DataBaseConnection::getInstance();
        $this->connection = $dataBaseConnection->getConnection();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            $class = __CLASS__;
            self::$instance = new $class;
        }
        return self::$instance;
    }

    public function selectPost($id)
    {
        $this->log->debug(sprintf('parameters: id[%s]', $id));

        $procedureName = "sp_select_post_from_id";
        return $this->executeProcedure($id, $procedureName);
    }

    public function selectResources($id)
    {
        $this->log->debug(sprintf('parameters: id[%s]', $id));

        $procedureName = "sp_select_resources_from_id";
        return $this->executeProcedure($id, $procedureName);
    }


    public function selectPostMetas($id)
    {
        $this->log->debug(sprintf('parameters: id[%s]', $id));

        $procedureName = "sp_select_post_meta_from_id";
        return $this->executeProcedure($id, $procedureName);
    }

    private function executeProcedure($id, $procedureName)
    {
        $this->validateParameters($id);

        $sql = 'CALL ' . $procedureName . '(:id); ';

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Records found:[%d]', count($results)));
        return $results;
    }

    private function validateParameters($id)
    {
        if (!is_numeric($id)) {
            throw new Exception(sprintf('id must be numeric [%s]', $id));
        }

    }


}
