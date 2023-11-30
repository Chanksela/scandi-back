<?php

// use Core\Database;

// $config = require base_path('config.php');


// $db = new Database($config['database']);
// $query = "SELECT * FROM products";
// $products = $db->query($query)->fetchAll();

// Getting raw request body
$rawData = file_get_contents("php://input");
// JSON data to associate array
$data = json_decode($rawData, true);

// Check if data exists
if ($data) {
    //  echo data of ids to be deleted
    echo json_encode(['message' => 'Received IDs for deletion: ' . implode(', ', $data['ids'])]);
} else {
    // in case something went wrong with data echo error message
    echo json_encode(['error' => 'Invalid request or missing data']);
}
