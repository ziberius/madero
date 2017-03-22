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
        case 'getPostFromIdTag':
            $result = getPostFromIdTag($parameters);
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
    if (!isset($parameters['start_date'])) {
        throw new Exception('index parameters[start_date] is not set');
    }

    if (!isset($parameters['end_date'])) {
        throw new Exception('index parameters[end_date] is not set');
    }

    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['categories'])) {
        throw new Exception('index parameters[categories] is not set');
    }

    if (!isset($parameters['exclusions'])) {
        throw new Exception('index parameters[exclusions] is not set');
    }


    $startDate = $parameters['start_date'];
    $endDate = $parameters['end_date'];
    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $idCategories = $parameters['categories'];
    $idExclusions = $parameters['exclusions'];

    $posts = new Posts();
    return $posts->getFromCategory($startDate, $endDate, $limit, $offset, $idCategories, $idExclusions);

}

function getPostsFromAuthor($parameters)
{
    if (!isset($parameters['start_date'])) {
        throw new Exception('index parameters[start_date] is not set');
    }

    if (!isset($parameters['end_date'])) {
        throw new Exception('index parameters[end_date] is not set');
    }

    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['id_author'])) {
        throw new Exception('index parameters[id_author] is not set');
    }

    $startDate = $parameters['start_date'];
    $endDate = $parameters['end_date'];
    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $idAuthor = $parameters['id_author'];

    $posts = new Posts();
    return $posts->getFromAuthor($startDate, $endDate, $limit, $offset, $idAuthor);
}


function getPostsFromId($parameters)
{
    if (!isset($parameters['id_post'])) {
        throw new Exception('index parameters[id_post] is not set');
    }

    $idPost = $parameters['id_post'];

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

function getPostFromIdTag($parameters)
{
    if (!isset($parameters['limit'])) {
        throw new Exception('index parameters[limit] is not set');
    }

    if (!isset($parameters['offset'])) {
        throw new Exception('index parameters[offset] is not set');
    }

    if (!isset($parameters['id_tag'])) {
        throw new Exception('index parameters[id_tag] is not set');
    }

    $limit = $parameters['limit'];
    $offset = $parameters['offset'];
    $idTag = $parameters['id_tag'];

    $posts = new Posts();
    return $posts->getFromIdTag($limit, $offset, $idTag);
}