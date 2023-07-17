<?php
include('../app/config.php');
include('../layout/admin/data_user_session.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php include('../layout/admin/head.php'); ?>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">


  <?php include('../layout/admin/navbar.php'); ?>

  <div class="content-wrapper">
    <div class="container">
      <div class="row m-4">
        <a href="<?php echo $URL;?>/settings/forms/created.php" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
            <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
          </svg>
            Nuevo
          </button>
        </a>
        <div class="text-sm ml-8">
            <ul>
              <center><h4>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                </svg>
                INFORMACIÓN DEL PARQUEADERO</h4>
              </center>
            </ul>
        </div>
      </div>
      <div class="card card-outline card-info">
        <table class="table table-bordered table-sm table-striped">
          <th></th>
          <th><center>No</center></th>
          <th><center>Nombre del parqueo</center></th>
          <th><center>Actividad de la Entidad</center></th>
          <th><center>Dirección</center></th>
          <th><center>Zona</center></th>
          <th><center>Teléfonos</center></th>
          <th><center>Ciudad</center></th>
          <th><center>País</center></th>
          <th><center>Acción</center></th>

          <?php
          $counter = 0;
          $query_setting = $pdo->prepare("SELECT * FROM settings WHERE enable_setting = '1'  ORDER BY id_setting DESC");
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
            $counter = $counter + 1;
            ?>
              <tr>
              <td>
                  <center>
                    <a href="forms/updated.php?id=<?php echo $id_setting; ?>" class="btn btn-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                    </svg>
                    </a>
                  </center>
                </td>
                <td><center><?php echo $counter;?></center></td>
                <td><?php echo $name_parking;?></td>
                <td><?php echo $entity_activity;?></td>
                <td><?php echo $address;?></td>
                <td><?php echo $zone;?></td>
                <td><?php echo $phone;?></td>
                <td><?php echo $city;?></td>
                <td><?php echo $country;?></td>
                <td>
                  <center>
                    <a href="forms/delete.php?id=<?php echo $id_setting; ?>" class="btn btn-danger">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                    </svg>
                    </a>
                </td>
              </tr>
            <?php
          }
          ?>
        </table>
      </div>  
    </div>
  </div>

  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/script.php'); ?>

</body>
</html>