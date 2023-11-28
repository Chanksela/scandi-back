<?php


const BASE_PATH = __DIR__ . '/../';
require BASE_PATH . 'Core/functions.php';
spl_autoload_register(function ($class) {
    $class = str_replace('\\', '/', $class);
    require base_path("{$class}.php");
});


header("Access-Control-Allow-Origin: http://localhost:5173"); // Replace with your Vue app's URL
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");
header("Access-Control-Allow-Credentials: true");

$router = new \Core\Router();

$routes = require base_path('routes.php');
$uri = parse_url($_SERVER['REQUEST_URI'])['path'];
$method = $_SERVER['REQUEST_METHOD'];
$router->route($uri, $method);
