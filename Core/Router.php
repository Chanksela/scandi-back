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

                header("Access-Control-Allow-Origin: https://scand-client.vercel.app");
                header("Access-Control-Allow-Methods: GET, POST, DELETE");
                header("Access-Control-Allow-Headers: Content-Type");
                header("Access-Control-Allow-Credentials: true");
                http_response_code(200);
                return require base_path($route['controller']);
            }
        }
        $this->abort();
    }

    protected function abort($status = 404)
    {
        http_response_code($status);
        die();
    }

}
