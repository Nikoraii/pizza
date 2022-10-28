<?php

require_once __DIR__ . '/../../protected/tables/User.php';

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$password = hash('sha512', $password);
$address = $_POST['address'];

$user_id = User::register($name, $email, $phone, $password, $address);

if ($user_id !== false) {
    header('Location: ../index.php');
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=data');
}
