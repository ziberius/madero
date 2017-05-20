<?php
require_once dirname(__FILE__) . '/../ini/IniFile.php';
require_once dirname(__FILE__) . '/../lib/log4php/Logger.php';
Logger::configure(dirname(__FILE__) . '/../log/log4phpConfig.xml');

class Iframely
{
    private $hostname;
    private $api_key;
    private $userAgent;
    private $path;

    private $log;

    public function __construct()
    {
        $this->log = Logger::getLogger(__CLASS__);
        $instance = IniFile::getInstance();
        $this->api_key = $instance->getValue(IniFile::OEMBED_API_KEY);
        $this->userAgent = getenv('HTTP_USER_AGENT');
        $this->hostname = 'iframe.ly';
        $this->path = '/api/oembed';
    }

    /**
     * @param $url
     * @return mixed array
     * @throws Exception
     */
    public function getOembeds($url)
    {

        if (!is_string($url)) {
            throw new Exception("urls must be string");
        }

        $parameters = array('url' => $url, 'api_key' => $this->api_key);

        return $this->getResponse($parameters);

    }

    private function getResponse($parameters)
    {
        $formattedParams = $this->formatParameters($parameters);

        $apiUrl = sprintf("http://%s%s?%s", $this->hostname, $this->path, $formattedParams);
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
            $this->log->error(sprintf('HTTP error code %s', $httpCode));
        }

        $responseDecode = json_decode($response, true);

        if (isset($responseDecode['error'])) {
            $this->log->error($responseDecode);
        }
        curl_close($resource);
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