<?php
namespace App\Core;

class Request
{
    private $method;
    private $ip;
    private $uri;
    private $attrs = [];
    private $params;
    public function __construct()
    {
        $this->params = $_REQUEST;
        $this->method = strtolower($_SERVER["REQUEST_METHOD"]);
        $this->ip = $_SERVER['REMOTE_ADDR'];
        $this->uri = strtok($_SERVER["REQUEST_URI"], "?");
    }

    public function getUri()
    {
        return $this->uri;

    }

    public function getIp()
    {
        return $this->ip;
    }
    public function getParams()
    {
        return $this->params;
    }
    public function getParam($key)
    {
        return $this->params[$key] ?? null;
    }
    public function getMethod()
    {
        return $this->method;
    }
    public function getAttr($key)
    {
        return $this->attrs[$key];
    }
    public function getAttrs()
    {
        return $this->attrs;
    }
    public function setAttrs($key, $value)
    {
        $this->attrs[$key] = $value;
    }
}