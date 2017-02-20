<?php
require_once dirname(__FILE__) . '/../ini/IniFile.php';
require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');

class Embedly
{
    const MAX_URLS = 20;

    private $hostname;
    private $apiVersion;
    private $key;
    private $userAgent;
    private $action;

    private $log;

    public function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $instance = IniFile::getInstance();

        $this->key = $instance->getValue(IniFile::EMBEDLY_KEY);
        $this->userAgent = getenv('HTTP_USER_AGENT');
        $this->hostname = 'api.embedly.com';
        $this->apiVersion = '1';
        $this->action = 'oembed';
    }

    /**
     * @param $urls
     * @param $width
     * @param $height
     * @return object
     * @throws Exception
     */
    public function getOEmbedsWithWidthHeight($urls, $width, $height)
    {
        if (!is_array($urls)) {
            throw new Exception("urls must be array");
        }

        if (sizeof($urls) > self::MAX_URLS) {
            throw new Exception('Max of ' . self::MAX_URLS . ' urls can be queried at once');
        }

        if (!is_numeric($width)) {
            throw new Exception(sprintf('width must be numeric [%s]', $width));
        }

        if (!is_numeric($height)) {
            throw new Exception(sprintf('height must be numeric [%s]', $height));
        }

        $parameters = array('urls' => $urls, 'width' => $width, 'height' => $height, 'key' => $this->key);

        return (object)$this->getResponse($parameters);
    }

    /**
     * @param $urls
     * @return mixed array
     * @throws Exception
     */
    public function getOembeds($urls)
    {

        if (!is_array($urls)) {
            throw new Exception("urls must be array");
        }

        if (sizeof($urls) > self::MAX_URLS) {
            throw new Exception('Max of ' . self::MAX_URLS . ' urls can be queried at once');
        }


        $parameters = array('urls' => $urls, 'key' => $this->key);

        return $this->getResponse($parameters);

    }

    private function getResponse($parameters)
    {
        $path = sprintf("/%s/%s", $this->apiVersion, $this->action);
        $formatedParams = $this->formatParameters($parameters);

        $apiUrl = sprintf("http://%s%s?%s", $this->hostname, $path, $formatedParams);
        $this->log->info(sprintf('URL to Api: %s', $apiUrl));

        $resource = curl_init($apiUrl);
        $this->setCurlOptions($resource, array(
            sprintf('Host: %s', $this->hostname),
            sprintf('User-Agent: %s', $this->userAgent)
        ));
        $response = curl_exec($resource);
        if (false === $response) {
            throw new Exception(curl_error($resource), curl_errno($resource));
        }

        $httpCode = curl_getinfo($resource, CURLINFO_HTTP_CODE);
        if ($httpCode !== 200) {
            throw new Exception(sprintf('HTTP error code %s', $httpCode));
        }

        $responseDecode = json_decode($response, true);

        foreach ($responseDecode as $item) {
            if ($item['type'] == 'error') {
                $this->log->error($item);
            }
        }
        return $responseDecode;
    }

    private function formatParameters($parameters)
    {
        $pairs = array_map(array(__CLASS__, 'urlEncode'), array_keys($parameters), array_values($parameters));
        return implode('&', $pairs);
    }

    private static function urlEncode($key, $value)
    {
        $key = urlencode($key);
        if (is_array($value)) {
            $value = implode(',', array_map('urlencode', $value));
        } else {
            $value = urlencode($value);
        }
        return sprintf("%s=%s", $key, $value);
    }

    private function setCurlOptions(&$ch, $headers = array())
    {
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_BUFFERSIZE, 4096);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 25);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    }


}