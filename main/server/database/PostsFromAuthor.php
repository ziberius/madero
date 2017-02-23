<?php

require_once dirname(__FILE__) . '/DataBaseConnection.php';
require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class PostsFromAuthor
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

    public function selectPosts($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
            , $startDate, $endDate, $limit, $offset, $idAuthor));

        $procedureName = "sp_select_post_from_author";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $idAuthor, $procedureName);
    }

    public function selectResources($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
            , $startDate, $endDate, $limit, $offset, $idAuthor));

        $procedureName = "sp_select_resources_from_author";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $idAuthor, $procedureName);
    }


    public function selectPostMetas($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
            , $startDate, $endDate, $limit, $offset, $idAuthor));

        $procedureName = "sp_select_post_meta_from_author";
        return $this->executeProcedure($startDate, $endDate, $limit, $offset, $idAuthor, $procedureName);
    }

    private function executeProcedure($startDate, $endDate, $limit, $offset, $idAuthor, $procedureName)
    {
        $this->validateParameters($startDate, $endDate, $limit, $offset, $idAuthor);

        $sql = 'CALL ' . $procedureName . '(:startDate,:endDate,:limit,:offset,:idAuthor); ';

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':startDate', $startDate);
            $stmt->bindParam(':endDate', $endDate);
            $stmt->bindParam(':idAuthor', $idAuthor, PDO::PARAM_INT);
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

    private function validateParameters($startDate, $endDate, $limit, $offset, $idAuthor)
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

        if (!is_numeric($idAuthor)) {
            throw new Exception(sprintf('idAuthor must be numeric [%s]', $idAuthor));
        }

    }


}
