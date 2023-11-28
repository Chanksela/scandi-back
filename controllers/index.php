<?php

use Core\Database;

$config = require base_path('config.php');


$db = new Database($config['database']);

$query = "SELECT * FROM products";
$products = $db->query($query)->fetchAll();

echo json_encode(['products' => $products]);
