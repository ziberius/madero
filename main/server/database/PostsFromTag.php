<?php

require_once dirname(__FILE__) . '/DataBaseConnection.php';
require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class PostsFromTag
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

    public function selectPosts($limit, $offset, $idTag)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        $procedureName = "sp_select_post_from_tag";
        return $this->executeProcedure($limit, $offset, $idTag, $procedureName);
    }

    public function selectResources($limit, $offset, $idTag)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        $procedureName = "sp_select_resources_from_tag";
        return $this->executeProcedure($limit, $offset, $idTag, $procedureName);
    }


    public function selectPostMetas($limit, $offset, $idTag)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        $procedureName = "sp_select_post_meta_from_tag";
        return $this->executeProcedure($limit, $offset, $idTag, $procedureName);
    }


    public function selectPostTags($limit, $offset, $idTag)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        $procedureName = "sp_select_post_tag_from_tag";
        return $this->executeProcedure($limit, $offset, $idTag, $procedureName);
    }

    public function selectCategories($limit, $offset, $idTag)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], idTag[%s]', $limit, $offset, $idTag));

        $procedureName = "sp_select_categories_from_tag";
        return $this->executeProcedure($limit, $offset, $idTag, $procedureName);
    }

    private function executeProcedure($limit, $offset, $idTag, $procedureName)
    {
        $this->validateParameters($limit, $offset, $idTag);

        $sql = 'CALL ' . $procedureName . '(:limit,:offset,:idTag); ';

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':idTag', $idTag, PDO::PARAM_INT);

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

    private function validateParameters($limit, $offset, $idTag)
    {

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_numeric($idTag)) {
            throw new Exception(sprintf('idTag must be numeric [%s]', $idTag));
        }

    }


}
