<?php

class ErrorResponse
{
    private $code;
    private $message;

    public static function withMessage($message)
    {
        $instance = new self();
        $instance->setMessage($message);
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

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($message)
    {
        $this->message = $message;
    }
}