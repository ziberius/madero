<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/database/DataBaseConnection.php');
require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/util/Validate.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');


class Query
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

    public function selectPostFromCategory($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
            , $startDate, $endDate, $limit, $offset, $category));

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

        $sql = "SELECT ";
        $sql .= "  p.ID as id, ";
        $sql .= "  p.post_title as title, ";
        $sql .= "  p.post_author as id_author, ";
        $sql .= "  p.post_content as content, ";
        $sql .= "  p.post_date as date, ";
        $sql .= "  p.post_date_gmt as date_gmt, ";
        $sql .= "  p.post_status as status, ";
        $sql .= "  p.post_type as type, ";
        $sql .= "  p.post_name as name, ";
        $sql .= "  p.post_parent as id_parent, ";
        $sql .= "  p.guid as guid, ";
        $sql .= "  p.post_mime_type as mime_type, ";
        $sql .= "  p.post_modified as modified, ";
        $sql .= "  p.post_modified_gmt as modified_gmt, ";
        $sql .= "  ter.name as category ";
        $sql .= "FROM wp_posts p ";
        $sql .= "  INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id) ";
        $sql .= "  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ";
        $sql .= "  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id ";
        $sql .= "WHERE DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y') ";
        $sql .= "      AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y') ";
        $sql .= "      AND p.post_status = 'publish' ";
        $sql .= "    AND p.post_type = 'post' ";
        $sql .= "    AND tax.taxonomy = 'category' ";
        $sql .= "    AND ter.name = :category ";
        $sql .= "ORDER BY p.post_date DESC ";
        $sql .= "LIMIT :limit OFFSET :offset ";


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
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;
    }

    public function selectAuthor($idAuthor)
    {
        $this->log->debug(sprintf('parameters: idAuthor[%s]', $idAuthor));

        if (!is_numeric($idAuthor)) {
            throw new Exception(sprintf('idAuthor must be numeric [%s]', $idAuthor));
        }

        $sql = "SELECT ";
        $sql .= "  ID as id, ";
        $sql .= "  user_login as login, ";
        $sql .= "  user_nicename as nicename, ";
        $sql .= "  user_email as email, ";
        $sql .= "  display_name ";
        $sql .= "FROM wp_users ";
        $sql .= "WHERE ID = :idAuthor AND user_status = 0  ";

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':idAuthor', $idAuthor, PDO::PARAM_INT);

            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;
    }

    public function selectPostMetaOpinion($idPost)
    {
        $this->log->debug(sprintf('parameters: idPost[%s]', $idPost));

        if (!is_numeric($idPost)) {
            throw new Exception(sprintf('idPost must be numeric [%s]', $idPost));
        }
        $sql = "SELECT ";
        $sql .= "  meta_id as id, ";
        $sql .= "  post_id as idPost, ";
        $sql .= "  meta_key, ";
        $sql .= "  meta_value as value ";
        $sql .= "FROM wp_postmeta ";
        $sql .= "WHERE post_id = :idPost  ";
        $sql .= "  AND meta_key IN ('OPINION-AUTOR','OPINION-TWITTER','OPINION-CARGO') ";

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':idPost', $idPost, PDO::PARAM_INT);

            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;
    }

    public function selectPostFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->debug(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
            , $startDate, $endDate, $limit, $offset, $idAuthor));

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

        $sql = "SELECT ";
        $sql .= "  p.ID as id, ";
        $sql .= "  p.post_title as title, ";
        $sql .= "  p.post_author as id_author, ";
        $sql .= "  p.post_content as content, ";
        $sql .= "  p.post_date as date, ";
        $sql .= "  p.post_date_gmt as date_gmt, ";
        $sql .= "  p.post_status as status, ";
        $sql .= "  p.post_type as type, ";
        $sql .= "  p.post_name as name, ";
        $sql .= "  p.post_parent as id_parent, ";
        $sql .= "  p.guid as guid, ";
        $sql .= "  p.post_mime_type as mime_type, ";
        $sql .= "  p.post_modified as modified, ";
        $sql .= "  p.post_modified_gmt as modified_gmt, ";
        $sql .= "  ter.name as category ";
        $sql .= "FROM wp_posts p ";
        $sql .= "  INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id) ";
        $sql .= "  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ";
        $sql .= "  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id ";
        $sql .= "WHERE DATE(p.post_date) >= STR_TO_DATE(:startDate, '%d/%m/%Y') ";
        $sql .= "    AND DATE(p.post_date) <= STR_TO_DATE(:endDate, '%d/%m/%Y') ";
        $sql .= "    AND p.post_status = 'publish' ";
        $sql .= "    AND p.post_type = 'post' ";
        $sql .= "    AND p.post_author = :idAuthor ";
        $sql .= "    AND tax.taxonomy = 'category' ";
        $sql .= "    AND ter.name <> 'OPINION' ";
        $sql .= "ORDER BY p.post_date DESC ";
        $sql .= "LIMIT :limit OFFSET :offset ";


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
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;
    }

    public function selectPostFromId($id)
    {
        $this->log->debug(sprintf('parameters: id[%s]', $id));

        if (!is_numeric($id)) {
            throw new Exception(sprintf('id must be numeric [%s]', $id));
        }

        $sql = "SELECT ";
        $sql .= "  p.ID as id, ";
        $sql .= "  p.post_title as title, ";
        $sql .= "  p.post_author as id_author, ";
        $sql .= "  p.post_content as content, ";
        $sql .= "  p.post_date as date, ";
        $sql .= "  p.post_date_gmt as date_gmt, ";
        $sql .= "  p.post_status as status, ";
        $sql .= "  p.post_type as type, ";
        $sql .= "  p.post_name as name, ";
        $sql .= "  p.post_parent as id_parent, ";
        $sql .= "  p.guid as guid, ";
        $sql .= "  p.post_mime_type as mime_type, ";
        $sql .= "  p.post_modified as modified, ";
        $sql .= "  p.post_modified_gmt as modified_gmt, ";
        $sql .= "  ter.name as category ";
        $sql .= "FROM wp_posts p ";
        $sql .= "  INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id) ";
        $sql .= "  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ";
        $sql .= "  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id ";
        $sql .= "WHERE p.ID =:id ";
        $sql .= "  AND tax.taxonomy = 'category' ";


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
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;

    }

    public function selectPostFromIdParent($idParent)
    {
        $this->log->debug(sprintf('parameters: idParent[%s]', $idParent));

        if (!is_numeric($idParent) || $idParent <= 0) {
            throw new Exception(sprintf('idParent must be numeric and more than zero [%s] ', $idParent));
        }

        $sql = "SELECT ";
        $sql .= "  p.ID as id, ";
        $sql .= "  p.post_title as title, ";
        $sql .= "  p.post_author as id_author, ";
        $sql .= "  p.post_content as content, ";
        $sql .= "  p.post_date as date, ";
        $sql .= "  p.post_date_gmt as date_gmt, ";
        $sql .= "  p.post_status as status, ";
        $sql .= "  p.post_type as type, ";
        $sql .= "  p.post_name as name, ";
        $sql .= "  p.post_parent as id_parent, ";
        $sql .= "  p.guid as guid, ";
        $sql .= "  p.post_mime_type as mime_type, ";
        $sql .= "  p.post_modified as modified, ";
        $sql .= "  p.post_modified_gmt as modified_gmt, ";
        $sql .= "  ter.name as category ";
        $sql .= "FROM wp_posts p ";
        $sql .= "  LEFT JOIN wp_term_relationships rel ON (p.ID = rel.object_id) ";
        $sql .= "  LEFT JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ";
        $sql .= "  LEFT JOIN wp_terms ter ON ter.term_id = tax.term_id ";
        $sql .= "WHERE p.post_parent =:idParent ";
        $sql .= "AND p.post_type ='attachment' ";
        $sql .= "ORDER BY p.post_date DESC ";

        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);
            $stmt->bindParam(':idParent', $idParent, PDO::PARAM_INT);

            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;

    }

    public function selectPostFromTitleAndContent($limit, $offset, $keyword)
    {
        $this->log->debug(sprintf('parameters: limit[%s], offset[%s], keyword[%s]', $limit, $offset, $keyword));

        if (!Validate::isNaturalNumber($limit)) {
            throw new Exception(sprintf('limit must be natural number [%s]', $limit));
        }

        if (!Validate::isNaturalNumber($offset)) {
            throw new Exception(sprintf('offset must be natural number [%s]', $offset));
        }

        if (!is_string($keyword)) {
            throw new Exception(sprintf('keyword must be string [%s]', $keyword));
        }

        $sql = "SELECT ";
        $sql .= "  p.ID as id, ";
        $sql .= "  p.post_title as title, ";
        $sql .= "  p.post_author as id_author, ";
        $sql .= "  p.post_content as content, ";
        $sql .= "  p.post_date as date, ";
        $sql .= "  p.post_date_gmt as date_gmt, ";
        $sql .= "  p.post_status as status, ";
        $sql .= "  p.post_type as type, ";
        $sql .= "  p.post_name as name, ";
        $sql .= "  p.post_parent as id_parent, ";
        $sql .= "  p.guid as guid, ";
        $sql .= "  p.post_mime_type as mime_type, ";
        $sql .= "  p.post_modified as modified, ";
        $sql .= "  p.post_modified_gmt as modified_gmt, ";
        $sql .= "  ter.name as category ";
        $sql .= "FROM wp_posts p ";
        $sql .= "  INNER JOIN wp_term_relationships rel ON (p.ID = rel.object_id) ";
        $sql .= "  INNER JOIN wp_term_taxonomy tax ON tax.term_taxonomy_id = rel.term_taxonomy_id ";
        $sql .= "  INNER JOIN wp_terms ter ON ter.term_id = tax.term_id ";
        $sql .= "WHERE p.post_status = 'publish' ";
        $sql .= "    AND p.post_type = 'post' ";
        $sql .= "    AND (p.post_title LIKE :keyword OR p.post_content LIKE :keyword) ";
        $sql .= "    AND tax.taxonomy = 'category' ";
        $sql .= "    AND ter.name <> 'EXTERNO' ";
        $sql .= "ORDER BY p.post_date DESC ";
        $sql .= "LIMIT :limit OFFSET :offset ";


        $this->log->debug($sql);

        try {
            $stmt = $this->connection->prepare($sql);

            $limit = (int)$limit;
            $offset = (int)$offset;
            $keyword = '%' . $keyword . '%';


            $stmt->bindParam(':keyword', $keyword, PDO::PARAM_STR);
            $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
            $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);


            $stmt->execute();

        } catch (Exception $exception) {
            $this->log->error($exception);
            throw $exception;

        }

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->log->debug(sprintf('Number of records found:[%d]', count($results)));
        return $results;
    }




//TODO quizas eliminar mas adelante
    /* public function insertOption($optionNames, $optionValue, $autoload)
     {
         $sql = "INSERT INTO wp_options (option_name, option_value, autoload) ";
         $sql .= "VALUES ( :optionNames, :optionValue, :autoload );";
         $this->log->debug($sql);

         $stmt = $this->connection->prepare($sql);
         $stmt->bindParam(":optionNames", $optionNames);
         $stmt->bindParam(":optionValue", $optionValue);
         $stmt->bindParam(":autoload", $autoload);

         try {
             $this->connection->beginTransaction();
             $stmt->execute();
             $this->connection->commit();

         } catch (Exception $exception) {
             try {
                 $this->connection->rollBack();
             } catch (PDOException $PDOException) {
                 $this->log->error($PDOException);
             }
             throw $exception;

         }

     }*/

}
