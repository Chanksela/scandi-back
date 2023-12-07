<?php

namespace Core;

use PDO;

class Product
{
    public static function fetchAll($db)
    {
        $query = "SELECT * FROM products";
        $products = $db->query($query)->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    public static function destroy($db)
    {
        $data = self::getRawData();

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

    }
    public static function store($db)
    {

        // $data = self::getRawData();

        $params = [
              'sku' => $_POST['sku'],
              'name' => $_POST['name'],
              'price' => $_POST['price'],
              'productType' => $_POST['productType'],
          ];
        // dd($_POST);

        // Validator::validateForm($db, $params);

        $query = "INSERT INTO products (sku, name, price, type_id, parameters) VALUES (:sku, :name, :price, :productType, :parameters)";


        if($_POST['productType'] === "1") {
            $params['parameters'] = [$_POST['size']];
            $db->query($query, $params);
        } elseif($_POST['productType'] === "2") {
            $params['parameters'] = $_POST['weight'];
            $db->query($query, $params);
        } elseif ($_POST['productType'] === "3") {
            $params['parameters'] = [$_POST['height'], $_POST['width'], $_POST['length']];
            $db->query($query, $params);
        } else {
            echo json_encode(['error' => 'Something wen wrong']);
            http_response_code(400);
        }

    }

    public static function getRawData()
    {
        // Getting raw request body
        $rawData = file_get_contents("php://input");
        // JSON data to associate array
        $data = json_decode($rawData, true);
        return $data;
    }
}
