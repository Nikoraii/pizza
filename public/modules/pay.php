<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?error=LoginFalse');
    die();
}

require_once __DIR__ . '/../../protected/tables/Cart.php';

$id = $_SESSION['user_id'];

if (!empty($id)) {
    $carts = Cart::cartRequest($id);
    $full_price = 0;
    foreach ($carts as $cart) {
        $price = $cart->price;
        $full_price += $price;
    }

    $order_id = Cart::addToOrders($id, $full_price);

    foreach ($carts as $cart) {
        $name = $cart->name;
        $product_id = $cart->product_id;
        $size = $cart->size;
        $price = $cart->price;
        Cart::moveToPaid($name, $product_id, $size, $price, $id, $order_id);
    }
    Cart::pay($id);
    header('Location: ../index.php?p=SUCCESS');
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER'] . '?pay=ERROR');
}
