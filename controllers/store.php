<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


// Getting raw request body
$rawData = file_get_contents("php://input");
// JSON data to associate array
$data = json_decode($rawData, true);
if($data['productType'] === "DVD") {
    $query = "INSERT INTO products (sku, name, price, type, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params = [
        'sku' => $data['sku'],
        'name' => $data['name'],
        'price' => $data['price'],
        'productType' => $data['productType'],
        'parameters' => $data['size']
    ];
    $db->query($query, $params);
} elseif($data['productType'] === "Book") {
    $query = "INSERT INTO products (sku, name, price, type, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params = [
        'sku' => $data['sku'],
        'name' => $data['name'],
        'price' => $data['price'],
        'productType' => $data['productType'],
        'parameters' => $data['weight']
    ];
    $db->query($query, $params);

} elseif ($data['productType'] === "Furniture") {
    $query = "INSERT INTO products (sku, name, price, type, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params = [
        'sku' => $data['sku'],
        'name' => $data['name'],
        'price' => $data['price'],
        'productType' => $data['productType'],
        'parameters' => $data['height'] . "x" . $data['width'] . "x" . $data['length']
    ];
    $db->query($query, $params);
} else {
    echo json_encode(['error' => 'Something wen wrong']);
    http_response_code(400);
}
