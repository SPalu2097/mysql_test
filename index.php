<?php include("config.php"); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CarRent</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <!-- menüü -->
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" aria-disabled="true">Disabled</a>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"/>
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
    </div>
</nav>
    <!-- /menüü -->

    <!-- sisu -->
<div class="container mt-4">
  <div class="row row-cols-1 row-cols-md-4 g-4">

<?php
    $paring = "SELECT * FROM cr_simon LIMIT 8";
    $valjund = mysqli_query($yhendus, $paring);

    while($rida = mysqli_fetch_assoc($valjund)){
    //var_dump($rida);
?>

    <div class="col">
        <div class="card h-100">
        <img src="https://loremflickr.com/400/250/<?php echo $rida['mark']; ?>" class="card-img-top" alt="audi">
        <div class="card-body">
            <h5 class="card-title"><?php echo $rida['mark']." ".$rida['model']; ?></h5>
            <p>Mootor: <?php echo $rida['engine']; ?></p>
            <p>Kütus: <?php echo $rida['fuel']; ?></p>
            <p>Hind: <?php echo $rida['price']; ?>€/päev</p>
            <a href="single_car.php" class="btn btn-dark w-100">Rendi</a>
        </div>
        </div>
    </div>

    <?php
       }
    ?>

    </div>
</div>
    <!-- /sisu -->
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>