<?php 
include('../app/config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inicio Sesión</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background-image:url(../public/img/yavi.png);
    background-repeat: no-repeat;
    z-index: -3;
    background-size: 100vw 100vh;">
    
<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-warning">
    <div class="card-header text-center ">
      <a href="../" class="h1"><b>YAVI</b> PARKING</a> <br> ¡Nos alegra verte nuevamente! <br>
    </div>
    <div class="card-body">
        <div class="login-box-msg" id="alert-box" style=" background-color:#FAEBD7; padding: 10px;">
            Ingresa tus credenciales y comencemos a explorar juntos.
        </div><br>
        <div class="input-group mb-3">
          <input type="email" class="form-control" id="usuario" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" id="password"  placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <div id="respuesta"></div>
        </div>
        <div class="modal-footer justify-content-center">
          <button type="button" class="btn btn-default"  style="background-color:rgb(255, 112, 67);" id="ingresar" >Ingresar</button>
          <a href="../" class="btn btn-default" style="background-color: rgb(33, 33, 33); color: white;">Regresar</a>
      </div>
      <br>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo $URL;?>/app/templates/AdminLTE-3.2.0/dist/js/adminlte.min.js"></script>
</body>
</html>

<script>
    window.onload = function() {
        var alertBox = document.getElementById('alert-box');
        
        setTimeout(function() {
            alertBox.style.display = 'none';
        }, 5000); // 3000 milisegundos = 3 segundos
    }


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
      var url = 'controller_forbidden.php'
        $.post(url,{usuario:usuario, password_user:password_user},function (datos) {
          $('#respuesta').html(datos);
      });
    }
  }
</script>