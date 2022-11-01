<?php

session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: ../index.php');
    die();
}

require_once __DIR__ . '/../../protected/tables/User.php';
$email = $_POST['email'];
$password = $_POST['password'];
// var_dump($password);
// die();
$password = hash('sha512', $password);

$user = User::login($email, $password);

if (!empty($user)) {
    session_start();
    $_SESSION['user_id'] = $user->id;
    header('Location: ../index.php');
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=Login');
}
