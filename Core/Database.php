<?php

namespace Core;

use PDO;

class Database
{
    public $pdo;
    public function __construct($config)
    {

        $dsn = 'mysql:' . http_build_query($config, "", ";");
        $this->pdo = new PDO($dsn, $config['username'], $config['password'], [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    public function query($query, $parameters = [])
    {

        $statement = $this->pdo->prepare($query);
        $statement->execute($parameters);
        return $statement;
    }
}
