<?php
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/database/Query.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Embedly.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/util/Validate.php');

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Converter.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/Retriever.php');

require_once($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/lib/log4php/Logger.php');
Logger::configure($_SERVER['DOCUMENT_ROOT'] . '/madero/main/server/log/log4phpConfig.xml');


class News
{
    private $log;
    private $retriever;

    function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $this->retriever = Retriever::getInstance();
    }

    public function getNewsFromCategory($startDate, $endDate, $limit, $offset, $category)
    {
        $this->log->info(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], category[%s]'
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

        $posts = $this->retriever->postsFromCategory($startDate, $endDate, $limit, $offset, $category);

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {
//TODO quizas solo es necesario obtener las meta data solo cuando sean opiniones!
                $this->retriever->metaPost($post);

                $this->retriever->author($post);

                $this->retriever->embedly($post);

            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

    }

//TODO ojo que al traerse todo lo del autor, me traeria tambien las opiniones que posteó, quizas deba filtrarlas !!!!-->revisar query
    public function getNewsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor)
    {
        $this->log->info(sprintf('parameters: startDate[%s], endDate[%s], limit[%s], offset[%s], idAuthor[%s]'
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

        $posts = $this->retriever->postsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);

        $result = null;
        if (!empty($posts)) {
            foreach ($posts as $post) {

                $this->retriever->metaPost($post);

                $this->retriever->author($post);

                $this->retriever->embedly($post);

            }

            $result = Converter::postsToArray($posts);
        }

        return $result;

    }


//TODO quizas eliminar mas adelante
    /*public function insertOption($optionNames, $optionValue, $autoload)
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
    }*/


    /*public function getExternalNewsWithWidthHeight($startDate, $endDate, $limit, $offset, $width, $height)
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

    }*/

    /*private function getUrls($startDate, $endDate, $limit, $offset)
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



