<?php


// $routes = [
//     '/' => 'controllers/index.php',
//     '/add-item' => 'controllers/create.php'
// ];

$router->get('/', 'controllers/index.php');
$router->get('/add-item', 'controllers/create.php');
