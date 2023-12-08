<?php

const BASE_PATH = __DIR__ . '/';
require BASE_PATH . 'Core/functions.php';
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path("{$class}.php");
});


header("Access-Control-Allow-Origin: https://scand-client.vercel.app");
header("Access-Control-Allow-Methods: GET, OPTIONS, POST, DELETE");
header("Access-Control-Allow-Headers: Content-Type");
header("Access-Control-Allow-Credentials: true");


if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    header("Access-Control-Allow-Origin: https://scand-client.vercel.app");
    header("Access-Control-Allow-Methods: GET, OPTIONS, POST, DELETE");
    header("Access-Control-Allow-Headers: Content-Type");
    header("Access-Control-Allow-Credentials: true");
    header('Cache-Control: max-age=604800');
    http_response_code(200);
    exit;
}


$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);
