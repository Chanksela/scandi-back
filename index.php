<?php

require 'functions.php';
require 'router.php';

$dsn = 'mysql:host=localhost;port=3306;dbname=scandishop;user=chanksela;password=popgof;charset=utf8mb4';
$pdo = new PDO($dsn);

$statement = $pdo->prepare("SELECT * FROM products");
$statement->execute();
$products = $statement->fetchAll(PDO::FETCH_ASSOC);
// dd($products);
foreach ($products as $product) {
    echo "<li>" . $product['name'] - $product['price'] . "</li>";
}
