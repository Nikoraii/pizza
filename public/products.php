<?php

require_once __DIR__ . '/../protected/tables/Pizza.php';
$pizzas = Pizza::getAll();

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Products</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php include '../templates/header.html' ?>

    <nav class="nav justify-content-start sticky-top">
      <a class="nav-link" href="#pizza">Pizzas</a>
      <a class="nav-link" href="#sweet">Sweets</a>
      <a class="nav-link" href="#drink">Drinks</a>
    </nav>

    <section id="pizza">
        <h1>Pizzas</h1>

        <div class="container">
          <div class="row">
            <?php foreach ($pizzas as $pizza) { ?>
              <div class="col-lg-4 d-flex align-items-stretch">
                <div class="card">
                  <img class="card-img-top img-fluid" src="<?= $pizza->image ?>" alt="">
                  <div class="card-body">
                    <h4 class="card-title"><?= $pizza->name ?></h4>
                    <p class="card-text"><?= $pizza->description ?></p>
                    <select name="sizes" id="sizes" onchange="updatePrice()">
                      <?php ?>
                      <?php foreach ($pizza->getSizes($pizza->id) as $size) { ?>
                        <option value="<?= $size->id ?>"><?= $size->size ?></option>
                        <script>
                          function updatePrice() {
                            var size = $("#sizes").val();
                            console.log(size);
                          }
                        </script>
                      <?php } ?>
                    </select>
                    <p id="price">Price: </p>
                  </div>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>

          
        </div>
        <!-- <?php foreach ($pizzas as $pizza) { ?>
          <h2><?= $pizza->name ?></h2>
          <small><?= $pizza->ingredients ?></small>
          <p><?= $pizza->description ?></p>
          <img src="<?= $pizza->image ?>" alt="">
        <?php } ?> -->
    </section>

    <section id="sweet">
        <h1>Sweets</h1>
    </section>

    <section id="drink">
        <h1>Drinks</h1>
    </section>
    
    <?php include '../templates/footer.html' ?>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script>
      $(document).ready(function() {
        // $("#sizes").change(function() {
        //   var size = $("#sizes").val();
        // })
      })
    </script>
  </body>
</html>