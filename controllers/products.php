<?php


$config = require 'config.php';

$db = new Database($config['database']);

$query = "SELECT * FROM products";
$products = $db->query($query)->fetchAll();


$page_name = 'Products';
require './views/products.view.php';
