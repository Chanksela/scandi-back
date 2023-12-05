<?php

namespace Core;

class Validator
{
    public static function validateForm($db, $params)
    {
        $query = "SELECT COUNT(*) FROM products WHERE sku = :sku";
        $result = $db->query($query, ['sku' => $params['sku']]);
        $count = $result->fetchColumn();

        foreach ($params as $key => $value) {
            if (empty($value)) {
                $_SESSION['error'] = 'Please provide all input fields';
                echo json_encode(['sessionData' => $_SESSION]);
                http_response_code(400);
                exit;
            }
        }

        if ($count > 0) {
            $_SESSION['error'] = 'SKU already exists';
            echo json_encode(['sessionData' => $_SESSION]);
            http_response_code(404);
            exit;
        }
    }
}
