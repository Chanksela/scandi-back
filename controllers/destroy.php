<?php

use Core\Database;

// require configs for db connection
$config = require base_path('config.php');

// establish connection to db
$db = new Database($config['database']);

// Getting raw request body
$rawData = file_get_contents("php://input");
// JSON data to associate array
$data = json_decode($rawData, true);

// Check if data exists
if ($data) {
    // create query to select existing IDs from the database
    $query = "SELECT id FROM products WHERE id IN (" . implode(',', $data['ids']) . ")";
    // execute the query
    $result = $db->query($query);
    // fetch the IDs from the result
    $existingIds = $result->fetchAll(PDO::FETCH_COLUMN);

    // check if all received IDs exist in the database
    if (count($existingIds) > 0) {
        // create query to delete data by IDs
        $query = "DELETE FROM products WHERE id IN (" . implode(',', $data['ids']) . ")";
        // delete data from the database depending on received IDs
        $db->query($query);
        // echo success message
        echo json_encode(['success' => 'Products deleted successfully']);
        // Set the response status code to 200 (OK)
        http_response_code(200);
    } else {
        // in case some IDs do not exist in the database, echo error message
        echo json_encode(['error' => 'Invalid request or missing data']);
        // Set the response status code to 400 (Bad Request)
        http_response_code(400);
    }
} else {
    // in case no data received, echo error message
    echo json_encode(['error' => 'Something wen wrong']);
    // Set the response status code to 400 (Bad Request)
    http_response_code(400);
}
