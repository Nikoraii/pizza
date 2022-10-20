<?php

require_once __DIR__ . '/Table.php';

class Pizza extends Table
{
    public static function getAll()
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM products_pizzas';

        return $db->select('Pizza', $query);
    }
}
