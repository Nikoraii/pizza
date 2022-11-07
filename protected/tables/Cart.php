<?php

require_once __DIR__ . '/Table.php';

class Cart extends Table {
    public $id;

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

    public static function cartRequest($user_id)
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM carts_request WHERE user_id = :uid';

        $params = [
            ':uid' => $user_id
        ];

        return $db->select('Cart', $query, $params);
    }

    public static function removeFromCart($id)
    {
        $db = Database::getInstance();

        $query = 'DELETE FROM carts_request WHERE id = :id';

        $params = [
            ':id' => $id
        ];

        $db->delete($query, $params);
    }

    public static function moveToPaid($name, $product_id, $size, $price, $id, $order_id)
    {
        $db = Database::getInstance();

        $query = 'INSERT INTO carts (name, product_id, size, price, user_id, order_id) '
        . 'VALUES (:n, :pid, :s, :p, :uid, :oid)';

        $params = [
            ':n' => $name,
            ':pid' => $product_id,
            ':s' => $size,
            ':p' => $price,
            ':uid' => $id,
            ':oid' => $order_id
        ];

        $db->insert('Cart', $query, $params);
    }

    public static function pay($user_id)
    {
        $db = Database::getInstance();

        $query = 'DELETE FROM carts_request WHERE user_id = :uid';

        $params = [
            ':uid' => $user_id
        ];

        $db->delete($query, $params);
    }

    public static function addToOrders($id, $full_price)
    {
        $payment = 'paid';
        $status = 'waiting';

        $db = Database::getInstance();

        $query = 'INSERT INTO orders (user_id, full_price, payment, status) '
        . 'VALUES (:uid, :fp, :p, :status)';

        $params = [
            ':uid' => $id,
            ':fp' => $full_price,
            ':p' => $payment,
            ':status' => $status
        ];

        $db->insert('Cart', $query, $params);
        $id = $db->lastInsertId();
        $order = self::getById($id, 'orders', 'Cart');
        return $order->id;
    }
}
