<?php



$router->get('/product', 'controllers/index.php');
$router->get('/test', 'controllers/show.php');
$router->delete('/product', 'controllers/destroy.php');
$router->post('/product', 'controllers/store.php');
