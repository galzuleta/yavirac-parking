<?php
include('app/config.php');
include('layout/admin/data_user_session.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="public/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Home</title>
</head>
<body style="background-image:url(public/img/piso.png);
    
    z-index: -3;
    background-size: 100vw 100vh">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="" alt="" width="30" height="24" class="d-inline-block align-text-top">
      Yavi Parking
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
      <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">INICIO</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">SOBRE NOSOTROS</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            PROMOCIONES
          </a>
          <ul class="dropdown-menu navbar-dark bg-light" aria-labelledby="navbarScrollingDropdown">
            <li><a class="dropdown-item" href="#">MENSUALES</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">DIAS</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">CONTACTANOS</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Buscar..." aria-label="Search">
       <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ingresar
        </button>
      </form>
    </div>
  </div>
</nav>
<br>
<div class="container">
  <div class="card-body">
    <div class="row">
      <?php
        $query_mapping = $pdo->prepare("SELECT * FROM mappings WHERE enable_mapping = '1'");
        $query_mapping->execute();
        $mappings = $query_mapping->fetchAll(PDO::FETCH_ASSOC);
          foreach($mappings as $mapping){
            $id_map = $mapping['id_map'];
            $no_space = $mapping['no_space'];
            $enable_space = $mapping['enable_space'];
            if($enable_space == "LIBRE"){?>
              <div class="col">
                <center>
                  <b><font face="Alex Brush" size="4"><?php echo $no_space;?></font></b>
                  <h2></h2>
                  <button class="btn btn-success" style="width:100%; height:120px" >
                    <p><?php echo $enable_space ?></p>
                  </button>
                </center>
              </div>
              <?php 
            }
            if($enable_space == "OCUPADO"){?>
              <div class="col">
                <center>
                  <b><font face="Alex Brush" size="4"><?php echo $no_space;?></font></b>
                  <h2></h2>
                  <button class="btn btn-info"  >
                    <img src="<?php echo $URL;?>/public/img/auto.png" width="50px" alt="">
                  </button>
                  <p><?php echo $enable_space ?></p>
                </center>
              </div>
              <?php 
            }
          ?>
          <?php      
              }
          ?>
      </div>
  </div>
</div>


    <script src="public/js/jquery-3.7.0.min.js" ></script>
    <script src="public/js/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="public/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>
</html>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inicio de Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row">
           <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="">Correo Electrónico</label>
                    <input type="email" id="usuario" class="form-control">
                </div>
           </div><br>
           <div class="col-md-12">
                <div class="form-group">
                    <label class="form-label" for="">Contraseña</label>
                    <input type="password" id="password" class="form-control">
                </div>
           </div>
        </div><br>
        <div id="respuesta"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="ingresar" >Ingresar</button>
      </div>
    </div>
  </div>
</div>

<script>

  $('#ingresar').click(function () {
    login();
  });

  $('#password').keypress(function(e){
    if(e.which == 13){
      login();
    }
  });

  function login() {
    var usuario = $('#usuario').val();
    var password_user = $('#password').val();

    if(usuario == ""){
      alert('Debe Introducir su Usuario...');
        $('#usuario').focus();
    }else if(password_user == ""){
      alert('Debe Introducir su Contraseña...');
        $('#password').focus();
    }else{
      var url = 'login/controller_login.php'
        $.post(url,{usuario:usuario, password_user:password_user},function (datos) {
          $('#respuesta').html(datos);
      });
    }
  }
</script>