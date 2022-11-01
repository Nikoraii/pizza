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

    public static function login($email, $password)
    {
        $db = Database::getInstance();

        $query = 'SELECT * FROM users WHERE email = :e AND password = :pass';

        $params = [
            ':e' => $email,
            ':pass' => $password
        ];

        $users = $db->select('User', $query, $params);

        foreach ($users as $user) {
            return $user;
        }
        return null;
    }
}
