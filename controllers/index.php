<?php


$config = require base_path('config.php');


$db = new Database($config['database']);

$query = "SELECT * FROM products";
$products = $db->query($query)->fetchAll();


$page_name = 'Products';
require base_path('views/index.view.php') ;
