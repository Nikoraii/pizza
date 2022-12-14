<?php

session_start();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>PizzaAnytime</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
        /* .col {
            border: 1px solid red;
        }

        .row {
            border: 1px solid green;
        } */
    </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
  <body>
    <?php if (isset($_SESSION['user_id'])) {
        include 'templates/header_log.html';
     } else {
        include 'templates/header.html';
     } ?>
    
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-xs-1-12 bg-image hover-zoom" style="width: 50%">
                <img src="https://foodhub.scene7.com/is/image/woolworthsltdprod/2004-easy-pepperoni-pizza:Mobile-1300x1150" class="img-fluid" alt="">
            </div>
            <div class="col-xs-1-12 text-center" style="width: 50%">
                <h1 class="display-1 font-weight-bold mt-5 text-success">Test</h1>
                <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque aut ratione optio, magni saepe quo illum rem nesciunt expedita accusamus ab iure commodi vero temporibus incidunt et tempora, officia cupiditate?</p>
                <a class="btn btn-outline-dark text-align-center" href="products.php">Products</a>
            </div>
        </div>
    </div>

    <?php include 'templates/footer.html' ?>

    <?php if ($_GET['p'] == 'SUCCESS') { ?>
        <script>
            alert('Thank you for paying!');
        </script>
    <?php } ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>