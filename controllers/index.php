<?php

use Core\Product;
use Core\Database;
use PDO;

$config = require base_path('config.php');
$db = new Database($config['database']);

echo json_encode(['products' => Product::fetchAll($db)]);
