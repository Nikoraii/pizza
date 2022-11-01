<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    die();
}

require_once __DIR__ . '/../../protected/tables/Cart.php';
$cart_items = Cart::cartRequest(($_SESSION['user_id']));
$price;
foreach ($cart_items as $cart_item) {
    $price += $cart_item->price;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Cart</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <?php if (isset($_SESSION['user_id'])) {
            include '../../templates/header_log.html';
        } else {
            include '../templates/header.html';
        } ?>
      
    <div class="container">
        <?php foreach ($cart_items as $item) { ?>
            <div class="row">
                <div class="col-xs-4">
                    <h3><?= $item->name ?></h3>
                </div>
                <div class="col-xs-4">
                    <p><?= $item->size ?></p>
                </div>
                <div class="col-xs-4">
                    <h4><?= $item->price ?></h4>
                </div>
            </div>
        <?php } ?>
    </div>
    <h2><?= $price ?></h2> <!-- ADD WITH JS, CAN'T REFRESH WITH PHP VAR ON ITEM REMOVE -->  
      
    <?php include '../../templates/footer.html' ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>