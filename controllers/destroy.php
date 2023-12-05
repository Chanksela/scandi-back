<?php

use Core\Database;
use Core\Product;

$config = require base_path('config.php');
$db = new Database($config['database']);

Product::destroy($db);
