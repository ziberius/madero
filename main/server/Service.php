<?php

require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Response.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/ErrorResponse.php');
require_once($_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/service/News.php');

$service = null;
try {

    $postData = file_get_contents("php://input");
    $request = json_decode($postData, true);

    if (!isset($request['service'])) {
        throw new Exception('index service is not set');
    }

    if (!isset($request['parameters'])) {
        throw new Exception('index parameters is not set');
    }

    $service = $request['service'];
    $parameters = $request['parameters'];


    $news = new News();
    switch ($service) {
        case 'getNewsFromCategory':
            $result = getNewsFromCategory($parameters);
            break;
        case 'getNewsFromAuthor':
            $result = getNewsFromAuthor($parameters);
            break;
        case 'getNewsFromId':
            $result = getNewsFromId($parameters);
            break;
        default:
            throw new Exception(sprintf('service [%s] not exist', $service));
    }

    $response = Response::instance($result, Response::STATUS_OK, Response::METHOD_POST, $service);
    echo json_encode($response->getPreparedJsonData());

} catch (Exception $exception) {
    $data = Response::instance(null, Response::STATUS_NOK, Response::METHOD_POST, $service);
    $data->setErrorResponse(ErrorResponse::withMessage($exception->getMessage()));
    echo json_encode($data->getPreparedJsonData());

}

function getNewsFromCategory($parameters)
{
    if (!isset($parameters['start-date'])) {
        throw new Exception('index parameters[start-date] is not set');
    }

    if (!isset($parameters['end-date'])) {
        throw new Exception('index parameters[end-date] is not set');
    }

    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['category'])) {
        throw new Exception('index parameters[category] is not set');
    }

    $startDate = $parameters['start-date'];
    $endDate = $parameters['end-date'];
    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $category = $parameters['category'];

    $news = new News();
    return $news->getNewsFromCategory($startDate, $endDate, $limit, $offset, $category);

}

function getNewsFromAuthor($parameters)
{
    if (!isset($parameters['start-date'])) {
        throw new Exception('index parameters[start-date] is not set');
    }

    if (!isset($parameters['end-date'])) {
        throw new Exception('index parameters[end-date] is not set');
    }

    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['id-author'])) {
        throw new Exception('index parameters[id-author] is not set');
    }

    $startDate = $parameters['start-date'];
    $endDate = $parameters['end-date'];
    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $idAuthor = $parameters['id-author'];

    $news = new News();
    return $news->getNewsFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);
}


function getNewsFromId($parameters)
{
    if (!isset($parameters['id-post'])) {
        throw new Exception('index parameters[id-post] is not set');
    }

    $idPost = $parameters['id-post'];

    $news = new News();
    return $news->getNewsFromId($idPost);
}