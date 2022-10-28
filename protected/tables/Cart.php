<?php

require_once __DIR__ . '/Table.php';

class Cart extends Table {
    public static function addToCart($name, $pid, $size, $price, $user)
    {
        $db = Database::getInstance();

        $query = 'INSERT INTO carts_request (name, product_id, size, price, user_id) '
        . 'VALUES (:n, :pid, :s, :p, :u)';

        $params = [
            ':n' => $name,
            ':pid' => $pid,
            ':s' => $size,
            ':p' => $price,
            ':u' => $user
        ];

        $db->insert('Cart', $query, $params);
    }
}