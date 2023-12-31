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
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
              <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-9 8c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Zm9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z"/>
            </svg> Actualización Información de la Entidad
            </h3>
          </div>
        </div>
      </center><br>

      <div class="container">
      <center>
      <div class="container ">
            <div class="card mb-3" style="max-width: 950px;">
              <div class="row g-0 align-items-center">
                <div class="col-md-4">
                 <center> <img src="../../public/img/yavirac.jpg" style="max-width: 300px;"  class="img-fluid rounded-start"></center>
                </div>
                <div class="col-md-8">
                  <div class="card card-success">
                    <div class="card-header" style="background-color:info">
                      <center><h4><?php echo $name_parking; ?></h4></center>
                    </div>
                    <div class="card-body" style="display: block" >
                    
                      <div class="form-group">
                        <div class="col-md-10">
                          <label for="name">Nombre del Parqueadero </label>
                          <input class="form-control" id="name_parking" type="text" value="<?php echo $name_parking;?>" >
                        </div><br>

                        <div class="row">
                            <div class="col-md-8">
                            <label for="name">Actividad de la Entidad </label>
                            <input class="form-control" id="entity_activity" type="text" value="<?php echo $entity_activity;?>">
                            </div>

                            <div class="col-md-4">
                            <label for="name">Teléfono </label>
                            <input class="form-control" id="phone" type="number" value="<?php echo $phone;?>">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                            <label for="name">Dirección </label>
                            <input class="form-control" id="address" type="text" value="<?php echo $address;?>">
                            </div>

                            <div class="col-md-6">
                            <label for="name">Zona </label>
                            <input class="form-control" id="zone" type="text" value="<?php echo $zone;?>">
                            </div>
                        </div><br>

                        <div class="row">
                            <div class="col-md-6">
                            <label for="name">Ciudad </label>
                            <input class="form-control" id="city" type="text" value="<?php echo $city;?>">
                            </div>

                            <div class="col-md-6">
                            <label for="name">País </label>
                            <input class="form-control" id="country" type="text" value="<?php echo $country;?>">
                            </div>
                        </div><br>
                      </div>

                      <div class="form-group">
                        <button type="button"  class="btn btn-success" id="updated_setting" >Actualizar</button>
                          <a id="cancelar_setting" class="btn btn-danger">Cancelar</a>
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
  </div>
  
<?php include('../../layout/admin/footer.php'); ?>
</div>
<?php include('../../layout/admin/script.php'); ?>
</body>
</html>

<script src="../../alert.js" ></script>
<script>
  $('#updated_setting').click(function (){
    var name_parking = $('#name_parking').val();
    var entity_activity = $('#entity_activity').val();
    var phone = $('#phone').val();
    var address = $('#address').val();
    var zone = $('#zone').val();
    var city = $('#city').val();
    var country = $('#country').val();

    var id_setting = '<?php echo $id_setting = $_GET['id']; ?>'

    if(name_parking == ""){
      setTimeout(function() {
        var nameField = document.getElementById("name_parking");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Nombre',
            showConfirmButton: false
          });
        }
      });
      $('#name_parking').focus();
    }
    else if(entity_activity == ""){
      setTimeout(function() {
        var nameField = document.getElementById("entity_activity");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Actividad',
            showConfirmButton: false
          });
        }
      });
      $('#entity_activity').focus();
    }
    else if(phone == ""){
      setTimeout(function() {
        var nameField = document.getElementById("phone");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Teléfono',
            showConfirmButton: false
          });
        }
      });
      $('#phone').focus();
    }
    else if(address == ""){
      setTimeout(function() {
        var nameField = document.getElementById("address");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Dirección',
            showConfirmButton: false
          });
        }
      });
      $('#address').focus();
    }
    else if(zone == ""){
      setTimeout(function() {
        var nameField = document.getElementById("zone");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Zona',
            showConfirmButton: false
          });
        }
      });
      $('#zone').focus();
    }
    else if(city == ""){
      setTimeout(function() {
        var nameField = document.getElementById("city");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo Ciudad',
            showConfirmButton: false
          });
        }
      });
      $('#city').focus();
    }
    else if(country == ""){
      setTimeout(function() {
        var nameField = document.getElementById("country");
        if (nameField) {
          Swal.fire({
            icon: 'warning',
            title: 'Debe llenar el campo País',
            showConfirmButton: false
          });
        }
      });
      $('#country').focus();
    }
    else{
      var url = '../controllers/controller_updated.php';
        $.get(url,{name_parking:name_parking, entity_activity:entity_activity, phone:phone, 
            address: address, zone:zone, city:city, country:country, id_setting:id_setting,},function (datos) {
          $('#answer').html(datos);
      } );
    }
  });
    
</script>
