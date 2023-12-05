<?php

namespace Core;

use Core\Database;

class Validator
{
    public static function skuExists($count, $db, $params)
    {
        $query = "SELECT COUNT(*) FROM products WHERE sku = :sku";
        $result = $db->query($query, ['sku' => $params['sku']]);
        $count = $result->fetchColumn();

        if ($count > 0) {
            $_SESSION['error_sku'] = 'SKU already exists';
            echo json_encode(['sessionData' => $_SESSION]);
            http_response_code(404);
            exit;
        }
    }


}
