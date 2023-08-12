<?php
include('../../app/config.php');
include('../../layout/admin/data_user_session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <?php include('../../layout/admin/navbar.php'); ?>

  <div class="content-wrapper">
    <br>
    <div class="container">
      <center>
        <div class="row">
          <div class="col-md-2">
            <a href="../role.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
              </svg>Regresar</a>
          </div>
          <div class="col-md-10">
          <h3>
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
              <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
              <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
            </svg> Agregar Roles
          </h3>
          </div>
        </div>
      </center><br>
      <center>
        <div class="container ">
            <div class="card mb-3" style="max-width: 950px;">
              <div class="row g-0 align-items-center">
                <div class="col-md-4">
                  <img src="../../public/img/roles.png" style="max-width: 200px;"  class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                  <div class="card card-info">
                    <div class="card-header" style="background-color:info">
                      <center><h4>Formulario</h4></center>
                    </div>
                    <div class="card-body " >
                      <div class="form-group">
                        <div class="col-md-9">
                          <label for="name">Nombre del Rol <span style="color: red"><b>*</b></label>
                          <input class="form-control" id="name" type="text">
                        </div>
                      </div>
                      <div class="form-group">
                        <button type="button"  class="btn btn-primary" id="save" >Guardar</button>
                          <a href="<?php echo $URL;?>../roles/role.php" class="btn btn-danger">Cancelar</a>
                        </div>
                          <div id="answer"></div>
                        </div>
                      </div>
                  </div>
              </div>
            </div>
        </div>
      </center>
    </div>
  </div>
  
<?php include('../../layout/admin/footer.php'); ?>
</div>
<?php include('../../layout/admin/script.php'); ?>
</body>
</html>

<script>
  $('#save').click(function (){
    var name = $('#name').val();
    

    if(name == ""){
      alert('Debe de llenar el campo Nombres');
      $('#name').focus();
    }else{
      var url = '../controllers/controller_created.php';
        $.get(url,{name:name},function (datos) {
          $('#answer').html(datos);
      } );
    }
  });
    
</script>


