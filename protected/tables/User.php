<?php

require_once __DIR__ . '/Table.php';

class User extends Table {
    public static function register($name, $email, $phone, $password, $adress)
    {
        $db = Database::getInstance();

        $query = 'INSERT INTO users (name, email, phone_number, password, adress) '
        . 'VALUES (:n, :e, :pn, :pass, :a)';

        $params = [
            ':n' => $name,
            ':e' => $email,
            ':pn' => $phone,
            ':pass' => $password,
            ':a' => $adress
        ];

        $db->insert('User', $query, $params);
    }
}
