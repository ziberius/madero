<?php

require_once dirname(__FILE__) . '/DataBaseConnection.php';
require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class PostsFromCategory
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

    public function selectPosts($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
            , $startDate, $endDate, $limit, $offset, $category));

        $procedureName = "sp_select_post_from_category";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $category, $procedureName);
    }

    public function selectResources($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
            , $startDate, $endDate, $limit, $offset, $category));

        $procedureName = "sp_select_resources_from_category";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $category, $procedureName);
    }


    public function selectPostMetas($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
            , $startDate, $endDate, $limit, $offset, $category));

        $procedureName = "sp_select_post_meta_from_category";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $category, $procedureName);
    }

    private function executeProcedure($startDate, $endDate, $limit, $offset, $category, $procedureName)
    {
        $this->validateParameters($startDate, $endDate, $limit, $offset, $category);

        $sql = 'CALL ' . $procedureName . '(:startDate,:endDate,:limit,:offset,:category); ';

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':category', $category);

            $limit = (int)$limit;
            $offset = (int)$offset;
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);


            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Records found:[%d]', count($results)));
        return $results;
    }

    private function validateParameters($startDate, $endDate, $limit, $offset, $category)
    {
        if (!Validate::date($startDate)) {
            throw new Exception(sprintf('startDate must be formatted as dd/mm/yyyy [%s]', $startDate));
        }

        if (!Validate::date($endDate)) {
            throw new Exception(sprintf('endDate must be formatted as dd/mm/yyyy [%s]', $endDate));
        }

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_string($category)) {
            throw new Exception(sprintf('category must be string [%s]', $category));
        }

    }


}
