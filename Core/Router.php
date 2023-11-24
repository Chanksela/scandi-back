<?php

class Router
{
    protected $routes = [];

    public function add($method, $uri, $controller)
    {
        return $this->routes[] =
        [
          'method' => $method,
          'uri' => $uri,
          'controller' => $controller
        ];
        return $this;
    }

    public function get($uri, $controller)
    {
        return $this->add('GET', $uri, $controller);
    }

    public function post($uri, $controller)
    {
        return $this->add('POST', $uri, $controller);
    }

    public function delete($uri, $controller)
    {
        return $this->add('DELETE', $uri, $controller);
    }
}
