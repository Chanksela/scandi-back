<?php

function loadTheUri($uri, $routes)
{

    if(array_key_exists($uri, $routes)) {
        http_response_code(200);
        require base_path($routes[$uri]);
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


require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];





loadTheUri($uri, $routes);
