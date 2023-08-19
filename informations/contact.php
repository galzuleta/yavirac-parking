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
</nav><br><br><br>

<div>
  <center><h1 style="color: darkblue;">CONTÁCTANOS</h1><br><br></center>
    <div class="container text-center">
      <div class="row align-items-start">
        <div class="col-md" style="text-align: justify;" ><br><br>
          <center><h2>Información</h2>
          <p><span>Dirección: </span> García Moreno S4-35 y Ambato, Quito - Ecuador</p>
          <p><span>Correo electrónico: </span> <a href="mailto:info@yavirac.edu.ec">info@yavirac.edu.ec</a></p>
          <p><span> Horario de atención:  </span> de lunes a viernes,  de 08H00 a 17H00</p>
          </center>
        </div>
        <div class="col-md" >
          <img src="../public/img/qr.png" style=" width:300px; height:300px" alt="" class="img-fluid">
        </div>
    </div>
</div>
</div><br><br><br>

  <div class="map-responsive; text-center">
    <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.7875332920134!2d-78.5188823852467!3d-0.22508439983577377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91d59a28366b3d81%3A0xc6029256689ed873!2sInstituto%20Superior%20Tecnol%C3%B3gico%20Yavirac!5e0!3m2!1ses-419!2sec!4v1644542081860!5m2!1ses-419!2sec" width="1000" height="550" frameborder="0" style="border:0;"  allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>                                                                                                                                                                                                                                                                                                                                  

<?php include('../layout/admin/footer_index.php'); ?>
</body>
</html>