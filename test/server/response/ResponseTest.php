<?php
require_once $_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/Response.php';
require_once $_SERVER["DOCUMENT_ROOT"] . '/madero/main/server/response/ErrorResponse.php';

$errorResponse = ErrorResponse::withMessage('mensaje de error');
$errorResponse->setCode('123');

$response = Response::instance('mucha data', Response::POST_TYPE, Response::STATUS_OK, Response::METHOD_POST);
$response->setErrorResponse($errorResponse);

echo json_encode($response->getPreparedJsonData());