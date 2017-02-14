<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/database/Query.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Embedly.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Response.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Post.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Author.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/PostMeta.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/ErrorResponse.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');

/*$postData = file_get_contents("php://input");
$request = json_decode($postData, true);

$options = array(
    'options' => array(
        'min_range' => 0,
        'max_range' => 1000
    )
);
$postAuthor = filter_var($request['postAuthor'], FILTER_SANITIZE_NUMBER_INT);

if ($postAuthor == false) {

    $data = Response::withDataStatusMethod('', Response::STATUS_NOK, Response::METHOD_POST);
    $data->setErrorResponse(ErrorResponse::withMessage('postAuthor no es un numero'));
    echo json_encode($data->getJsonData());

} else {
    $news = new News();
    echo $news->getNews($postAuthor);

}*/


class News
{
    private $log;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
    }

    public function getNewsFromCategory($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->info(sprintf('startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s] '
            , $startDate, $endDate, $limit, $offset, $category));
        $response = '';
        try {

            $posts = $this->retrievePosts($startDate, $endDate, $limit, $offset, $category);

            foreach ($posts as $post) {

                $this->retrieveMetaPost($post);

                $this->retrieveAuthor($post);

                $this->retrieveEmbledy($post);

            }

            $result = $this->convertToArray($posts);

            $response = Response::instance($result, Response::STATUS_OK, Response::METHOD_POST);

        } catch (Exception $exception) {
            $this->log->error($exception);
            $response = Response::instance('', Response::STATUS_NOK, Response::METHOD_POST);
            $response->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));

        }
        return json_encode($response->getPreparedJsonData());

    }

    private function retrievePosts($startDate, $endDate, $limit, $offset, $category)
    {
        $query = Query::getInstance();
        $results = $query->selectPostFromCategory($startDate, $endDate, $limit, $offset, $category);

        $posts = array();
        foreach ($results as $item) {
            $post = $this->convertToPost($item);
            array_push($posts, $post);
        }

        return $posts;

    }

    private function retrieveMetaPost(&$post)
    {
        $query = Query::getInstance();

        $idPost = $post->getId();

        $results = $query->selectPostMeta($idPost);
        if (!empty($results)) {

            $postMetas = array();
            foreach ($results as $item) {
                $postMeta = $this->convertToPostMeta($item);
                array_push($postMetas, $postMeta->getPreparedJsonData());
            }

            $post->setPostMeta($postMetas);
        }
    }

    private function retrieveAuthor(&$post)
    {

        $query = Query::getInstance();

        $idAuthor = $post->getAuthor();
        $result = $query->selectAuthor($idAuthor);
        if (empty($result)) {
            return new Author();
        }
        $author = $this->convertToAuthor($result);
        $post->setAuthor($author);

    }

    private function retrieveEmbledy(&$post)
    {
        $url = $post->getContent();
        $url = trim($url);
        if (filter_var($url, FILTER_VALIDATE_URL)) {
            $this->log->debug(sprintf('content is a validated url [%s]', $url));

            $embedly = new Embedly();
            $oembeds = $embedly->getOembeds(array($url));
            $this->log->debug($oembeds);
            $post->setEmbedly($oembeds);

        }

    }

    private function convertToArray($posts)
    {
        $result = array();
        foreach ($posts as $post) {
            array_push($result, $post->getPreparedJsonData());

        }
        return $result;
    }

    private function convertToAuthor($item)
    {
        $element = $item[0];

        $author = new Author();
        $author->setId($element['id']);
        $author->setLogin($element['login']);
        $author->setNicename($element['nicename']);
        $author->setEmail($element['email']);
        $author->setDisplayName($element['display_name']);

        return $author;

    }

    private function convertToPost($item)
    {
        $post = new Post();
        $post->setId($item['id']);
        $post->setTitle($item['title']);
        $post->setContent($item['content']);
        $post->setDate($item['date']);
        $post->setDateGmt($item['date_gmt']);
        $post->setStatus($item['status']);
        $post->setType($item['type']);
        $post->setName($item['name']);
        $post->setIdParent($item['id_parent']);
        $post->setGuid($item['guid']);
        $post->setMimeType($item['mime_type']);
        $post->setModified($item['modified']);
        $post->setModifiedGmt($item['modified_gmt']);
        $post->setCategory($item['category']);

        $post->setAuthor($item['id_author']);
        return $post;
    }

    private function convertToPostMeta($item)
    {

        $postMeta = new PostMeta();
        $postMeta->setId($item['id']);
        $postMeta->setKey($item['meta_key']);
        $postMeta->setValue($item['value']);

        return $postMeta;

    }

    public function getNews($postAuthor)
    {
        $this->log->debug('$postAutor [' . $postAuthor . ']');
        $data = '';
        try {
            $query = Query::getInstance();
            $response = $query->getRegisters($postAuthor);
            $data = Response::instance($response, Response::POST_TYPE, Response::STATUS_OK, Response::METHOD_POST);

        } catch (Exception $exception) {
            $this->log->error($exception);
            $data = Response::instance('', Response::POST_TYPE, Response::STATUS_NOK, Response::METHOD_POST);
            $data->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));
        }

        return (json_encode($data->getPreparedJsonData()));
    }

    public function insertOption($optionNames, $optionValue, $autoload)
    {
        $this->log->debug('$optionNames [' . $optionNames . ']');
        $this->log->debug('$optionValue [' . $optionValue . ']');
        $this->log->debug('$autoload [' . $autoload . ']');
        $data = '';
        try {
            $query = Query::getInstance();
            $query->insertOption($optionNames, $optionValue, $autoload);
            $data = Response::instance('insert ok', Response::POST_TYPE, Response::STATUS_OK, Response::METHOD_POST);

        } catch (Exception $exception) {
            $this->log->error($exception);
            $data = Response::instance('', Response::POST_TYPE, Response::STATUS_NOK, Response::METHOD_POST);
            $data->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));
        }

        return json_encode($data->getPreparedJsonData());
    }

    public function getExternalNews($startDate, $endDate, $limit, $offset)
    {
        $this->log->info(sprintf('getExternalNews: startDate[%s], endDate[%s], limit[%s], offset[%s] '
            , $startDate, $endDate, $limit, $offset));
        $data = '';
        try {
            $urls = $this->getUrls($startDate, $endDate, $limit, $offset);
            $this->log->debug($urls);

            $embedly = new Embedly();
            $cardsJson = $embedly->getOembeds($urls);
            $this->log->debug($cardsJson);

            $data = Response::instance($cardsJson, Response::EXTERNAL_TYPE, Response::STATUS_OK, Response::METHOD_POST);

        } catch (Exception $exception) {
            $this->log->error($exception);
            $data = Response::instance('', Response::EXTERNAL_TYPE, Response::STATUS_NOK, Response::METHOD_POST);
            $data->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));

        }

        return json_encode($data->getPreparedJsonData());

    }

    public function getExternalNewsWithWidthHeight($startDate, $endDate, $limit, $offset, $width, $height)
    {
        $this->log->info(sprintf('getExternalNews: startDate[%s], endDate[%s], limit[%s], offset[%s], width[%s], height[%s] '
            , $startDate, $endDate, $limit, $offset, $width, $height));
        $data = '';
        try {
            $urls = $this->getUrls($startDate, $endDate, $limit, $offset);
            $this->log->debug($urls);

            $embedly = new Embedly();
            $cardsJson = $embedly->getOEmbedsWithWidthHeight($urls, $width, $height);
            $this->log->debug($cardsJson);

            $data = Response::instance($cardsJson, Response::EXTERNAL_TYPE, Response::STATUS_OK, Response::METHOD_POST);

        } catch (Exception $exception) {
            $this->log->error($exception);
            $data = Response::instance('', Response::EXTERNAL_TYPE, Response::STATUS_NOK, Response::METHOD_POST);
            $data->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));

        }
        return json_encode($data->getPreparedJsonData());

    }

    private function getUrls($startDate, $endDate, $limit, $offset)
    {

        //$query = new Query();
        //return $query->($startDate, $endDate, $limit, $offset);

        /*return array(
            "http://video.google.com/videoplay?docid=-5427138374898988918&q=easter+bunny&pl=true",
            "http://www.emol.com/noticias/Nacional/2017/02/08/843997/Arancibia-declara-ante-la-fiscalia-por-caso-de-informaciones-falsas-y-critica-a-Aleuy-Los-almirantes-no-mienten.html",
            "http://seguroweb.com.ar/autos/img/parallax_bg/auto.png",
            "https://ajax.googleapis.com/ajax/libs/angularjs/1.3.14/angular.min.js"


        );*/


    }

}



