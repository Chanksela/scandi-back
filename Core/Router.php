<?php

namespace Core;

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
    public function route($uri, $method)
    {
        foreach($this->routes as $route) {
            if($route['uri'] === $uri && $route['method'] === $method) {
                http_response_code(200);
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($status = 404)
    {
        http_response_code($status);
        require base_path("controllers/$status.php");
        die();
    }

}
