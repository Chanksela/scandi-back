<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);

$products = $db->query("SELECT * FROM products")->fetchAll();
foreach ($products as $product) {
    echo "<li>" . $product['name'] . " - " . $product['price'] . "</li>";
}
