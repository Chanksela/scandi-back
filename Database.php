<?php

class Database
{
    public $pdo;
    public function __construct()
    {
        $dsn = 'mysql:host=localhost;port=3306;dbname=scandishop;user=chanksela;password=popgof;charset=utf8mb4';
        $this->pdo = new PDO($dsn);
    }
    public function query($query)
    {

        $statement = $this->pdo->prepare($query);
        $statement->execute();
        return $statement;
        ;
    }
}
