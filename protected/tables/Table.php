<?php

require_once __DIR__ . '/../config.php';
require_once __DIR__ . '/../includes/Database.php';

class Table
{
    public static function getById($id, $table, $class_name)
    {
        $db = Database::getInstance();

        $query = "SELECT * FROM $table WHERE id = :id";

        $params = [
            ':id' => $id
        ];

        $list = $db->select($class_name, $query, $params);
        foreach ($list as $item) {
            return $item;
        }
        return null;
    }
}
