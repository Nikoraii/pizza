<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=LoginFalse');
    die();
}

require_once __DIR__ . '/../../protected/tables/Cart.php';

$id = $_GET['id'];

if (!empty($id)) {
    Cart::removeFromCart($id);
    header('Location: ../cart.php');
} else {
    header('Location: ../cart.php');
}
