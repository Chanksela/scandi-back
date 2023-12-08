<?php



$router->get('/', 'controllers/index.php');
$router->get('/product', 'controllers/show.php');
$router->delete('/product', 'controllers/destroy.php');
$router->post('/product', 'controllers/store.php');
