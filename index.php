<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';

$config = require 'config.php';

$db = new Database($config['database']);

$query = "SELECT * FROM products";
$products = $db->query($query)->fetchAll();
foreach ($products as $product) {
    echo "<li>" . $product['name'] . " - " . $product['price'] . "</li>";
}
