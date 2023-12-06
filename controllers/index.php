<?php

use Core\Product;
use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);
$products = Product::fetchAll($db);

view('index.view.php', [
  'products' => $products
]);
