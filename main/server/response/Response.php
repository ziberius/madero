<?php

class Response
{
    private $data;
    private $service;
    private $method;
    private $status;
    private $error_response;

    const METHOD_GET = 'GET';
    const METHOD_POST = 'POST';

    const STATUS_OK = 'OK';
    const STATUS_NOK = 'NOK';

    public static function instance($data, $status, $method, $service)
    {
        $instance = new self();
        $instance->setData($data);
        $instance->setMethod($method);
        $instance->setStatus($status);
        $instance->setService($service);
        return $instance;
    }

    public function getPreparedJsonData()
    {
        $var = get_object_vars($this);
        foreach ($var as &$value) {
            if (is_object($value) && method_exists($value, 'getPreparedJsonData')) {
                $value = $value->getPreparedJsonData();
            }
        }
        return $var;
    }

    public function getData()
    {
        return $this->data;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getErrorResponse()
    {
        return $this->error_response;
    }

    public function setErrorResponse($error_response)
    {
        $this->error_response = $error_response;
    }

    public function getService()
    {
        return $this->service;
    }

    public function setService($service)
    {
        $this->service = $service;
    }


}