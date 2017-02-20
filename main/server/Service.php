<?php

require_once dirname(__FILE__) . '/response/Response.php';
require_once dirname(__FILE__) . '/response/ErrorResponse.php';
require_once dirname(__FILE__) . '/service/Posts.php';

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

    switch ($service) {
        case 'getPostsFromCategory':
            $result = getPostsFromCategory($parameters);
            break;
        case 'getPostsFromAuthor':
            $result = getPostsFromAuthor($parameters);
            break;
        case 'getPostsFromId':
            $result = getPostsFromId($parameters);
            break;
        case 'searchPosts':
            $result = searchPosts($parameters);
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

function getPostsFromCategory($parameters)
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

    $posts = new Posts();
    return $posts->getFromCategory($startDate, $endDate, $limit, $offset, $category);

}

function getPostsFromAuthor($parameters)
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

    $posts = new Posts();
    return $posts->getFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);
}


function getPostsFromId($parameters)
{
    if (!isset($parameters['id-post'])) {
        throw new Exception('index parameters[id-post] is not set');
    }

    $idPost = $parameters['id-post'];

    $posts = new Posts();
    return $posts->getFromId($idPost);
}

function searchPosts($parameters)
{
    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['keyword'])) {
        throw new Exception('index parameters[keyword] is not set');
    }

    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $keyword = $parameters['keyword'];

    $posts = new Posts();
    return $posts->search($limit, $offset, $keyword);
}