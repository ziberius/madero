<?php

require_once dirname(__FILE__) . '/DataBaseConnection.php';
require_once dirname(__FILE__) . '/../util/Validate.php';

require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');


class SearchPosts
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

    public function selectPosts($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        $procedureName = "sp_select_post_from_search";
        return $this->executeProcedure($limit, $offset, $keyword, $procedureName);
    }

    public function selectResources($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        $procedureName = "sp_select_resources_from_search";
        return $this->executeProcedure($limit, $offset, $keyword, $procedureName);
    }

    public function selectPostMetas($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        $procedureName = "sp_select_post_meta_from_search";
        return $this->executeProcedure($limit, $offset, $keyword, $procedureName);
    }

    public function selectPostTags($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        $procedureName = "sp_select_post_tag_from_search";
        return $this->executeProcedure($limit, $offset, $keyword, $procedureName);
    }

    public function selectCategories($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        $procedureName = "sp_select_categories_from_search";
        return $this->executeProcedure($limit, $offset, $keyword, $procedureName);
    }

    private function executeProcedure($limit, $offset, $keyword, $procedureName)
    {
        $this->validateParameters($limit, $offset, $keyword);

        $sql = 'CALL ' . $procedureName . '(:limit,:offset,:keyword); ';

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);

            $limit = (int)$limit;
            $offset = (int)$offset;

            $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
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

    private function validateParameters($limit, $offset, $keyword)
    {
        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_string($keyword)) {
            throw new Exception(sprintf('keyword must be string [%s]', $keyword));
        }

    }

}
