<?php


// $routes = [
//     '/' => 'controllers/index.php',
//     '/add-item' => 'controllers/create.php'
// ];

$router->get('/', 'controllers/index.php');
$router->delete('/product', 'controllers/destroy.php');
$router->post('/product', 'controllers/store.php');
