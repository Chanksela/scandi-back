<?php

require 'functions.php';
require 'Database.php';
// require 'router.php';



$db = new Database();

$products = $db->query("SELECT * FROM products")->fetchAll(PDO::FETCH_ASSOC);
foreach ($products as $product) {
    echo "<li>" . $product['name'] . " - " . $product['price'] . "</li>";
}
