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
        <?php
        $id_setting = $_GET['id'];
        $query_setting = $pdo->prepare("SELECT * FROM settings WHERE id_setting ='$id_setting' AND enable_setting = 1");
        $query_setting->execute();
        $settings = $query_setting->fetchAll(PDO::FETCH_ASSOC);
        foreach($settings as $setting){
            $id_setting = $setting['id_setting'];
            $name_parking = $setting['name_parking'];
            $entity_activity = $setting['entity_activity'];
            $address = $setting['address'];
            $zone = $setting['zone'];
            $phone = $setting['phone'];
            $city = $setting['city'];
            $country = $setting['country'];
            $enable_setting = $setting['enable_setting'];
        }
        ?>

      <center><br>
        <div class="row">
            <div class="col-md-2">
                <a href="../setting.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square-fill" viewBox="0 0 16 16">
                    <path d="M16 14a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12zm-4.5-6.5H5.707l2.147-2.146a.5.5 0 1 0-.708-.708l-3 3a.5.5 0 0 0 0 .708l3 3a.5.5 0 0 0 .708-.708L5.707 8.5H11.5a.5.5 0 0 0 0-1z"/>
                </svg>Regresar</a>
            </div>
            <div class="col-md-10">
                <h3>
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-slash" viewBox="0 0 16 16">
                        <path d="M13.879 10.414a2.501 2.501 0 0 0-3.465 3.465l3.465-3.465Zm.707.707-3.465 3.465a2.501 2.501 0 0 0 3.465-3.465Zm-4.56-1.096a3.5 3.5 0 1 1 4.949 4.95 3.5 3.5 0 0 1-4.95-4.95ZM11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
                    </svg> Eliminación Información de la Entidad
                </h3>
            </div>
        </div>
        
      </center><br>

      <div class="container">
      <center>
        <div class="card mb-3" style="max-width: 950px;">
          <div class="row g-0 align-items-center" >
            <div class="col-md-4">
              <img src="../../public/img/yavirac.jpg" style="max-width: 300px;" class="img-fluid rounded-start">
            </div>
          <div class="col-md-8">
            <div class="card card-danger">
              <div class="card-header" style="background-color:info">
                <center><h4>¿Estás seguro de eliminar <?php echo $name_parking; ?>?</h4></center>
              </div>
              <div class="card-body" style="display: block"  >
              <div class="form-group">
                        <div class="col-md-10">
                          <label for="name">Nombre del Parqueadero </label>
                          <input disabled class="form-control" id="name_parking" type="text" value="<?php echo $name_parking;?>" >
                        </div><br>

                        <div class="row">
                            <div class="col-md-8">
                            <label for="name">Actividad de la Entidad </label>
                            <input disabled class="form-control" id="entity_activity" type="text" value="<?php echo $entity_activity;?>">
                            </div>

                            <div class="col-md-4">
                            <label for="name">Teléfono </label>
                            <input disabled class="form-control" id="phone" type="number" value="<?php echo $phone;?>">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                            <label for="name">Dirección </label>
                            <input disabled class="form-control" id="address" type="text" value="<?php echo $address;?>">
                            </div>

                            <div class="col-md-6">
                            <label for="name">Zona </label>
                            <input disabled class="form-control" id="zone" type="text" value="<?php echo $zone;?>">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                            <label for="name">Ciudad </label>
                            <input disabled class="form-control" id="city" type="text" value="<?php echo $city;?>">
                            </div>

                            <div class="col-md-6">
                            <label for="name">País </label>
                            <input disabled class="form-control" id="country" type="text" value="<?php echo $country;?>">
                            </div>
                        </div><br>
                      </div>

                <div class="form-group">
                  <button type="button"  class="btn btn-danger" id="delete_setting" >Eliminar</button>
                    <a id="cancelar_setting" class="btn btn-default">Cancelar</a>
                  </div>
                    <div id="answer"></div>
                  </div>
                </div>
            </div>
          </div>
        </div>
        </center>
      </div>
    </div>
  </div>
  
<?php include('../../layout/admin/footer.php'); ?>
</div>
<?php include('../../layout/admin/script.php'); ?>
</body>
</html>

<script src="../../alert.js" ></script>
<script>
  $('#delete_setting').click(function (){
     var id_setting = '<?php echo $idseid_setting = $_GET['id']; ?>'

     Swal.fire({
        title: '¿Estás seguro de que deseas eliminar este registro?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Sí',
        confirmButtonColor: '#007BFF',
        cancelButtonText: 'No',
        cancelButtonColor: '#d33',
        focusCancel: true,
        preConfirm: () => {
          var url = '../controllers/controller_delete.php';
            $.get(url,{ id_setting:id_setting},function (datos) {
              $('#answer').html(datos);
          });
        }
      });
  });
    
</script>