<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$routes = [
    '/products' => 'controllers/products.php',
    '/add-item' => 'controllers/add-item.php'
];


function loadTheUri($uri, $routes)
{

    if(array_key_exists($uri, $routes)) {
        http_response_code(200);
        require $routes[$uri];
    } else {
        abort(404);
    }

}

function abort($status = 404)
{
    http_response_code($status);
    require "controllers/$status.php";
    die();
}

loadTheUri($uri, $routes);
