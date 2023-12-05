<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);


// Getting raw request body
$rawData = file_get_contents("php://input");
// JSON data to associate array
$data = json_decode($rawData, true);

$params = [
      'sku' => $data['sku'],
      'name' => $data['name'],
      'price' => $data['price'],
      'productType' => $data['productType'],
  ];

if($data['productType'] === "1") {
    $query = "INSERT INTO products (sku, name, price, type_id, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params['parameters'] = [$data['size']];
    $db->query($query, $params);
} elseif($data['productType'] === "2") {
    $query = "INSERT INTO products (sku, name, price, type_id, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params['parameters'] = $data['weight'];
    $db->query($query, $params);

} elseif ($data['productType'] === "3") {
    $query = "INSERT INTO products (sku, name, price, type_id, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";
    $params['parameters'] = [$data['height'], $data['width'], $data['length']];
    $db->query($query, $params);
} else {
    echo json_encode(['error' => 'Something wen wrong']);
    http_response_code(400);
}
