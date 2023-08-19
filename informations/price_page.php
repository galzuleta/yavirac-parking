<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="../public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../public/css/stiles.css">
    <title>Instituto Superior Tecnológico de Turismo y Patrimonio "Yavirac"</title>
</head>
<body style="background-color: #F0F8FF">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="../public/img/logo1.png"  alt="" width="50" height="50" class="d-inline-block align-text-center">
      <b>Yavi Parking </b>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../index.php">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../informations/about_us.php">SOBRE NOSOTROS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active " href="../informations/price_page.php">
            TARIFAS
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="../informations/contact.php">CONTÁCTANOS</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<br>
<div><br><br>
    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col-md" >
          <h1>AUTOMOVILES</h1>
        <img src="../public/img/auto.png" style=" width:150px; height:250px" alt="" class="img-fluid"><br>
        <br>
      <p>La tarifa estimada para la disposición de un espacio en el parqueadero es de:</p>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Día</td>
            <td>$ 3.00</td>
          </tr>
          <tr>
            <td>Mes</td>
            <td>$ 10.00</td>
          </tr>
        </tbody>
      </table>
      </div>
    <div class="col-md" style="text-align: justify;" >
      <center><h1>MOTORIZADOS</h1>
        <img src="../public/img/moto.png" style=" width:400px; height:250px" alt="" class="img-fluid">
      </center><br>
      <p>La tarifa estimada para la disposición de un espacio en el parqueadero es de:</p>
      <table class="table table-hover">
        <thead>
          <tr>
            <th scope="col"></th>
            <th scope="col"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>Día</td>
            <td>$ 1.00</td>
          </tr>
          <tr>
            <td>Mes</td>
            <td>$ 6.00</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div><br><br><br>


<?php include('../layout/admin/footer_index.php'); ?>
</body>
</html>