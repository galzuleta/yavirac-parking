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
    <title>Instituto Superior Tecnológico de Turismo y Patrimonio "Yavirac"</title>
</head>
<body style="background-image:url(public/img/piso.png);
    
    z-index: -3;
    background-size: 100vw 100vh">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
    <img src="public/img/logo1.png" alt="" width="50" height="50" class="d-inline-block align-text-top">
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
        <button type="button" class="btn btn-default" style="background-color:rgb(255, 112, 67);" data-bs-toggle="modal" data-bs-target="#exampleModal">
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
                  <button class="btn btn-default" style="background-color:rgb(33, 33, 33); color: white; width:100%; height:120px" >
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
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content" style="background-image: url(public/img/logo_yavirac.png);
                                      background-repeat: no-repeat;
                                      z-index: 3;
                                      background-size: 14vw 14vh;
                                      background-position: center 20%;
                                      background-color:rgb(245,245,245);
                                      ">
      <div class="modal-header" style="background-color:rgb(255, 112, 67);">
        <h5 class="modal-title" id="exampleModalLabel">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
          <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
        </svg>
          Inicio de Sesión</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div><br><br><br><br>
      <div class="modal-body">
        <div class="row"><br><br><br>
           <div class="col-md-12">
                <div class="form-group">
                    <input type="email" id="usuario" placeholder="Correo Electrónico" style="background-color: rgb(33, 33, 33); color: white;" class="form-control">
                </div>
           </div><br><br>
           <div class="col-md-12">
                <div class="form-group">
                    <input type="password" id="password" placeholder="Contraseña"  style="background-color: rgb(33, 33, 33); color: white;" class="form-control">
                </div>
           </div>
        </div><br>
        <div id="respuesta"></div>
      </div>
      <div class="modal-footer justify-content-center">
            <button type="button" class="btn btn-default"  style="background-color:rgb(255, 112, 67);" id="ingresar" >Ingresar</button>
            <button type="button" class="btn btn-default" style="background-color: rgb(33, 33, 33); color: white;" data-bs-dismiss="modal">Cancelar</button>
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