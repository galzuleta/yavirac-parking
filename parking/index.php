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
        <a href="<?php echo $URL;?>/parking/forms/created.php" class="btn btn-secondary" tabindex="-1" role="button" aria-disabled="true">
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
              <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" fill="currentColor" class="bi bi-ev-front-fill" viewBox="0 0 16 16">
                <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679c.033.161.049.325.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.807.807 0 0 0 .381-.404l.792-1.848Zm6.75.51a.186.186 0 0 0-.23.034L6.05 7.246a.188.188 0 0 0 .137.316h1.241l-.673 2.195a.188.188 0 0 0 .085.218c.075.043.17.03.23-.034l2.88-3.187a.188.188 0 0 0-.137-.316H8.572l.782-2.195a.188.188 0 0 0-.085-.218Z"/>
              </svg>
                LISTADO DE CUBÍCULOS</h4>
              </center>
            </ul>
        </div>
      </div>

      <div class="card card-outline card-info">

          <div class="card-body" style="display: block;">
            <table class="table table-bordered table-sm table-striped">
              <th><center>Nro Espacio</center></th>
              <th><center>Estado</center></th>
              <th><center>Observaciones</center></th>
              <th><center>Acción</center></th>

              <?php
              $counter = 0;
              $query_mapping = $pdo->prepare("SELECT * FROM mappings WHERE enable_mapping = '1' ORDER BY id_map DESC");
              $query_mapping->execute();
              $mappings = $query_mapping->fetchAll(PDO::FETCH_ASSOC);
              foreach($mappings as $mapping){
                $id_map = $mapping['id_map'];
                $no_space = $mapping['no_space'];
                $enable_space = $mapping['enable_space'];
                $observation = $mapping['observation'];
                $counter = $counter + 1;
                ?>
                  <tr>
                    <td><?php echo $no_space;?></td>
                    <td><?php echo $enable_space;?></td>
                    <td><?php echo $observation;?></td>
                    <td>
                      <center>
                        <a href="forms/delete.php?id=<?php echo $id_map; ?>" class="btn btn-danger">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                          <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                          <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                        </svg>
                        </a>
                      </center>
                    </td>
                  </tr>
                <?php
              }
              ?>
            </table>
          </div>
      </div>
    </div>
  </div>

  <?php include('../layout/admin/footer.php'); ?>
</div>
<?php include('../layout/admin/script.php'); ?>
</body>
</html>