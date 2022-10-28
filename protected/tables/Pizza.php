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

    public static function getSizes($id)
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM products_pizzas_prices WHERE pizza_id = :pid';

        $params = [
            ':pid' => $id
        ];

        return $db->select('Pizza', $query, $params);
    }

    // public static function cheapest($id)
    // {
    //     $db = Database::getInstance();

    //     $query = 'SELECT MIN(price) FROM products_pizzas_prices WHERE pizza_id = :pid';

    //     $params = [
    //         ':pid' => $id
    //     ];

    //     return $db->select('Pizza', $query, $params);
    // }
}
