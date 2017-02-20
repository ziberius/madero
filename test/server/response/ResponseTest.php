<?php
require dirname(__FILE__) . '/../../../main/server/response/Response.php';
require dirname(__FILE__) . '/../../../main/server/response/ErrorResponse.php';

$errorResponse = ErrorResponse::withMessage('mensaje de error');
$errorResponse->setCode('123');

$response = Response::instance('mucha data', Response::STATUS_OK, Response::METHOD_POST, 'servicio');
$response->setErrorResponse($errorResponse);

echo json_encode($response->getPreparedJsonData());