<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=LoginFalse');
    die();
}

require_once __DIR__ . '/../../protected/tables/Cart.php';

// $user = $_SESSION['user_id'];
$user = 1;
$id = $_POST['pizza_id'];
$name = $_POST['pizza_name'];
$size = $_POST['selected-size'];
$price = $_POST['price'];

Cart::addToCart($name, $id, $size, $price, $user);
header('Location: ' . $_SERVER['HTTP_REFERER']);
