<?php

namespace App\Core\Database;
use PDOException;
use PDO;
class Connection
{
    public static function make($config)
    {
        try {
            return new PDO(
                "mysql:host={$config['servername']};dbname={$config['name']}",
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch(PDOException $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
}