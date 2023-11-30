<?php


// $routes = [
//     '/' => 'controllers/index.php',
//     '/add-item' => 'controllers/create.php'
// ];

$router->get('/', 'controllers/index.php');
$router->delete('/product', 'controllers/destroy.php');
$router->get('/add-item', 'controllers/create.php');
